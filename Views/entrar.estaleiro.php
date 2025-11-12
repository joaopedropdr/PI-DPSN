<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DPSN - Login Estaleiro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans', sans-serif;
      background-color: #f4faff;
    }
    .gradiente-bg {
      background-image: linear-gradient(to right, #135A9A 0%, #89B9E4 50%, #135A9A 100%);
    }
    .border-dpsn {
      border: 5px solid #0C3252 !important;
    }
    .text-dpsn {
      color: #5FA8D3 !important;
    }
    .btn-dpsn {
      background-color: #5FA8D3 !important;
      border: none;
    }
    .btn-dpsn:hover {
      background-color: #4b92b8 !important;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100 gradiente-bg">

  <!-- Topo -->
  <div class="container-fluid position-relative py-3">
    <a href="index.php" class="text-white text-decoration-none position-absolute start-0 ms-4">← Voltar</a>
    <div class="position-absolute end-0 me-4 d-flex align-items-center">
      <img src="imgs/LOGO_colorido-svg.svg" alt="Logo" width="24" class="me-2">
      <span class="fw-semibold text-secondary">DPSN</span>
    </div>
  </div>

  <!-- Conteúdo -->
  <div class="container d-flex justify-content-center align-items-center flex-grow-1">
    <div class="row bg-white border-dpsn rounded-3 shadow-lg overflow-hidden w-100" style="max-width: 1200px;">
      
      <!-- Lado esquerdo -->
      <div class="col-lg-5 bg-light d-flex flex-column justify-content-center align-items-center text-center p-4">
        <img src="imgs/LOGO_colorido-svg.svg" alt="Logo DPSN" width="100" class="mb-3">
        <h4 class="fw-bold text-secondary mb-2">DPSN</h4>
        <p class="small text-secondary mb-0">
          Solução que a DPSN faz pelas<br>empresas de embarcações.
        </p>
      </div>

      <!-- Lado direito -->
      <div class="col-lg-7 d-flex flex-column justify-content-center p-5">
        <h3 class="fw-semibold text-secondary mb-3">
          Entrar como <span class="text-dpsn">Estaleiro</span>
        </h3>
        <p class="text-muted small mb-4">
          Insira suas credenciais para acessar o sistema.
        </p>

        <form method="post">
          <div class="text-danger"><?php echo $msg[2];?></div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email_login" class="form-control" placeholder="Digite aqui o e-mail cadastrado">
            <div class="text-danger"><?php echo $msg[0];?></div>
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" name="senha_login" class="form-control" placeholder="Digite aqui a sua senha de acesso">
            <div class="text-danger"><?php echo $msg[1];?></div>
          </div>

          <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="manterConectado" name="manterConectado">
              <label class="form-check-label small" for="manterConectado">
                Continuar conectado
              </label>
            </div>
            <a href="#" class="small text-dpsn text-decoration-none">Esqueceu a senha?</a>
          </div>

          <button type="submit" class="btn btn-dpsn w-100 text-white fw-semibold py-2">Entrar</button>

          <div class="text-center mt-3">
            <a href="#" class="small fw-bold text-dpsn text-decoration-none">Entrar como Administrador</a>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Rodapé -->
  <footer class="text-center text-muted small py-3">
    © 2025 DPSN | Todos os direitos reservados
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
