<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DPSN - Login Administrador</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonte Noto Sans -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans', sans-serif;
      background-color: #f4faff;
      margin: 0;
      padding: 0;
    }

    .gradiente-bg {
      background-image: linear-gradient(to right, #135A9A 0%, #89B9E4 50%, #135A9A 100%);
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      display: flex;
      background: #fff;
      border: 5px solid #a4c8eb;
      border-radius: 6px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 750px;
      width: 100%;
    }

    .login-left {
      background-color: #e8f2fc;
      flex: 1;
      text-align: center;
      padding: 40px 20px;
    }

    .login-left img {
      width: 90px;
      margin-bottom: 10px;
    }

    .login-left h3 {
      color: #2b4e75;
      margin-bottom: 10px;
    }

    .login-left p {
      color: #2b4e75;
      font-size: 13px;
      margin: 0;
    }

    .login-right {
      flex: 1.3;
      padding: 40px;
    }

    .login-right h2 {
      color: #2b4e75;
      font-size: 22px;
      margin-bottom: 5px;
    }

    .login-right h2 span {
      color: #4aa3e0;
    }

    .subtitle {
      font-size: 14px;
      color: #666;
      margin-bottom: 25px;
    }

    .form-control {
      background-color: #f4faff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-control:focus {
      border-color: #4aa3e0;
      box-shadow: none;
      background-color: #fff;
    }

    .btn-primary {
      background-color: #4aa3e0;
      border: none;
      border-radius: 5px;
      width: 100%;
      transition: 0.2s;
    }

    .btn-primary:hover {
      background-color: #3b8fc7;
    }

    .voltar {
      position: absolute;
      top: 20px;
      left: 20px;
      color: #4aa3e0;
      text-decoration: none;
      font-size: 14px;
    }

    .voltar:hover {
      text-decoration: underline;
    }

    .logo-topo {
      position: absolute;
      top: 20px;
      right: 40px;
      display: flex;
      align-items: center;
      gap: 5px;
      color: #2b4e75;
      font-weight: 600;
    }

    .logo-topo img {
      width: 24px;
    }

    .footer-links a {
      color: #4aa3e0;
      text-decoration: none;
      font-size: 13px;
      margin: 0 6px;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    .copyright {
      font-size: 12px;
      color: #666;
      margin-top: 10px;
    }

    @media (max-width: 768px) {
      .login-card {
        flex-direction: column;
      }

      .login-left, .login-right {
        width: 100%;
      }
    }
  </style>
</head>
<body class="gradiente-bg">

  <a href="#" class="voltar">← Voltar</a>

  <div class="logo-topo">
    <img src="imgs/LOGO_colorido-svg.svg" alt="Logo DPSN">
    <span>DPSN</span>
  </div>

  <div class="login-container">
    <div class="login-card">

      <!-- Lado esquerdo -->
      <div class="login-left">
        <img src="imgs/LOGO_colorido-svg.svg" alt="Logo DPSN">
        <h3>DPSN</h3>
        <p>Solução que a DPSN faz pelas empresas de embarcações.</p>
      </div>

      <!-- Lado direito -->
      <div class="login-right">
        <h2>Entrar como <span>Administrador</span></h2>
        <p class="subtitle">Insira suas credenciais para acessar o sistema.</p>

        <form action="login.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
              type="email" 
              class="form-control" 
              id="email" 
              name="email" 
              placeholder="Digite aqui o email cadastrado" 
              required>
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input 
              type="password" 
              class="form-control" 
              id="senha" 
              name="senha" 
              placeholder="Digite aqui a sua senha de acesso" 
              required>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="manterConectado" name="manterConectado">
              <label class="form-check-label" for="manterConectado">Continuar conectado</label>
            </div>
            <a href="#" class="text-decoration-none text-primary">Esqueceu a senha?</a>
          </div>

          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

        <div class="text-center footer-links mt-3">
          <a href="#">Entrar como Funcionário</a> |
          <a href="#">Entrar como Estaleiro</a>
        </div>

        <div class="text-center copyright">
          © 2025 DPSN | Todos os direitos reservados
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
