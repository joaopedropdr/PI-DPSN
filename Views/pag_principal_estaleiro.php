<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once "navbar_est.php";


?>
    <style>
        .card-custom:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.5); /* Sombra suave para destacar o card */
        }

        .card-custom {
            color: #0C3252;
        }

        .cor-texto {
            color: #0C3252;
        }
        .lu {
            text-decoration: none;
        }
        .card-tamanho {
            width: 320px;
            height: 300px;
        }

        .icone-tamanho {
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="container py-5 text-center cor-texto">
        <h1 class="display-4 fw-bold mb-3">Painel do Estaleiro</h1>    
        <?php
            if(isset($_SESSION["id_estaleiro"])) {
                echo "<p class='lead mb-5'>Bem-vindo(a) <strong>" . htmlspecialchars($_SESSION['nome']) . "</strong> ao seu painel de controle.</p>";
            } 
        ?>

        <div class="row justify-content-center g-5">
            <div class="col-12 col-md-6 card-tamanho">
                <a href="#" class="lu">
                    <div class="card card-custom h-100 rounded-3 ">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <i class="fa-solid fa-clipboard-list fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Emitir Dados Dos Clientes</h4>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-md-6 card-tamanho">
                <a href="" class="lu">
                    <div class="card card-custom h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <i class="fa-solid fa-file-pen fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Assinar Documentos</h4>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-md-6 card-tamanho">
                <a href="" class="lu">
                    <div class="card card-custom h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column"> 
                            <i class="fa-solid fa-anchor fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Cadastrar Embarcações</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 card-tamanho">
                <a href="index.php?controle=inicioController&metodo=meusDados" class="lu">
                    <div class="card card-custom h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <i class="fa-solid fa-address-card fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Meus Dados</h4>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-md-6 card-tamanho">
                <a href="" class="lu">
                    <div class="card card-custom h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <i class="fa-solid fa-file-pdf fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Solicitar Documento Antigo</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 card-tamanho">
                <a href="" class="lu">
                    <div class="card card-custom h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <i class="fa-solid fa-ship fa-7x pb-3 cor-texto"></i>
                            <h4 class="card-title">Embarcações Cadastradas</h4>
                        </div>
                    </div>
                </a>
            </div>
<!-- Fechamento da tag <main> da navbar. -->
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>


