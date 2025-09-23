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

    .cor-fundo-btn {
        background-color: #0C3252;
    }
</style>

<div class="container py-5 text-center cor-texto">
    <h1 class="display-4 fw-bold mb-5">Cadastrar Embarcação</h1>

    <form class="p-4 bg-light">
        <h2 class="text-start text-uppercase fs-4">Dados da Embarcação</h2>

        <div class="col justify-content-center g-5 text-start">
            <div class="col-12 mb-3">
                <select class="form-select cor-fundo-input cor-texto" aria-label="Estaleiro">
                    <option selected>Estaleiro</option>
                    <option value="1">Estaleiro 1</option>
                    <option value="2">Estaleiro 2</option>
                    <option value="3">Estaleiro 3</option>
                </select>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-6 mb-3">
                    <label for="modelo_embarcacao" class="form-label text-uppercase fs-6">nome do Modelo</label>
                    <input required type="text" class="form-control cor-fundo-input" id="modelo_embarcacao"
                        placeholder="Digite o Nome do Modelo da Embarcação">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="comp_embarcacao" class="form-label text-uppercase fs-6">Comp. Total</label>
                    <input required type="text" class="form-control cor-fundo-input" id="comp_embarcacao"
                        placeholder="Digite o Comp. Total da Embarcação">
                </div>
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-md-3 mb-3">
                    <label for="boca_embarcacao" class="form-label text-uppercase fs-6">Boca Mold.</label>
                    <input required type="text" class="form-control cor-fundo-input" id="boca_embarcacao"
                        placeholder="Informe a Boca Mold.">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="ponta_embarcacao" class="form-label text-uppercase fs-6">Ponta Mold.</label>
                    <input required type="text" class="form-control cor-fundo-input" id="ponta_embarcacao"
                        placeholder="Informe a Ponta Mold.">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="calado_max_embarcacao" class="form-label text-uppercase fs-6">Calado Max.</label>
                    <input required type="number" class="form-control cor-fundo-input" id="calado_max_embarcacao"
                        placeholder="Informe o Calado Max.">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="calado_leve_embarcacao" class="form-label text-uppercase fs-6">Calado Leve</label>
                    <input required type="number" class="form-control cor-fundo-input" id="calado_leve_embarcacao"
                        placeholder="Informe o Calado Leve">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="arq_bruta_embarcacao" class="form-label text-uppercase fs-6">Arq. Bruta</label>
                    <input required type="text" class="form-control cor-fundo-input" id="arq_bruta_embarcacao"
                        placeholder="Digite a Arq. Bruta da Embarcação">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="arq_liquida_embarcacao" class="form-label text-uppercase fs-6">Arq. Liquida</label>
                    <input required type="text" class="form-control cor-fundo-input" id="arq_liquida_embarcacao"
                        placeholder="Digite a Arq. Líquida da Embarcação">
                </div>
                <div class="col-12 col-md-1 mb-3">
                    <label for="tpb_embarcacao" class="form-label text-uppercase fs-6">TPB</label>
                    <input required type="number" class="form-control cor-fundo-input" id="tpb_embarcacao"
                        placeholder="TPB">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="contorno_embarcacao" class="form-label text-uppercase fs-6">Contorno Embarcação</label>
                    <input required type="text" class="form-control cor-fundo-input" id="contorno_embarcacao"
                        placeholder="Informe o Contorno da Embarcação">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-3 mb-3">
                    <label for="lastro_embarcacao" class="form-label text-uppercase fs-6">Lastro</label>
                    <input required type="text" class="form-control cor-fundo-input" id="lastro_embarcacao"
                        placeholder="Informe o Lastro da Embarcação">
                </div>
                <div class="col-12 col-md-5 mb-3">
                    <label for="area_naval" class="form-label text-uppercase fs-6">Área Naval / Tipo de Serviço</label>
                    <input required type="text" class="form-control cor-fundo-input" id="area_naval"
                        placeholder="Informe a Área Naval ou Tipo de Serviço">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="tipo_embarcacao" class="form-label text-uppercase fs-6">Tipo de Embarcação</label>
                    <input required type="text" class="form-control cor-fundo-input" id="tipo_embarcacao"
                        placeholder="Digite o Tipo da Embarcação">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-3 mb-3">
                    <label for="material_casco_embarcacao" class="form-label text-uppercase fs-6">Material do Casco</label>
                    <input required type="text" class="form-control cor-fundo-input" id="material_casco_embarcacao"
                        placeholder="Informe o Material que o Casco é feito">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="cor_embarcacao" class="form-label text-uppercase fs-6">Cor Predominante</label>
                    <input required type="text" class="form-control cor-fundo-input" id="cor_embarcacao"
                        placeholder="Cor Predominante">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="mot_max_embarcacao" class="form-label text-uppercase fs-6">Mot. Máxima</label>
                    <input required type="number" class="form-control cor-fundo-input" id="mot_max_embarcacao"
                        placeholder="Mot. Máxima">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="mot_min_embarcacao" class="form-label text-uppercase fs-6">Mot. Mínima</label>
                    <input required type="number" class="form-control cor-fundo-input" id="mot_min_embarcacao"
                        placeholder="Mot. Mínima">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="num_inscricao_embarcacao" class="form-label text-uppercase fs-6">Nº de Inscrição</label>
                    <input required type="number" class="form-control cor-fundo-input" id="num_inscricao_embarcacao"
                        placeholder="Digite o Nº de Inscrição">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="num_tripulantes_embarcacao" class="form-label text-uppercase fs-6">Nº de Tripulantes</label>
                    <input required type="number" class="form-control cor-fundo-input" id="num_tripulantes_embarcacao"
                        placeholder="Digite o Nº de Tripulantes">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="num_passageiros_embarcacao" class="form-label text-uppercase fs-6">Nº de Passageiros</label>
                    <input required type="number" class="form-control cor-fundo-input" id="num_passageiros_embarcacao"
                        placeholder="Digite o Nº de Passageiros">
                </div>
            </div>

            <button type="submit"
                class="btn btn-primary col-12 text-uppercase cor-fundo-btn border-0 rounded-0">Finalizar
                Cadastro</button>
        </div>
    </form>
</div>

</main>
<?php
require_once "footer.html";
?>
</body>

</html>