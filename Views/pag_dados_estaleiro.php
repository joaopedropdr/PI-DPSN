<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once "navbar_est.php";
?>
    <style>
        .shipyard-card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 900px; 
            width: 100%;
            border: 3px solid #0C3252;
        }

        .data-value {
            font-weight: 600; /* Semelhante a fw-bold do Bootstrap */
            color: #333;
            margin-bottom: 1.5rem; /* Espaçamento entre os blocos de dados */
            word-wrap: break-word; /* Garante que textos longos se ajustem */
        }
    </style>
</head>
<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center p-3">
        <div class="card shipyard-card bg-light">
            <div class="card-body">
                <div class="row mb-4 align-items-center">
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <img class="w-50" src="imgs/LOGO_colorido-svg.svg" alt="Logo da empresa">
                        <p class="h6 mt-1 text-uppercase text-secondary" style="font-size: 0.75rem;">DPSN</p>
                    </div>
                    <div class="col-12 col-md-9">
                        <h4 class="card-title mb-0">Dados do Estaleiro</h4>
                        <p class="text-muted">Informações de perfil e contato.</p>
                    </div>
                </div>

                <div class="row g-3">   
                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Nome</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['nome']) . "</p>";
                            } 
                        ?>
                    </div> 

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Nome da empresa</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['nome_empresa']) . "</p>";
                            } 
                        ?>                        
                    </div>  

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">CNPJ</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['cnpj']) . "</p>";
                            } 
                        ?>  
                    </div>  

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Telefone</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['telefone']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">E-mail</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['email']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">CEP</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['cep']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Logradouro</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['logradouro']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Complementos</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                if(empty($_SESSION["complementos"])) {
                                    echo "<p class='data-value'>N/A</p>";
                                } else {
                                    echo "<p class='data-value'>" . htmlspecialchars($_SESSION["complementos"]) . "</p>";
                                }
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Bairro</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['bairro']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Cidade</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['cidade']) . "</p>";
                            } 
                        ?>  
                    </div>

                    <div class="col-12 col-md-4">
                        <h6 class="text-muted mb-0">Estado</h6>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<p class='data-value'>" . htmlspecialchars($_SESSION['estado']) . "</p>";
                            } 
                        ?>  
                    </div>
                </div>
                
                <div class="d-grid gap-2 col-6 mx-auto mt-4 pt-2">
                    <button type="button" class="btn btn-primary btn-lg rounded-pill" style="background-color: #004c8c; border-color: #004c8c;">
                        Alterar informações
                    </button>
                </div>

            </div>
        </div>

    </div>
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>