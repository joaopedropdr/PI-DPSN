<?php
require_once "navbar_adm.php";
?>

<style>
    .painel {
        text-align: center;
        padding: 60px 20px 100px 20px;
    }

    .titulo {
        color: #002b5c;
        font-weight: 700;
        font-size: 2.3rem;
        margin-bottom: 60px;
    }

    .card-opcao {
        background-color: white;
        border-radius: 25px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        width: 250px;   /* aumentei o tamanho dos cards */
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .card-opcao:hover {
        transform: scale(1.07);
    }

    .card-opcao img {
        width: 150px;   
        height: 150px;
        margin-bottom: 18px;
    }

    .card-opcao span {
        color: #002b5c;
        font-weight: 700; 
        font-size: 1.2rem;
        line-height: 1.5rem;
    }

    .btn-estaleiro {
        margin-top: 70px;
        background-color: white;
        border-radius: 35px;
        border: none;
        padding: 18px 90px; 
        color: #002b5c;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        text-decoration: none;
        display: inline-block;
        font-size: 1.3rem;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-estaleiro:hover {
        background-color: #e6eef7;
        color: #002b5c;
        transform: scale(1.04);
    }

    @media (max-width: 576px) {
        .card-opcao {
            width: 170px;
            height: 170px;
            margin: 10px;
        }

        .card-opcao img {
            width: 200px;
            height: 200px;
        }

        .card-opcao span {
            font-size: 1rem;
        }

        .titulo {
            font-size: 1.7rem;
            margin-bottom: 40px;
        }

        .btn-estaleiro {
            padding: 14px 50px;
            font-size: 1.1rem;
        }
    }
</style>

<div class="painel container text-center">
    <?php
    if (isset($_SESSION["id_estaleiro"])) {
        echo "<h3 class='titulo'>" . htmlspecialchars($_SESSION['nome']) . "</h3>";
    } else {
        echo "<h3 class='titulo'>Painel do Estaleiro</h3>";
    }
    ?>

    <div class="d-flex flex-wrap justify-content-center gap-4">
        <div class="card-opcao">
            <img src="../imgs/addembarcacao.png" alt="Cadastrar Embarcações">
            <span>Cadastrar<br>Embarcações</span>
        </div>
        <div class="card-opcao">
            <img src="../imgs/assdocument.png" alt="Assinar Documentos">
            <span>Assinar<br>Documentos</span>
        </div>
        <div class="card-opcao">
            <img src="../imgs/embarcacoes.png" alt="Embarcações Cadastradas">
            <span>Embarcações<br>Cadastradas</span>
        </div>
        <div class="card-opcao">
            <img src="../imgs/solicitarnovodocumento.png" alt="Solicitar novo Documento">
            <span>Solicitar novo<br>Documento</span>
        </div>
    </div>

    <a href="index.php?controle=inicioController&metodo=meusDados" class="btn-estaleiro">Dados do Estaleiro</a>
</div>

<?php
require_once "footer.html";
?>
