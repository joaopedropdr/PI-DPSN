<?php
    require_once "navbar_adm.php";
?>
    <style>
        .card-custom:hover {
            transform: scale(1.07);
        }

        .card-custom {
            color: #0C3252;
            box-shadow: 0px 4px 10px #002b4eff;
            transition: all 0.3s ease;
        }

        .cor-texto {
            color: #0C3252;
        }
        .lu {
            text-decoration: none;
        }
        .card-tamanho {
            width: 250x;
            height: 250px;
        }

    </style>
    <div class="container py-5 text-center cor-texto">
        <h1 class="display-4 fw-bold mb-3">Estaleiros Cadastrados</h1>
        <p class="lead mb-5">Todos os estaleiros que estão cadastrdos.</p>

        <div class="row justify-content-center g-5 min-vh-100 mt-5">
            <?php
                if(is_array($retorno)) {
                    if(count($retorno) > 0) {
                        foreach($retorno as $estaleiro) {
                            echo "<div class='col-12 col-sm-4 card-tamanho'>
                                <a href='index.php?controle=estaleiroController&metodo=todosEstaleiros' class='lu'>
                                    <div class='card card-custom h-100 rounded-3'>
                                        <div class='card-body d-flex justify-content-center align-items-center'>
                                            <h4 class='card-title'>$estaleiro->nome</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>";                        
                        }
                    }
                }
            ?>

            
        </div>
<!-- Fechamento da tag <main> da navbar. -->
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>