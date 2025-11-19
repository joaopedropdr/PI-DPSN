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
    <h1 class="display-4 fw-bold mb-5">Cadastrar Estaleiro</h1>

    <form class="p-4 bg-light" action="#" method="post">
        <h2 class="text-start text-uppercase fs-4">Dados do Estaleiro</h2>

        <div class="col justify-content-center g-5 text-start">
            <div class="col-12 mb-3">
                <label for="nome_estaleiro" class="form-label text-uppercase fs-6">Nome</label>
                <input type="text" class="form-control cor-fundo-input" id="nome_estaleiro" name="nome" placeholder="Digite o Nome do Estaleiro">
                <div class="col-12 text-danger"><?php echo $msg[0];?></div>
            </div>

            <div class="col-12 mb-3">
                <label for="nome_empresa" class="form-label text-uppercase fs-6">Nome da empresa</label>
                <input type="text" class="form-control cor-fundo-input" id="nome_empresa" name="nome_empresa" placeholder="Digite o Nome do cnpj do estaleiro">
                <div class="col-12 text-danger"><?php echo $msg[1];?></div>
            </div>

            <div class="row justify-content-between">
                <div class="col-6 mb-3">
                    <label for="email_estaleiro" class="form-label text-uppercase fs-6">Email</label>
                    <input type="email" class="form-control cor-fundo-input" id="email_estaleiro" name="email" placeholder="Digite o Email de Cadastro do Estaleiro">
                    <div class="col-6 text-danger"><?php echo $msg[2];?></div>
                </div>
                <div class="col-6 mb-3">
                    <label for="senha_estaleiro" class="form-label text-uppercase fs-6">Senha</label>
                    <input type="text" class="form-control cor-fundo-input" id="senha_estaleiro" name="senha" placeholder="Digite a senha de cadastro">
                    <div class="col-6 text-danger"><?php echo $msg[3];?></div>
                </div>   
            </div>


            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="cnpj_estaleiro" class="form-label text-uppercase fs-6">CNPJ</label>
                    <input type="text" class="form-control cor-fundo-input" id="cnpj_estaleiro" name="cnpj" placeholder="Digite o CNPJ do Estaleiro">
                    <div class="col-12 text-danger"><?php echo $msg[4];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="telefone_estaleiro" class="form-label text-uppercase fs-6">Telefone</label>
                    <input type="text" class="form-control cor-fundo-input" id="telefone_estaleiro" name="telefone" placeholder="Somente números">
                    <div class="col-12 text-danger"><?php echo $msg[5];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="cep_estaleiro" class="form-label text-uppercase fs-6">CEP</label>
                    <input type="text" class="form-control cor-fundo-input" id="cep_estaleiro" name="cep" placeholder="Somente números">
                    <div class="col-12 text-danger"><?php echo $msg[6];?></div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-10 mb-3">
                    <label for="logradouro_estaleiro" class="form-label text-uppercase fs-6">Logradouro</label>
                    <input type="text" class="form-control cor-fundo-input" id="logradouro_estaleiro" name="logradouro" placeholder="Logradouro do Estaleiro">
                    <div class="col-10 text-danger"><?php echo $msg[7];?></div>
                </div>
                <div class="col-2 mb-3">
                    <label for="numero_estaleiro" class="form-label text-uppercase fs-6">Nº</label>
                    <input type="text" class="form-control cor-fundo-input" id="numero_estaleiro" name="numero" placeholder="Nº">
                    <div class="col-3 text-danger"><?php echo $msg[8];?></div>
                </div>   
            </div>

            <div class="col-12 mb-3">
                <label for="complemento_estaleiro" class="form-label text-uppercase fs-6">Complemento</label>
                <input type="text" class="form-control cor-fundo-input" id="complemento_estaleiro" name="complemento" placeholder="Se houver, digite o Complemento">
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="bairro_estaleiro" class="form-label text-uppercase fs-6">Bairro</label>
                    <input type="text" class="form-control cor-fundo-input" id="bairro_estaleiro" name="bairro" placeholder="Bairro do Estaleiro">
                    <div class="col-12 text-danger"><?php echo $msg[9];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="cidade_estaleiro" class="form-label text-uppercase fs-6">Cidade</label>
                    <input type="text" class="form-control cor-fundo-input" id="cidade_estaleiro" name="cidade" placeholder="Cidade do Estaleiro">
                    <div class="col-12 text-danger"><?php echo $msg[10];?></div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select cor-fundo-input" required>
                            <option value=''>Estados</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP </option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS </option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR </option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN </option>
                            <option value="RN">SP</option>
                        </select>
                    <div class="col-12 text-danger"><?php echo $msg[11];?></div>
                </div>  
            </div>

            <button type="submit" class="btn btn-primary col-12 text-uppercase btn-salvar">Finalizar Cadastro</button>
        </div>
    </form>
</div>

</main>
<?php
require_once "footer.html";
?>
</body>

</html>