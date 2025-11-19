<?php
// Controllers/gerarDocumentoController.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../Models/DocumentoDAO.class.php';
require_once __DIR__ . '/../Models/PdfDocumentoDAO.class.php';

// se tiver DAOs de Embarcacao/Estaleiro/Cliente, inclua-os também se quiser
// require_once __DIR__ . '/../Models/EmbarcacaoDAO.class.php';
// require_once __DIR__ . '/../Models/EstaleiroDAO.class.php';
// require_once __DIR__ . '/../Models/ClienteDAO.class.php';

use Mpdf\Mpdf;

// Garanta que é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Método não permitido');
}

// Ler campos do form (ajuste names conforme seu form)
$id_cliente    = $_POST['id_cliente'] ?? null;
$id_embarcacao = $_POST['id_embarcacao'] ?? null;
$valor_total   = $_POST['valor_total'] ?? '0';
$valor_unit    = $_POST['valor_unit'] ?? $valor_total;
$descricao     = $_POST['descricao'] ?? 'Serviço';
$quantidade    = $_POST['quantidade'] ?? 1;

if (!$id_cliente || !$id_embarcacao) {
    http_response_code(400);
    die('id_cliente ou id_embarcacao ausente');
}

// Carrega dados dos registros via SQL direto (se você não tiver DAO)
$pdo = Database::connect();

$clienteStmt = $pdo->prepare('SELECT * FROM clientes WHERE id_cliente = :id');
$clienteStmt->execute([':id' => $id_cliente]);
$cliente = $clienteStmt->fetch();

$embStmt = $pdo->prepare('SELECT * FROM embarcacoes WHERE id_embarcacao = :id');
$embStmt->execute([':id' => $id_embarcacao]);
$embarcacao = $embStmt->fetch();

$estaleiro = [];
if (!empty($embarcacao['estaleiro_id'])) {
    $estStmt = $pdo->prepare('SELECT * FROM estaleiros WHERE id_estaleiro = :id');
    $estStmt->execute([':id' => $embarcacao['estaleiro_id']]);
    $estaleiro = $estStmt->fetch();
}

// Normalizar/fill de campos faltantes entre embarcacao, cliente e estaleiro
$cliente = $cliente ?: [];
$embarcacao = $embarcacao ?: [];
$estaleiro = $estaleiro ?: [];

// preencha campos da embarcação a partir do cliente quando ausentes
$embarcacao['ano_construcao_emb'] = $embarcacao['ano_construcao_emb'] ?? $cliente['ano_construcao_emb'] ?? null;
$embarcacao['chassi_emb'] = $embarcacao['chassi_emb'] ?? $cliente['chassi_emb'] ?? null;
$embarcacao['cor'] = $embarcacao['cor'] ?? $embarcacao['cor_predominante'] ?? null;
$embarcacao['modelo'] = $embarcacao['modelo'] ?? $embarcacao['tipo_embarcacao'] ?? null;
$embarcacao['num_tripulantes'] = $embarcacao['num_tripulantes'] ?? $embarcacao['num_trip'] ?? null;
$embarcacao['num_passageiros'] = $embarcacao['num_passageiros'] ?? $embarcacao['num_pass'] ?? null;
$embarcacao['num_inscricao'] = $embarcacao['num_inscricao'] ?? null;

// garantir campos numéricos/strings para template
foreach (['comprimento_total','boca_moldada','pontal_moldado','calado_maximo','calado_leve','arqueacao_bruta','arqueacao_liquida','tpb','contorno','lastro','material_casco','motorizacao_max','motorizacao_min'] as $k) {
    $embarcacao[$k] = $embarcacao[$k] ?? null;
}

// garantir alguns campos do estaleiro
$estaleiro['logradouro'] = $estaleiro['logradouro'] ?? $estaleiro['endereco'] ?? null;
$estaleiro['numero'] = $estaleiro['numero'] ?? null;
$estaleiro['bairro'] = $estaleiro['bairro'] ?? null;
$estaleiro['cidade'] = $estaleiro['cidade'] ?? null;
$estaleiro['estado'] = $estaleiro['estado'] ?? null;
$estaleiro['cep'] = $estaleiro['cep'] ?? null;
$estaleiro['telefone'] = $estaleiro['telefone'] ?? null;
$estaleiro['site'] = $estaleiro['site'] ?? null;


// 1) criar documento
$docDao = new DocumentoDAO();
$documentoId = $docDao->criar($id_embarcacao, $id_cliente);

// 2) preparar dados do documento para template
$valorTotal = floatval(str_replace(',', '.', $valor_total));
$valorUnit  = floatval(str_replace(',', '.', $valor_unit));

$documentoArr = [
    'descricao' => $descricao,
    'quantidade' => $quantidade,
    'valor_unit' => $valorUnit,
    'valor_total' => $valorTotal,
    'numero_documento' => $documentoId
];

// 3) renderizar template em HTML
ob_start();
$cliente_for_template = $cliente;
$embarcacao_for_template = $embarcacao;
$estaleiro_for_template = $estaleiro;
$documento = $documentoArr;

// variáveis que o template espera
$cliente = $cliente_for_template;
$embarcacao = $embarcacao_for_template;
$estaleiro = $estaleiro_for_template;

$tipo = $_POST['tipo'] ?? 'termo';
// sempre gerar o termo (a nota fiscal foi desativada)
include __DIR__ . '/../Views/termo_construcao_template.php';
$html = ob_get_clean();

// 4) gerar PDF com mPDF
try {
    $tmpDir = __DIR__ . '/../tmp';
    if (!is_dir($tmpDir)) mkdir($tmpDir, 0777, true);

    $mpdf = new Mpdf(['tempDir' => $tmpDir, 'format' => 'A4']);
    $mpdf->WriteHTML($html);
    $pdfString = $mpdf->Output('', 'S'); // retorna string do PDF
} catch (\Mpdf\MpdfException $e) {
    error_log('Erro mPDF: ' . $e->getMessage());
    http_response_code(500);
    die('Erro ao gerar PDF');
}

// 5) salvar no banco como BLOB
$pdfDao = new PdfDocumentoDAO();
$pdfId = $pdfDao->criar($documentoId, $pdfString, null);

    // 6) enviar PDF para navegador (forçar download)
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="termo_construcao_' . $documentoId . '.pdf"');
    header('Content-Length: ' . strlen($pdfString));
    echo $pdfString;
    exit;
