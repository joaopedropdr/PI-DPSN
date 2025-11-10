<?php
require_once "navbar_adm.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estaleiros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Fonte Noto Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #89B9E4;
            font-family: 'Noto Sans', sans-serif;
        }

        .title-color {
            color: #002A3D;
        }

        .divider {
            height: 2px;
            background-color: #5FA8D3;
            width: 90%;
            margin: 0 auto 20px auto;
        }

        .card-hover {
            transition: transform 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }

        .btn-custom {
            background-color: #5FA8D3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #4a8fc1;
            transform: scale(1.05);
        }

        /* Altura das imagens dos estaleiros */
        .estaleiro-img {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="mb-4">
            <a href="javascript:history.back()" class="btn text-dark p-0">
                <i class="fas fa-arrow-left me-2"></i>Voltar
            </a>
        </div>

        <!-- Título -->
        <div class="text-center mb-5">
            <h1 class="title-color fw-bold display-4 mb-3">Estaleiros</h1>
            <h2 class="title-color fs-5">Todos os cadastros de Estaleiros no sistema.</h2>
        </div>

        <!--Cards-->
        <div class="mb-5">
            <h3 class="fw-semibold title-color mb-3 text-center">Estaleiros cadastrados</h3>
            <div class="divider"></div>
            <div class="row g-4">
                <!--Estaleiro exemplo-->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="#" class="card-img-top estaleiro-img" alt="Estaleiro 1">
                        <div class="card-body">
                            <h5 class="card-title">Estaleiro 1</h5>
                            <p class="card-text">Localizado em Itajaí/SC, especializado em construção e reparo naval.</p>
                            <p class="card-text"><small class="text-muted">Cadastrado em: 12/05/2023</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="#" class="card-img-top estaleiro-img" alt="Estaleiro 2">
                        <div class="card-body">
                            <h5 class="card-title">Estaleiro 2</h5>
                            <p class="card-text">Em Rio Grande/RS, atua na construção de embarcações de grande porte.</p>
                            <p class="card-text"><small class="text-muted">Cadastrado em: xx/xx/xxxx</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="#" class="card-img-top estaleiro-img" alt="Estaleiro 3">
                        <div class="card-body">
                            <h5 class="card-title">Estaleiro 3</h5>
                            <p class="card-text">Localizado em Santos/SP, especializado em reparos e manutenção.</p>
                            <p class="card-text"><small class="text-muted">Cadastrado em: xx/xx/xxxx</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão adicionar estaleiro -->
        <div class="mt-5 pt-4 text-center">
            <h3 class="fw-semibold title-color mb-3" >Outras ações</h3>
            <div class="divider"></div>
            <button class="btn btn-custom btn-lg">
                <a href="index.php?controle=estaleiroController&metodo=inserir">
                    Cadastrar Estaleiro <i class="fas fa-plus-circle me-2"></i>
                </a>
            </button>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</main>
<?php
require_once "footer.html";
?>
</body>
</html>
