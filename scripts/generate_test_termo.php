<?php
// scripts/generate_test_termo.php
require_once __DIR__ . '/../vendor/autoload.php';

use Mpdf\Mpdf;

// dados de teste compatíveis com o template
$estaleiro = [
    'nome_empresa' => 'Estaleiro Teste LTDA',
    'cnpj' => '00.000.000/0001-99',
    'logradouro' => 'Rua Ruan',
    'numero' => '123',
    'bairro' => 'Bairro Ex',
    'cidade' => 'São Paulo',
    'estado' => 'SP',
    'telefone' => '(11) 90000-0000'
];

$embarcacao = [
    'nome' => 'Barco Teste',
    'comprimento_total' => '12.50',
    'boca_moldada' => '3.40',
    'pontal_moldado' => '2.10',
    'calado_maximo' => '1.20',
    'calado_leve' => '0.90',
    'arqueacao_bruta' => '10.00',
    'arqueacao_liquida' => '8.00',
    'tpb' => '5.00',
    'contorno' => '4.00',
    'lastro' => 'NULL',
    'area_navegacao_tipo_servico' => 'Costeira',
    'tipo_embarcacao' => 'Veleiro',
    'material_casco' => 'Fibra',
    'motorizacao_max' => '200',
    'motorizacao_min' => '50',
    'num_tripulantes' => '4',
    'num_passageiros' => '6',
    'ano_construcao_emb' => '2024',
    'chassi_emb' => 'CHASSI-1234',
    'num_inscricao' => 'INSCR-0001',
    'cor' => 'Branco'
];

$cliente = [
    'nome' => 'João Teste',
    'cpf_cnpj' => '000.000.000-00',
    'logradouro' => 'Av. Cliente',
    'numero' => '45',
    'bairro' => 'Centro',
    'cidade' => 'Cidade Cliente',
    'estado' => 'SP'
];

ob_start();
include __DIR__ . '/../Views/termo_construcao_template.php';
$html = ob_get_clean();

$tmpDir = __DIR__ . '/../tmp';
if (!is_dir($tmpDir)) mkdir($tmpDir, 0777, true);

$mpdf = new Mpdf(['tempDir' => $tmpDir]);
$mpdf->WriteHTML($html);
$outPath = $tmpDir . '/termo_test_output.pdf';
$mpdf->Output($outPath, \Mpdf\Output\Destination::FILE);

echo "PDF termo gerado: $outPath\n";
