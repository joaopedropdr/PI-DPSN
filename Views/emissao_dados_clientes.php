<?php
    require_once "navbar_adm.php";
?>
<?php
// Views/emissao_dados_clientes.php
require_once __DIR__ . '/../config/Database.php';
$pdo = Database::connect();

// Buscar listas para selects (estaleiros, embarcacoes, clientes)
$estStmt = $pdo->query('SELECT * FROM estaleiros ORDER BY nome_empresa ASC');
$estaleiros = $estStmt->fetchAll();

$embStmt = $pdo->query('SELECT e.* FROM embarcacoes e ORDER BY e.nome ASC');
$embarcacoes = $embStmt->fetchAll();

$cliStmt = $pdo->query('SELECT * FROM clientes ORDER BY nome ASC');
$clientes = $cliStmt->fetchAll();
?>

  <style>
    body { font-family: 'Noto Sans', sans-serif;}
    .form-card { background:#fff; padding:30px; border-radius:12px; max-width:800px; margin:0 auto; }
    .btn-custom { background:#0C3252; color:white; border-radius:10px; padding:10px 20px; }
  </style>
    <div class="form-card mt-5">
      <h3 class="text-center">Emitir documento do cliente</h3>
      <form method="post" action="../Controller/gerarDocumentoController.php" class="row g-3">
        <!-- Selecionar Estaleiro -->
        <div class="col-12"><h5>Selecionar Estaleiro / Embarcação</h5></div>
        <div class="col-md-6">
          <select id="select-estaleiro" name="id_estaleiro" class="form-select">
            <option value="">-- Escolher estaleiro --</option>
            <?php foreach ($estaleiros as $est) : ?>
              <option value="<?= htmlspecialchars($est['id_estaleiro']) ?>"><?= htmlspecialchars($est['nome_empresa']) ?> (<?= htmlspecialchars($est['cnpj']) ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <select id="select-embarcacao" name="id_embarcacao" class="form-select">
            <option value="">-- Escolher embarcação --</option>
            <?php foreach ($embarcacoes as $emb) : ?>
              <option data-estaleiro="<?= htmlspecialchars($emb['estaleiro_id'] ?? '') ?>" value="<?= htmlspecialchars($emb['id_embarcacao'] ?? $emb['id']) ?>"><?= htmlspecialchars($emb['nome'] ?? 'Embarcação') ?> - <?= htmlspecialchars($emb['tipo_embarcacao'] ?? '') ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-12"><h5>Selecionar Cliente</h5></div>
        <div class="col-md-12">
          <select id="select-cliente" name="id_cliente" class="form-select">
            <option value="">-- Escolher cliente --</option>
              <?php foreach ($clientes as $cli) : ?>
                <option value="<?= htmlspecialchars($cli['id_cliente']) ?>"><?= htmlspecialchars($cli['nome']) ?> (<?= htmlspecialchars($cli['cpf_cnpj']) ?>)</option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="col-12"><h5>Valores e descrição</h5></div>
        <div class="col-md-4"><input type="text" name="descricao" class="form-control" placeholder="Descrição do serviço"></div>
        <div class="col-md-2"><input type="number" step="1" name="quantidade" class="form-control" placeholder="Qtd" value="1"></div>
        <div class="col-md-3"><input type="text" name="valor_unit" class="form-control" placeholder="Valor unit. ex: 1500.00"></div>
        <div class="col-md-3"><input type="text" name="valor_total" class="form-control" placeholder="Valor total ex: 1500.00"></div>

        <!-- Gerará sempre o Termo de Responsabilidade de Construção -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-custom w-50">FINALIZAR</button>
        </div>
      </form>
    </div>
  <script>
    // filtrar embarcações por estaleiro selecionado
    (function(){
      const estSelect = document.getElementById('select-estaleiro');
      const embSelect = document.getElementById('select-embarcacao');

      if (!estSelect || !embSelect) return;

      const allOptions = Array.from(embSelect.options).map(opt => ({ value: opt.value, text: opt.text, est: opt.getAttribute('data-estaleiro') }));

      estSelect.addEventListener('change', function(){
        const sel = this.value;
        // limpar e recriar
        embSelect.innerHTML = '<option value="">-- Escolher embarcação --</option>';
        allOptions.forEach(o => {
          if (!sel || String(o.est) === String(sel)) {
            const opt = document.createElement('option');
            opt.value = o.value;
            opt.text = o.text;
            embSelect.appendChild(opt);
          }
        });
      });
    })();
  </script>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>
