<?php
    require_once "navbar_adm.php";
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
            font-weight: 600; /* Semelhante a fw-bold do Bootstrap */
            color: #333;
            margin-bottom: 1.5rem; /* Espaçamento entre os blocos de dados */
            word-wrap: break-word; /* Garante que textos longos se ajustem */
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

        .btn-del {
            background-color: #b92727ff;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-del:hover {
            background-color: #8d0000ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px #8d0000ff;
        }
    </style>
</head>
<body>
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
                
                <div class="d-flex flex-row gap-2 col-6 mx-auto mt-4 pt-2">
                    <a href="index.php?controle=estaleiroController&metodo=update" class="lu">
                        <button type="button" class="btn btn-salvar btn-md rounded-pill text-white">
                            <i>Alterar informações</i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-del btn-md rounded-pill text-white " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i>Excluir Estaleiro</i>
                    </button>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <p class="mt-3">Deseja excluir esse estaleiro?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-salvar text-white" data-bs-dismiss="modal">Voltar</button>
                                    <form method="post" action="index.php?controle=estaleiroController&metodo=delete">
                                        <?php
                                            foreach($retorno as $estaleiro) {
                                                echo "<input type='hidden'  name='id_estaleiro' value=" . $estaleiro->id_estaleiro ." >";
                                            }
                                            ?>  
                                        <button type="submit" class="btn btn-del text-white">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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