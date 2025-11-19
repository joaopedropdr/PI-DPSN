<?php
require_once "navbar_adm.php";
?>

<style>
    .cor-texto {
        color: #0C3252;
    }

    .cor-fundo-input {
        background-color: #D9EEFF;
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

<div class="container py-5 text-center cor-texto">
    <h1 class="display-4 fw-bold mb-5">Cadastrar Embarcação</h1>

    <form class="p-4 bg-light rounded-3" method="POST">
        <h2 class="text-start text-uppercase fs-4">Dados da Embarcação</h2>

        <div class="col justify-content-center g-5 text-start ">
            <div class="col-12 mb-3">
                <select class="form-select cor-fundo-input cor-texto" aria-label="Estaleiro" name="estaleiro">
                    <option selected>Estaleiro</option>
                    <option value="1">Estaleiro 1</option>
                    <option value="2">Estaleiro 2</option>
                    <option value="3">Estaleiro 3</option>
                </select>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-6 mb-3">
                    <label for="modelo_embarcacao" class="form-label text-uppercase fs-6">nome do Modelo</label>
                    <input type="text" class="form-control cor-fundo-input" id="modelo_embarcacao" name="nome" placeholder="Digite o Nome do Modelo da Embarcação">
                    <div class="col-12 col-mb-6 mx-1 text-danger"><?php echo $msg[1];?></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="comp_embarcacao" class="form-label text-uppercase fs-6">Comprimento Total</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="comp_embarcacao" name="comp_total"
                        placeholder="Digite o Comp. Total da Embarcação">
                        <div class="col-12 col-mb-6 mx-1 text-danger"><?php echo $msg[2];?></div>
                </div>
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-md-3 mb-3">
                    <label for="boca_embarcacao" class="form-label text-uppercase fs-6">Boca Moldada</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="boca_embarcacao"name="boca_mold" placeholder="Informe a Boca Mold.">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[3];?></div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="ponta_embarcacao" class="form-label text-uppercase fs-6">Pontal Moldada</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="ponta_embarcacao" name="pontal_mold"
                        placeholder="Informe o Pontal Mold.">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[4];?></div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="calado_max_embarcacao" class="form-label text-uppercase fs-6">Calado Maxímo</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="calado_max_embarcacao" name="calado_max"
                        placeholder="Informe o Calado Max.">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[5];?></div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="calado_leve_embarcacao" class="form-label text-uppercase fs-6">Calado Leve</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="calado_leve_embarcacao" name="calado_leve"
                        placeholder="Informe o Calado Leve">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[6];?></div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="arq_bruta_embarcacao" class="form-label text-uppercase fs-6">Arqueação Bruta</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="arq_bruta_embarcacao" name="arq_bruta"
                        placeholder="Digite a Arq. Bruta da Embarcação">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[7];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="arq_liquida_embarcacao" class="form-label text-uppercase fs-6">Arqueação Liquida</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="arq_liquida_embarcacao" name="arq_liquida"
                        placeholder="Digite a Arq. Líquida da Embarcação">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[8];?></div>
                </div>
                <div class="col-12 col-md-1 mb-3">
                    <label for="tpb_embarcacao" class="form-label text-uppercase fs-6">TPB</label>
                    <input  type="number" step="any" class="form-control cor-fundo-input" id="tpb_embarcacao" name="tpb"
                        placeholder="TPB">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[9];?></div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="contorno_embarcacao" class="form-label text-uppercase fs-6">Contorno</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="contorno_embarcacao" name="contorno"
                        placeholder="Informe o Contorno da Embarcação">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[10];?></div>
                </div>
                
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="lastro_embarcacao" class="form-label text-uppercase fs-6">Lastro</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="lastro_embarcacao" name="lastro"
                        placeholder="Informe o Lastro da Embarcação">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="area_naval" class="form-label text-uppercase fs-6">Área de Navegação / Tipo de Serviço</label>
                    <input type="text" class="form-control cor-fundo-input" id="area_naval" name="an_ts"
                        placeholder="Informe a Área Naval ou Tipo de Serviço">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[11];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="tipo_embarcacao" class="form-label text-uppercase fs-6">Tipo de Embarcação</label>
                    <input type="text" class="form-control cor-fundo-input" id="tipo_embarcacao" name="tipo_emb"
                        placeholder="Digite o Tipo da Embarcação">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[12];?></div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="material_casco_embarcacao" class="form-label text-uppercase fs-6">Material do Casco</label>
                    <input type="text" class="form-control cor-fundo-input" id="material_casco_embarcacao" name="material_casco"
                        placeholder="Informe o Material que o Casco é feito">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[13];?></div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="mot_max_embarcacao" class="form-label text-uppercase fs-6">Motorização Máxima</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="mot_max_embarcacao" name="mot_max"
                        placeholder="Motorização Máxima">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[14];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="mot_min_embarcacao" class="form-label text-uppercase fs-6">Motorização Mínima</label>
                    <input type="number" step="any" class="form-control cor-fundo-input" id="mot_min_embarcacao" name="mot_min"
                        placeholder="Motorização Mínima">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="num_tripulantes_embarcacao" class="form-label text-uppercase fs-6">Nº de Tripulantes</label>
                    <input type="number" class="form-control cor-fundo-input" id="num_tripulantes_embarcacao" name="tripulantes"
                    placeholder="Digite o Nº de Tripulantes">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[15];?></div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="num_passageiros_embarcacao" class="form-label text-uppercase fs-6">Nº de Passageiros</label>
                    <input type="number" class="form-control cor-fundo-input" id="num_passageiros_embarcacao" name="passageiros"
                    placeholder="Digite o Nº de Passageiros">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[16];?></div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="num_inscricao_embarcacao" class="form-label text-uppercase fs-6">Nº de Inscrição</label>
                    <input type="number" class="form-control cor-fundo-input" id="num_inscricao_embarcacao" name="inscricao"
                        placeholder="Digite o Nº de Inscrição">
                </div>
            </div>

            <button type="submit"class="btn btn-primary btn-salvar col-12 text-uppercase border-0">Finalizar Cadastro</button>
        </div>
    </form>
</div>

</main>
<?php
require_once "footer.html";
?>
</body>

</html>