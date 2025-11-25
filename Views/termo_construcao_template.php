<?php
// Views/termo_construcao_template.php
// Espera variáveis: $estaleiro, $embarcacao, $cliente, $documento
function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
// mês em português
$data = date('d/m/y');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: 'Noto Sans', sans-serif; font-size: 12px; color: #111; line-height:1.4 }
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
    <div class="field"><p>b) Comprimento total: <?= h($embarcacao['comprimento_total'] ?? $embarcacao['comprimento'] ?? '') ?> m</p></div>
    <div class="field"><p>c) Boca Moldada: <?= h($embarcacao['boca_moldada'] ?? '') ?> m</p></div>
    <div class="field"><p>d) Pontal Moldado: <?= h($embarcacao['pontal_moldado'] ?? '') ?> m</p></div>
    <div class="field"><p>e) Calado Máximo: <?= h($embarcacao['calado_maximo'] ?? '') ?> m</p></div>
    <div class="field"><p>f) Calado leve: <?= h($embarcacao['calado_leve'] ?? '') ?> m</p></div>
    <div class="field"><p>g) Arqueação Bruta: <?= h($embarcacao['arqueacao_bruta'] ?? '') ?> </p></div>
    <div class="field"><p>h) Arqueação líquida: <?= h($embarcacao['arqueacao_liquida'] ?? '') ?> </p> </div>
    <div class="field"><p>i) TPB: <?= h($embarcacao['tpb'] ?? '') ?> ton</p></div>
    <div class="field"><p>j) Contorno: <?= h($embarcacao['contorno'] ?? '') ?> m</p></div>
    <div class="field"><p>k) Lastro: <?= h($embarcacao['lastro'] ?? '') ?> ton</p></div>
    <div class="field"><p>l) Área de navegação / Tipo de Serviço: <?= h($embarcacao['area_navegacao_tipo_servico'] ?? '') ?>.</p></div>
    <div class="field"><p>m) Tipo de Embarcação: <?= h($embarcacao['tipo_embarcacao'] ?? '') ?></p></div>
    <div class="field"><p>n) Material do Casco: <?= h($embarcacao['material_casco'] ?? '') ?></p></div>
    <div class="field"><p>o) Motorização máxima: <?= h($embarcacao['motorizacao_max'] ?? '') ?> HP</p></div>
    <div class="field"><p>p) Motorização mínima: <?= h($embarcacao['motorizacao_min'] ?? '') ?> HP</p></div>
  <div class="field"><p>q) Construtor: <?= h($estaleiro['nome_empresa'] ?? '') ?></p></div>
  <div class="field"><p>r) Ano de Construção: <?= h($embarcacao['ano_construcao_emb'] ?? $cliente['ano_construcao_emb'] ?? '') ?></p></div>
  <div class="field"><p>s) Nº Casco/Chassi: <?= h($embarcacao['chassi_emb'] ?? $cliente['chassi_emb'] ?? '') ?></p></div>
  <div class="field"><p>t) Modelo: <?= h($embarcacao['modelo'] ?? $embarcacao['tipo_embarcacao'] ?? '') ?></p></div>
  <div class="field"><p>u) Cor predominante: <?= h($embarcacao['cor'] ?? $embarcacao['cor_predominante'] ?? '') ?></p></div>
    <div class="field"><p>v) Nº de inscrição: <?= h($embarcacao['num_inscricao'] ?? '') ?></p></div>
    <div class="field"><p>w) Armador: <?= h($cliente['nome'] ?? '') ?> (<?= h($cliente['cpf_cnpj'] ?? '') ?>)</p></div>
    <div class="field"><p>x) Endereço: <?= h(($cliente['logradouro'] ?? '') . ', ' . ($cliente['numero'] ?? '')) ?> - <?= h(($cliente['bairro'] ?? '') . ' - ' . ($cliente['cidade'] ?? '') . '/' . ($cliente['estado'] ?? '')) ?></div>
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

  <div class="center" style="margin-top:30px"><p><?= h( $estaleiro['cidade']) ?>/<?= h( $estaleiro['estado']) ?>, <?= $data?></p></div>

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
