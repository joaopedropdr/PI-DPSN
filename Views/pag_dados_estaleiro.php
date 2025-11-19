<?php
    require_once "navbar_est.php";
    ?>
    <style>
        .shipyard-card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 900px; 
            width: 100%;
            border: 3px solid #0C3252;
        }

        .data-value {
            font-weight: 600; 
            color: #333;
            margin-bottom: 1.5rem; 
            word-wrap: break-word; 
        }
        .btn-salvar {
            background-color: #0C3252;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-salvar:hover {
            background-color: #004288ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px #004288ff;
        }
    </style>
</head>
<body>
    <a href="index.php?controle=inicioController&metodo=inicioEstaleiro" class="text-white text-decoration-none position-absolute start-0 m-5"><strong>←</strong>Voltar</a>
    <div class="min-vh-100 d-flex justify-content-center align-items-center p-3">
        <div class="card shipyard-card bg-light">
            <div class="card-body">
                <div class="row mb-4 align-items-center">
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <img class="w-50" src="imgs/LOGO_colorido-svg.svg" alt="Logo da empresa">
                        <p class="h6 mt-1 text-uppercase text-secondary" style="font-size: 0.75rem;">DPSN</p>
                    </div>
                    <div class="col-12 col-md-9">
                        <h4 class="card-title mb-0">Dados do Estaleiro</h4>
                        <p class="text-muted">Informações de perfil e contato.</p>
                    </div>
                </div>

                <div class="row g-3">   
                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Nome</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->nome . "</p>";
                            }
                        ?>
                    </div> 

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Nome da empresa</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->nome_empresa . "</p>";
                            }
                        ?>                        
                    </div>  

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">CNPJ</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->cnpj . "</p>";
                            }
                        ?>  
                    </div>  

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Telefone</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->telefone . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">E-mail</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->email . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">CEP</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->cep . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Logradouro</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->logradouro . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Numero</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->numero . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Complementos</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                if(empty($estaleiro->complementos)) {
                                    echo "<p class='data-value'>N/A</p>";
                                } else {
                                    echo "<p class='data-value'>" . $estaleiro->complementos . "</p>";
                                }
                            }                           
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Bairro</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->bairro . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Cidade</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->cidade . "</p>";
                            }
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Estado</h6>
                        <?php
                            foreach($retorno as $estaleiro) {
                                echo "<p class='data-value'>" . $estaleiro->estado . "</p>";
                            }
                        ?>  
                    </div>
                </div>
                
                <div class="d-grid gap-2 col-6 mx-auto mt-4 pt-2">
                    <a href="index.php?controle=estaleiroController&metodo=update" class="lu">
                        <button type="button" class="btn btn-salvar btn-lg rounded-pill text-white">
                            Alterar informações
                        </button>
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>