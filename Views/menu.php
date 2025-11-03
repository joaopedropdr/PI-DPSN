<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerenciador DPSN </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e04725def3.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #89B9E4; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            margin: 0;
        }
        .login-card {
            background-color: #FFF; 
            color: #0C3252;
            max-width: 700px;
            width: 90%;
            border: 3px solid #0C3252; 
        }

        .logo-img {
            width: 200px; 
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #5FA8D3; 
        
        }
        .btn-primary:hover {
            background-color: #3B7A9F;
    
        }

    </style>
</head>
<body>
    <div class=" p-5 rounded text-center login-card">
        <h1 class="display-5 fw-bold text-dark-blue mb-2">Gerenciador - DPSN</h1>
        <p class=" mb-4">Bem-vindo ao nosso gerenciador de documentos náuticos!</p>
        <img src="../imgs/LOGO_colorido-svg.svg" alt="Logo DPSN" class="logo-img">
        <div class=" gap-3 d-sm-flex justify-content-sm-center">
            <a href="#" class="btn btn-primary btn-lg px-4 me-sm-3 rounded-pill border border-0">Entrar como estaleiro</a>
            
            <a href="#" class="btn btn-primary btn-lg px-4 rounded-pill border border-0">Entrar como administrador</a>
        </div>
    </div>
</body>
</html>