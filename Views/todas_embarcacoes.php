<?php
    require_once "navbar_est.php";
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
    <div class="container py-5 text-center cor-texto">
        <h1 class="display-4 fw-bold mb-3">Embarcações Cadastradas</h1>
        <p class="lead mb-5">Todos as embarcações que estão cadastradas.</p>

        <div class="row justify-content-center g-5 mt-5">
            <?php
                foreach($retorno as $embarcacao) {
                    echo "<button class='btn btn-light col-12 col-md-6 m-5' type='button' data-bs-toggle='collapse' data-bs-target='#$embarcacao->id_embarcacao' aria-expanded='false' aria-controls='$embarcacao->id_embarcacao'>
                        <strong>$embarcacao->nome</strong>
                    </button>
                    <div class='collapse' id='$embarcacao->id_embarcacao'>
                        <div class='card card-body'>
                            <div class='justify-content-center align-items-center p-3'>
                                
                                <div class='card bg-light'>
                                    <div class='card-body'>
                                        <div class='row g-3'>   
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Nome</h6>
                                                <p> $embarcacao->nome </p>
                                            </div> 
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Comprimento Total</h6>
                                                <p> $embarcacao->comprimento_total </p>
                                            </div>  
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Boca Moldada</h6>
                                                <p> $embarcacao->boca_moldada </p>
                                            </div>  
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Pontal Moldado</h6>
                                                <p> $embarcacao->pontal_moldado </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Calado Maximo</h6>
                                                <p> $embarcacao->calado_maximo </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Calado Leve</h6>
                                                <p> $embarcacao->calado_leve </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Arqueação Bruta</h6>
                                                <p> $embarcacao->arqueacao_bruta </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Arqueação Liquida</h6>
                                                <p> $embarcacao->arqueacao_liquida </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>TPB</h6>
                                                <p> $embarcacao->tpb </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Contorno</h6>
                                                <p> $embarcacao->contorno </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Lastro</h6>
                                                <p> $embarcacao->lastro </p>
                                            </div>
    
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Area de Navegação/Tipo de Serviço</h6>
                                                <p> $embarcacao->area_navegacao_tipo_servico </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>tipo da Embarcação</h6>
                                                <p> $embarcacao->tipo_embarcacao </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Material do Casco</h6>
                                                <p> $embarcacao->material_casco </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Motorização Maxima</h6>
                                                <p> $embarcacao->motorizacao_max </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>Motorização Minima</h6>
                                                <p> $embarcacao->motorizacao_min </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>N. Tirpulantes</h6>
                                                <p> $embarcacao->num_tripulantes </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>N. de Passageiros</h6>
                                                <p> $embarcacao->num_passageiros </p>
                                            </div>
                                            <div class='col-12 col-md-4'>
                                                <h6 class='text-muted mb-0'>N. de inscrição</h6>
                                                <p> $embarcacao->num_inscricao </p>
                                            </div>
                                        </div>
                
                                        <div class='d-flex flex-row gap-2 col-6 mx-auto mt-4 pt-2'>
                                            <a href='index.php?controle=embarcacaoController&metodo=update&id=$embarcacao->id_embarcacao' class='lu'>
                                                <button type='button' class='btn btn-salvar btn-md rounded-pill text-white'>
                                                    <i>Alterar informações</i>
                                                </button>
                                            </a>
                                            <button type='button' class='btn btn-del btn-md rounded-pill text-white ' data-bs-toggle='modal' data-bs-target='#{$embarcacao->id_embarcacao}-modal'>
                                                <i>Excluir Embarcação</i>
                                            </button>
    
                                            <div class='modal fade' id='{$embarcacao->id_embarcacao}-modal' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='{$embarcacao->id_embarcacao}-modal-label' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            <p class='mt-3'>Deseja excluir esse estaleiro?</p>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-salvar text-white' data-bs-dismiss='modal'>Voltar</button>
                                                            <form method='post' action='index.php?controle=embarcacaoController&metodo=delete'>
                                                                <input type='hidden' name='id_embarcacao' value='$embarcacao->id_embarcacao'>
                                                                <button type='submit' class='btn btn-del text-white'>Excluir</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>
<!-- Fechamento da tag <main> da navbar. -->
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>