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
    <h1 class="display-4 fw-bold mb-5">Emitir dados do cliente</h1>

    <form class="p-4 bg-light rounded-3" method="POST">
        <h2 class="text-start text-uppercase fs-4">Dados do cliente</h2>

        <div class="col justify-content-center g-5 text-start ">
            <div class="col-12 mb-3">
                <?php
                foreach($retornoEmb as $embarcacao) {
                    echo "<label for='embarcacao'></label>
                    <select class='form-select cor-fundo-input cor-texto' aria-label='Estaleiro' id='embarcacao' name='embarcacao'>
                        <option selected>Embarcações</option>
                        <option value='$embarcacao->id_embarcacao'>$embarcacao->nome</option>
                    </select>";
                }
                ?>
                <div class="col-12 mb-3 mx-1 text-danger"><?php echo $msg[0];?></div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-6 mb-3">
                    <label for="ano_construcao_emb" class="form-label text-uppercase fs-6">Ano de construção da Embarcação</label>
                    <input type="" step="any" class="form-control cor-fundo-input" id="ano_construcao_emb" name="ano_construcao_emb" placeholder="Informe o Ano de construção da embarcação">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[1];?></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="chassi_emb" class="form-label text-uppercase fs-6">Chassi da Embarcação</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="chassi_emb" name="chassi_emb"
                        placeholder="Digite o chassi da embarcação">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[2];?></div>
                </div>
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="nome" class="form-label text-uppercase fs-6">Nome</label>
                    <input type="text" class="form-control cor-fundo-input" id="nome" name="nome" placeholder="Digite o nome do cliente">
                    <div class="col-12 col-mb-6 mx-1 text-danger"><?php echo $msg[3];?></div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="cpf_cnpj" class="form-label text-uppercase fs-6">CPF / CNPJ</label>
                    <input type="text" step="any" class="form-control cor-fundo-input" id="cpf_cnpj" name="cpf_cnpj"
                        placeholder="Digite o CPF ou CNPJ do cliente">
                        <div class="col-12 col-mb-6 mx-1 text-danger"><?php echo $msg[4];?></div>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="cep" class="form-label text-uppercase fs-6">CEP</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="cep" name="cep"
                        placeholder="Digite o CEP do cliente">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[5];?></div>
                </div>

            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-10 mb-3">
                    <label for="logradouro" class="form-label text-uppercase fs-6">Logradouro</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="logradouro" name="logradouro"
                        placeholder="Digite o logradouro do cliente. Ex: Rua tal tal, Avenida joao silva">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[6];?></div>
                </div>

                <div class="col-12 col-md-2 mb-3">
                    <label for="numero" class="form-label text-uppercase fs-6">Numero</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="numero" name="numero">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[7];?></div>
                </div>       
            </div>

            <div class="row justify-content-between">
                <div class="col-12 mb-3">
                    <label for="complementos" class="form-label text-uppercase fs-6">Complementos</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="complementos" name="complementos"
                        placeholder="Digite um complemento se haver um. Ex: Apartamento 102">
                        
                </div>     
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <label for="bairro" class="form-label text-uppercase fs-6">Bairro</label>
                    <input  type="text" step="any" class="form-control cor-fundo-input" id="bairro" name="bairro"
                        placeholder="Digite o bairro do cliente">
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[8];?></div>
                    
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="cidade" class="form-label text-uppercase fs-6">Cidade</label>
                    <input type="text" step="any" class="form-control cor-fundo-input" id="cidade" name="cidade"
                        placeholder="Digite a cidade do cliente">
                        <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[9];?></div>
                        
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" name="estado" class="form-select cor-fundo-input" >
                        <option value="">Estados</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP </option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="ES">ES</option>
                        <option value="DF">DF</option>
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
                    <div class="col-12 col-mb-3 mx-1 text-danger"><?php echo $msg[10];?></div>
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