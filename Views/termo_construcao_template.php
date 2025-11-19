<?php
// Views/termo_construcao_template.php
// Espera variáveis: $estaleiro, $embarcacao, $cliente, $documento
function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
// mês em português
$meses = [1=>'janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'];
$dia = date('d');
$mes = $meses[(int)date('m')];
$ano = date('Y');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111; line-height:1.4 }
    .center { text-align:center }
    .underline { text-decoration: underline }
    .bold { font-weight:bold }
    .italic { font-style: italic }
    .small { font-size: 11px }
    .field { margin:6px 0 }
    .list { margin-left:18px }
  /* assinatura alinhada à esquerda e acima do rodapé */
  .signature { margin-top:30px; text-align:left }
  .sig-line { border-top:1px solid #000; width:320px; margin:8px 0 0 0; height:2px }
  /* rodapé como bloco normal para não sobrepor o conteúdo */
  footer { margin-top:40px; width:100%; text-align:center; font-size:11px }
  </style>
</head>
<body>
  <h2 class="center underline">TERMO DE RESPONSABILIDADE DE CONSTRUÇÃO</h2>

  <p>
    Certifico, para comprovação perante a <span class="bold">Capitania dos Portos</span>, que a embarcação modelo construída por
    <span class="bold"><?= h($estaleiro['nome_empresa'] ?? '') ?></span>, com CNPJ <span class="italic"><?= h($estaleiro['cnpj'] ?? '') ?></span>,
    com as seguintes características:
  </p>

  <div class="list">
    <div class="field">a) Nome da Embarcação: <?= h($embarcacao['nome'] ?? '') ?></div>
    <div class="field">b) Comprimento total: <?= h($embarcacao['comprimento_total'] ?? $embarcacao['comprimento'] ?? '') ?></div>
    <div class="field">c) Boca Moldada: <?= h($embarcacao['boca_moldada'] ?? '') ?></div>
    <div class="field">d) Pontal Moldado: <?= h($embarcacao['pontal_moldado'] ?? '') ?></div>
    <div class="field">e) Calado Máximo: <?= h($embarcacao['calado_maximo'] ?? '') ?></div>
    <div class="field">f) Calado leve: <?= h($embarcacao['calado_leve'] ?? '') ?></div>
    <div class="field">g) Arqueação Bruta: <?= h($embarcacao['arqueacao_bruta'] ?? '') ?></div>
    <div class="field">h) Arqueação líquida: <?= h($embarcacao['arqueacao_liquida'] ?? '') ?></div>
    <div class="field">i) TPB: <?= h($embarcacao['tpb'] ?? '') ?></div>
    <div class="field">j) Contorno: <?= h($embarcacao['contorno'] ?? '') ?></div>
    <div class="field">k) Lastro: <?= h($embarcacao['lastro'] ?? '') ?></div>
    <div class="field">l) Área de navegação / Tipo de Serviço: <?= h($embarcacao['area_navegacao_tipo_servico'] ?? '') ?></div>
    <div class="field">m) Tipo de Embarcação: <?= h($embarcacao['tipo_embarcacao'] ?? '') ?></div>
    <div class="field">n) Material do Casco: <?= h($embarcacao['material_casco'] ?? '') ?></div>
    <div class="field">o) Motorização máxima: <?= h($embarcacao['motorizacao_max'] ?? '') ?> HP</div>
    <div class="field">p) Motorização mínima: <?= h($embarcacao['motorizacao_min'] ?? '') ?> HP</div>
  <div class="field">q) Construtor: <?= h($estaleiro['nome_empresa'] ?? '') ?></div>
  <div class="field">r) Ano de Construção: <?= h($embarcacao['ano_construcao_emb'] ?? $cliente['ano_construcao_emb'] ?? '') ?></div>
  <div class="field">s) Nº Casco/Chassi: <?= h($embarcacao['chassi_emb'] ?? $cliente['chassi_emb'] ?? '') ?></div>
  <div class="field">t) Modelo: <?= h($embarcacao['modelo'] ?? $embarcacao['tipo_embarcacao'] ?? '') ?></div>
  <div class="field">u) Cor predominante: <?= h($embarcacao['cor'] ?? $embarcacao['cor_predominante'] ?? '') ?></div>
    <div class="field">v) Nº de inscrição: <?= h($embarcacao['num_inscricao'] ?? '') ?></div>
    <div class="field">w) Armador: <?= h($cliente['nome'] ?? '') ?> (<?= h($cliente['cpf_cnpj'] ?? '') ?>)</div>
    <div class="field">x) Endereço: <?= h(($cliente['logradouro'] ?? '') . ', ' . ($cliente['numero'] ?? '')) ?> - <?= h(($cliente['bairro'] ?? '') . ' - ' . ($cliente['cidade'] ?? '') . '/' . ($cliente['estado'] ?? '')) ?></div>
  </div>

  <p>
    Atende as prescrições aplicáveis constantes na NORMAM-211/DPC e apresenta condições de segurança, estabilidade e estruturais satisfatórias, para operar com a seguinte capacidade de pessoas:
  </p>
  <p>
    Tripulantes: <?= h($embarcacao['num_tripulantes'] ?? $embarcacao['num_tripulantes'] ?? '') ?> <br>
    Passageiros: <?= h($embarcacao['num_passageiros'] ?? $embarcacao['num_passageiros'] ?? '') ?>
  </p>

  <p>Certifico, ainda, que a embarcação foi construída em conformidade com as normas e regulamentos nacionais em vigor.</p>

  <p>Declaro que, salvo indicação em contrário, qualquer modificação de lastreamento, tancagem, arranjo geral ou alterações de qualquer monta, bem como incidentes ou sinistros, invalidam a presente declaração.</p>

  <div class="center" style="margin-top:30px">São Paulo, <?= $dia ?> de <?= $mes ?> de <?= $ano ?></div>

  <div class="signature">
    <div class="sig-line"></div>
    <div class="italic small">Tecnólogo Naval Responsável</div>
    <div class="bold">Helcio Marcelo De Russi</div>
    <div>CREA:5060478012</div>
  </div>

  <footer>
    <div>
      <?= h(($estaleiro['logradouro'] ?? 'Rua') . ', ' . ($estaleiro['numero'] ?? 'Nº') . ', ' . ($estaleiro['bairro'] ?? '') . ' - ' . ($estaleiro['cidade'] ?? '') . '/' . ($estaleiro['estado'] ?? '')) ?>, CEP <?= h($estaleiro['cep'] ?? '') ?>, Tel: <?= h($estaleiro['telefone'] ?? '') ?>, CNPJ: <?= h($estaleiro['cnpj'] ?? '') ?>, <?php if (!empty($estaleiro['site'])): ?><u><?= h($estaleiro['site']) ?></u><?php else: ?><u>www.exemplo.com.br</u><?php endif; ?>
    </div>
  </footer>
</body>
</html>
