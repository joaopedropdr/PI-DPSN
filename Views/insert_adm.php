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
    <h1 class="display-4 fw-bold mb-5">Cadastrar adm</h1>

    <form class="p-4 bg-light" action="#" method="post">
        <h2 class="text-start text-uppercase fs-4">Dados do adm</h2>

            <div class="row justify-content-between">
                <div class="col-6 mb-3">
                    <label for="email_estaleiro" class="form-label text-uppercase fs-6">Email</label>
                    <input type="email" class="form-control cor-fundo-input" id="email_estaleiro" name="email" placeholder="Digite o Email de Cadastro do Estaleiro">
                    <div class="col-12 text-danger"><?php echo $msg[0];?></div>
                </div>
                <div class="col-6 mb-3">
                    <label for="senha_estaleiro" class="form-label text-uppercase fs-6">Senha</label>
                    <input type="text" class="form-control cor-fundo-input" id="senha_estaleiro" name="senha" placeholder="Digite a senha de cadastro">
                    <div class="col-12 text-danger"><?php echo $msg[1];?></div>
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