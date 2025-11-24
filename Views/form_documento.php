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
    <div class="container min-vh-100">
        <div class="card card-form mt-5 mb-5">
            <div class="card-header cor-texto rounded-top-4">
                <h3 class="mb-0 text-center"><i class="bi bi-gear-fill me-2"></i>Documento</h3>
            </div>
            <div class="card-body p-4 p-md-5">                
                <form action="#" method="POST" class="row g-4">
                    <p class="text-center"><strong>TERMOS DE RESPONSABILIDADE DE CONSTRUÇÃO</strong></p>
                    <?php
                        echo "<p>Certifico, para comprovação perante a <strong>Capitania dos Portos</strong>, que a embarcação modelo " . $retornoEmb[0]->nome . ", foi construída por <strong>" . $retornoEst[0]->nome_empresa . ", CNPJ ". $retornoEst[0]->cnpj . "</strong>com as seguintes características:</p>";
                    ?>

                    <div class="col-12">
                        <?php
                            echo "<p>a) Comprimento Total <strong>". $retornoEmb[0]->comprimento_total ." m</strong></p>";                            
                            echo "<input type='hidden' id='comp_total' name='comp_total' value='". $retornoEmb[0]->comprimento_total ."'>";
                        ?>                         
                    </div>


                    <div class="col-12 ">
                        <?php  
                            echo "<p>b) Boca Moldada <strong>". $retornoEmb[0]->boca_moldada ." m</strong></p>";                          
                            echo "<input type='hidden' class='form-control' id='boca_mold' name='boca_mold' value='". $retornoEmb[0]->boca_moldada ."'>";
                        ?>
                    </div>
                    
                    <div class="col-12 ">
                        <?php
                            echo "<p>c) Pontal Moldado <strong>". $retornoEmb[0]->pontal_moldado ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='pontal_mold' name='pontal_mold' value='". $retornoEmb[0]->pontal_moldado ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>d) Calado Máximo <strong>". $retornoEmb[0]->calado_maximo ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->calado_maximo ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>e) Calado Leve <strong>". $retornoEmb[0]->calado_leve ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->calado_leve ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>f) Arqueação Bruta <strong>". $retornoEmb[0]->arqueacao_bruta ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->arqueacao_bruta ."'>";
                        ?> 
                    </div>

                    <div class="col-12 col-md-4">
                        <?php
                            echo "<p>g) Arqueação Liquida <strong>". $retornoEmb[0]->arqueacao_liquida ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->arqueacao_liquida ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>h) TPB <strong>". $retornoEmb[0]->tpb ." ton</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->tpb ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>i) Contorno <strong>". $retornoEmb[0]->contorno ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->contorno ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>j) Lastro <strong>". $retornoEmb[0]->lastro ." ton</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->lastro ."'>";
                        ?> 
                    </div>
                    <div class="col-12">
                        <?php
                            echo "<p>k) Área de Navegação/Tipo de Serviço <strong>". $retornoEmb[0]->area_navegacao_tipo_servico .".</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->area_navegacao_tipo_servico ."'>";
                        ?> 
                    </div>
                    <div class="col-12">
                        <?php
                            echo "<p>l) Tipo de Embarcação <strong>". $retornoEmb[0]->tipo_embarcacao ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->tipo_embarcacao ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>m) Material do Casco <strong>". $retornoEmb[0]->material_casco ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->material_casco ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>n) Motorização Máxima <strong>". $retornoEmb[0]->motorizacao_max ." HP</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->motorizacao_max ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>o) Motorização Minima <strong>". $retornoEmb[0]->motorizacao_min ." HP</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->motorizacao_min ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>p) Ano de Construção <strong>". $retornoCli[0]->ano_construcao_emb ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->ano_construcao_emb ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>q) N do Casco/Chassi <strong>". $retornoCli[0]->chassi_emb ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->chassi_emb ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>r) N de Inscrição<strong>". $retornoEmb[0]->num_inscricao ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->num_inscricao ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>s) Armador <strong>". $retornoCli[0]->nome ." / ". $retornoCli[0]->cpf_cnpj . "</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->nome ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cpf_cnpj ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>t) Endereço <strong>". $retornoCli[0]->logradouro .", ". $retornoCli[0]->numero . " ". $retornoCli[0]->complementos ." - ". $retornoCli[0]->bairro ." - ". $retornoCli[0]->cidade . "/". $retornoCli[0]->estado ." - CEP". $retornoCli[0]->cep ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->logradouro ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->numero ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->complementos ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->bairro ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cidade ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->estado ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cep ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>Atende as prescrições aplicáveis constantes na norma NORMAM-211/DPC e apresenta condições de segurança, estabilidade e estruturais satisfatórias, para operar com a seguinte capacidade de pessoas:</p><br>";  
                            echo "<p>Tipulantes: <strong>". $retornoEmb[0]->num_tripulantes ."</strong></p><br>";   
                            echo "<p>Passageiros: <strong>". $retornoEmb[0]->num_passageiros ."</strong></p><br>";   
                            echo "<p>Certifico, ainda, que a embarcação foi constrída em conformidade com as normas e regulamentos nacionais em vigor.</p><br>";   
                            echo "<p>Declaro outrossim que qualquer modificação de lastreamento, trancagem, arranjo geral ou alteração de qualquer monta, bem como incidentes ou sinistros, invalidam a presente declaração.</p><br>";   
                            echo "<p>". $retornoEst[0]->cidade . "/". $retornoEst[0]->estado .", " . date('d/m/y') ."</p>";   
                          
                        ?> 
                    </div>

                    <div class="col-12  mx-auto mt-4 pt-2">
                        <a href="index.php?controle=clienteController&metodo=update&id=<?php echo $retornoCli[0]->id_cliente; ?>">
                            <button type="button" class="btn btn-salvar btn-md rounded-pill text-white">
                                Alterar informações
                            </button>
                        </a>
                        <a href="">
                            <button type="submit" class="btn btn-del btn-md rounded-pill text-white">
                                Gerar Documento PDF
                            </button>
                        </a>
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