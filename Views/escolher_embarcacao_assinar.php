<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION["id_estaleiro"])) {
    require_once "navbar_est.php";
}         
if(isset($_SESSION["id_administrador"])) {
    require_once "navbar_adm.php";                
}
?>
<div class="container py-5">
    <h1 class="mb-4">Selecione a embarcação para gerar/assinar documento</h1>
    <?php if (empty($retornoEmb)) { ?>
        <div class="alert alert-warning">Nenhuma embarcação com documento encontrada.</div>
    <?php } else { ?>
        <div class="list-group">
            <?php foreach ($retornoEmb as $emb) { ?>
                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="index.php?controle=documentoController&metodo=abrirFormPorEmbarcacao&id=<?php echo $emb->id_embarcacao; ?>">
                    <div>
                        <h5 class="mb-1"><?php echo htmlspecialchars($emb->nome); ?></h5>
                        <small class="text-muted">Comprimento: <?php echo htmlspecialchars($emb->comprimento_total); ?> m — Inscrição: <?php echo htmlspecialchars($emb->num_inscricao); ?></small>
                    </div>
                    <div>
                        <span class="badge bg-primary rounded-pill"><?php echo count($emb->documentos ?? []); ?> docs</span>
                    </div>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php require_once "footer.html"; ?>
