
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Fonte Noto Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e04725def3.js" crossorigin="anonymous"></script>
    
    <title>Gerenciador - DPSN</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
        }

        .logo {
            width: 100px;
            height: 70px;
        }
        .logo-footer {
            width: 200px;
            height: 200px;
        }
        .gradiente-bg {
            background-image: linear-gradient(to right, #135A9A 0%, #89B9E4 50%, #135A9A 100%);
        }
        .bg-footer {
            background-color: #091E31;
        }

        .custom-underline {
            position: relative; 
            text-decoration: none; 
            display: inline-block;
        }

        .custom-underline::after {
            content: '';
            position: absolute; 
            left: 0; 
            bottom: -3px; 
            width: 100%; 
            height: 2px;
            background-color: #091E31;   
            transform: scaleX(0); 
            transform-origin: bottom left; 
            transition: transform 0.3s ease-out;
        }

        .custom-underline:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left; 
            font-weight: bold;
        }
    </style> 
</head>
<body class="gradiente-bg d-flex flex-column min-vh-100"> 
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="ligth">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="index.php?controle=inicioController&metodo=inicioAdm"><img src="imgs/LOGO_colorido-svg.svg" alt="Logo da empresa"class="logo"></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link custom-underline" aria-current="page" href="index.php?controle=inicioController&metodo=inicioAdm">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-underline" href="">Emitir documento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-underline" href="#">Baixar documento</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link custom-underline" href="index.php?controle=administradorController&metodo=selectNome">Estaleiros</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link custom-underline" href="index.php?controle=administradorController&metodo=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- A <main> com o flex-grow: 1 faz com que todo o conteúdo abaixo dela seja empurrado para baixo, fazendo com que o footer sempre fique na parte inferior da tela. -->
    <!-- Ela precisa ser fechada no final de todas as páginas, antes do fechamento da tag <body>. -->
    <main class="flex-grow-1"> 
