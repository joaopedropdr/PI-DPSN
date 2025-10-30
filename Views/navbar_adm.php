
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e04725def3.js" crossorigin="anonymous"></script>
    
    <title>Gerenciador - DPSN</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-cor d-flex flex-column min-vh-100"> 
    <style>
        .logo {
            width: 100px;
            height: 70px;
        }
        .logo-footer {
            width: 200px;
            height: 200px;
        }
        .bg-cor {
            background-color: #89B9E4;
        }
        .bg-footer {
            background-color: #091E31;
        }
    </style> 
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="ligth">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="#"><img src="imgs/LOGO_colorido-svg.svg" alt="Logo da empresa"class="logo"></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controle=usuarioController&metodo=inserir">Emitir documento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Baixar documento</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Estaleiros</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- A <main> com o flex-grow: 1 faz com que todo o conteúdo abaixo dela seja empurrado para baixo, fazendo com que o footer sempre fique na parte inferior da tela. -->
    <!-- Ela precisa ser fechada no final de todas as páginas, antes do fechamento da tag <body>. -->
    <main class="flex-grow-1"> 
