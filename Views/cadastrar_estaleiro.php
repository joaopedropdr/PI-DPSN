<?php
require_once "navbar_adm.php";
?>

<style>
    .cor-texto {
        color: #0C3252;
    }

    .cor-fundo-input{
        background-color: #D9EEFF;   
    }

    .cor-fundo-btn{
        background-color: #0C3252;   
    }
</style>

<div class="container py-5 text-center cor-texto">
    <h1 class="display-4 fw-bold mb-5">Cadastrar Estaleiro</h1>

    <form class="p-4 bg-light">
        <h2 class="text-start text-uppercase fs-4">Dados do Estaleiro</h2>

        <div class="col justify-content-center g-5 text-start">
            <div class="col-12 mb-3">
                <label for="nome_estaleiro" class="form-label text-uppercase fs-6">Nome</label>
                <input required type="text" class="form-control cor-fundo-input" id="nome_estaleiro" placeholder="Digite o Nome do Estaleiro">
            </div>

            <div class="col-12 mb-3">
                <label for="email_estaleiro" class="form-label text-uppercase fs-6">Email</label>
                <input required type="email" class="form-control cor-fundo-input" id="email_estaleiro" placeholder="Digite o Email de Cadastro do Estaleiro">
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="cnpj_estaleiro" class="form-label text-uppercase fs-6">CNPJ</label>
                    <input required type="text" class="form-control cor-fundo-input" id="cnpj_estaleiro" placeholder="Digite o CNPJ do Estaleiro">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="telefone_estaleiro" class="form-label text-uppercase fs-6">Telefone</label>
                    <input required type="number" class="form-control cor-fundo-input" id="telefone_estaleiro" placeholder="Somente números">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="cep_estaleiro" class="form-label text-uppercase fs-6">CEP</label>
                    <input required type="number" class="form-control cor-fundo-input" id="cep_estaleiro" placeholder="Somente números">
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-10 mb-3">
                    <label for="logradouro_estaleiro" class="form-label text-uppercase fs-6">Logradouro</label>
                    <input required type="text" class="form-control cor-fundo-input" id="logradouro_estaleiro" placeholder="Logradouro do Estaleiro">
                </div>
                <div class="col-2 mb-3">
                    <label for="numero_estaleiro" class="form-label text-uppercase fs-6">Nº</label>
                    <input required type="number" class="form-control cor-fundo-input" id="numero_estaleiro" placeholder="Nº">
                </div>
            </div>

            <div class="col-12 mb-3">
                <label for="complemento_estaleiro" class="form-label text-uppercase fs-6">Complemento</label>
                <input type="email" class="form-control cor-fundo-input" id="complemento_estaleiro" placeholder="Se houver, digite o Complemento">
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="bairro_estaleiro" class="form-label text-uppercase fs-6">Bairro</label>
                    <input required type="text" class="form-control cor-fundo-input" id="bairro_estaleiro" placeholder="Bairro do Estaleiro">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="cidade_estaleiro" class="form-label text-uppercase fs-6">Telefone</label>
                    <input required type="number" class="form-control cor-fundo-input" id="cidade_estaleiro" placeholder="Cidade do Estaleiro">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="estado_estaleiro" class="form-label text-uppercase fs-6">CEP</label>
                    <input required type="number" class="form-control cor-fundo-input" id="estado_estaleiro" placeholder="Estado do Estaleiro">
                </div>
            </div>

            <button type="submit" class="btn btn-primary col-12 text-uppercase cor-fundo-btn border-0 rounded-0">Finalizar Cadastro</button>
        </div>
    </form>
</div>

</main>
<?php
require_once "footer.html";
?>
</body>

</html>