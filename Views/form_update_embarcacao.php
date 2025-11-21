<?php
    require_once "navbar_est.php";
?>
    <style>
        .cor-texto {
            color: #0C3252;
        }
        .card-form {
            max-width: 900px;
            margin: auto; 
            border-radius: 1rem;
            border: 3px solid #0C3252;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 500;
            color: #0C3252;
        }
        .btn-salvar {
            background-color: #0C3252;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-salvar:hover {
            background-color: #1b4d83ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>

<body>
    <div class="container min-vh-100">
        <div class="card card-form mt-5 mb-5">
            <div class="card-header cor-texto rounded-top-4">
                <h3 class="mb-0 text-center"><i class="bi bi-gear-fill me-2"></i>Edição de Dados da Embarcação</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="text-muted mb-4">Preencha e atualize as informações cadastradas da sua Embarcação.</p>
                
                <form action="#" method="POST" class="row g-4">
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='hidden' id='id_embarcacao' name='id_embarcacao' value='". $embarcacao->id_embarcacao ."'>";
                            }
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='nome' name='nome' value='". $embarcacao->nome ."'>";
                            }
                        ?>                         
                       <div class="col-12 text-danger"><?php echo $msg[1];?></div>
                    </div>

                    <div class="col-12">
                        <label for="comp_total" class="form-label">Comprimento Total</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='comp_total' name='comp_total' value='". $embarcacao->comprimento_total ."'>";
                            }
                        ?>
                        <div class="col-12 text-danger"><?php echo $msg[2];?></div>                        
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="boca_mold" class="form-label">Boca Moldada</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='boca_mold' name='boca_mold' value='". $embarcacao->boca_moldada ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[3];?></div> 
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <label for="pontal_mold" class="form-label">Pontal Moldado</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='pontal_mold' name='pontal_mold' value='". $embarcacao->pontal_moldado ."'>";
                            }
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[4];?></div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="calado_max" class="form-label">Calado Maximo</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='calado_max' name='calado_max' value='". $embarcacao->calado_maximo ."'>";
                            }
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[5];?></div>
                    </div>

                    <div class="col-12">
                        <label for="calado_leve" class="form-label">Calado Leve</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='calado_leve' name='calado_leve' value='". $embarcacao->calado_leve ."'>";
                            }
                        ?> 
                        <div class="col-12 text-danger"><?php echo $msg[6];?></div>
                    </div>

                    <div class="col-12 col-md-8">
                        <label for="arq_bruta" class="form-label">Arqueação Bruta</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='arq_bruta' name='arq_bruta' value='". $embarcacao->arqueacao_bruta ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-8 text-danger"><?php echo $msg[7];?></div> 
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="arq_liquida" class="form-label">Arqueação Liquida</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='arq_liquida' name='arq_liquida' value='". $embarcacao->arqueacao_liquida ."'>";
                            }
                        ?> 
                        <div class="col-12 col-md-4 text-danger "><?php echo $msg[8];?></div>
                    </div>

                    <div class="col-12">
                        <label for="tpb" class="form-label">TPB</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='tpb' name='tpb' value='". $embarcacao->tpb ."'>";
                            }
                        ?> 
                        <div class="col-12 col-md-4 text-danger "><?php echo $msg[9];?></div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="contorno" class="form-label">Contorno</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='contorno' name='contorno' value='". $embarcacao->contorno ."'>";
                            }
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[10];?></div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="lastro" class="form-label">Lastro</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='lastro' name='lastro' value='". $embarcacao->lastro ."'>";
                            }
                        ?>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="an_ts" class="form-label">Area de Navegção / Tipo de Serviço</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='an_ts' name='an_ts' value='". $embarcacao->area_navegacao_tipo_servico ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[11];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="tipo_embarcacao" class="form-label">Tipo da Embarcação</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='tipo_embarcacao' name='tipo_emb' value='". $embarcacao->tipo_embarcacao ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[12];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="material_casco" class="form-label">Material do Casco</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='material_casco' name='material_casco' value='". $embarcacao->material_casco ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[13];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="mot_max" class="form-label">Motorização Maxima</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='mot_max' name='mot_max' value='". $embarcacao->motorizacao_max ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[14];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="mot_min" class="form-label">Motorização Minima</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='mot_min' name='mot_min' value='". $embarcacao->motorizacao_min."'>";
                            }
                        ?>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="tripulantes" class="form-label">N. Tripulantes</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='tripulantes' name='tripulantes' value='". $embarcacao->num_tripulantes ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[15];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="passageiros" class="form-label">N. Passageiros</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='passageiros' name='passageiros' value='". $embarcacao->num_passageiros ."'>";
                            }
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[15];?></div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="inscricao" class="form-label">N. Inscrição</label>
                        <?php
                            foreach($retornoDados as $embarcacao) {
                                echo "<input type='text' class='form-control' id='inscricao' name='inscricao' value='". $embarcacao->num_inscricao ."'>";
                            }
                        ?>
                    </div>

                    <div class="col-12 d-grid gap-2 col-6 mx-auto mt-4 pt-2">
                        <button type="submit" class="btn btn-salvar btn-lg rounded-pill text-white">
                            Alterar informações
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>