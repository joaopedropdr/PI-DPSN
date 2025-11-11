<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once "navbar_est.php";
?>
    <style>
        .cor-texto {
            color: #0C3252;
        }
        .card-form {
            max-width: 900px;
            margin: auto; 
            border-radius: 1rem;
            border: 3px solid #0C3252;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 500;
            color: #0C3252;
        }
        .btn-salvar {
            background-color: #0C3252;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-salvar:hover {
            background-color: #1b4d83ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>

<body>
    <div class="container min-vh-100">
        <div class="card card-form mt-5 mb-5">
            <div class="card-header cor-texto rounded-top-4">
                <h3 class="mb-0 text-center"><i class="bi bi-gear-fill me-2"></i>Edição de Dados do Estaleiro</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="text-muted mb-4">Preencha e atualize as informações cadastrais do seu estaleiro. Todos os campos são obrigatórios, exceto 'Complementos'.</p>
                
                <form action="#" method="POST" class="row g-4">
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='nome' name='nome' value='". htmlspecialchars($_SESSION["nome"]) ."'required>";
                            }
                        ?>                         
                       <div class="col-12 text-danger"><?php echo $msg[0];?></div>
                    </div>

                    <div class="col-12">
                        <label for="nomeEmpresa" class="form-label">Nome da Empresa</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='nomeEmpresa' name='nome_empresa' value='". htmlspecialchars($_SESSION["nome_empresa"]) ."' required>";
                            } 
                        ?>
                        <div class="col-12 text-danger"><?php echo $msg[1];?></div>                        
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="telefone" class="form-label">Telefone</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='tel' class='form-control' id='telefone' name='telefone' placeholder='(XX) XXXXX-XXXX' value='". htmlspecialchars($_SESSION["telefone"]) ."' required>";
                            } 
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[2];?></div> 
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='cnpj' name='cnpj' placeholder='XX.XXX.XXX/XXXX-XX' value='". htmlspecialchars($_SESSION["cnpj"]) ."' required>";
                            } 
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[3];?></div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='cep' name='cep' placeholder='XXXXX-XXX' value='". htmlspecialchars($_SESSION["cep"]) ."' required>";
                            } 
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[4];?></div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='email' class='form-control' id='email' name='email' placeholder='contato@gmail.com' value='". htmlspecialchars($_SESSION["email"]) ."' required>";
                            } 
                        ?> 
                        <div class="col-12 text-danger"><?php echo $msg[5];?></div>
                    </div>

                    <div class="col-12 col-md-8">
                        <label for="logradouro" class="form-label">Logradouro (Rua/Avenida)</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='logradouro' name='logradouro' placeholder='Rua tal tal' value='". htmlspecialchars($_SESSION["logradouro"]) ."' required>";
                            } 
                        ?>
                        <div class="col-12 col-md-8 text-danger"><?php echo $msg[6];?></div> 
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="numero" class="form-label">Número</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='numero' name='numero' value='". htmlspecialchars($_SESSION["numero"]) ."' required>";
                            } 
                        ?> 
                        <div class="col-12 col-md-4 text-danger "><?php echo $msg[7];?></div>
                    </div>

                    <div class="col-12">
                        <label for="complementos" class="form-label">Complementos (Opcional)</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='complementos' name='complementos' placeholder='Escritório 3B' value='". htmlspecialchars($_SESSION["complementos"]) ."' required>";
                            } 
                        ?> 
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='bairro' name='bairro' placeholder='Sé' value='". htmlspecialchars($_SESSION["bairro"]) ."' required>";
                            } 
                        ?> 
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[8];?></div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<input type='text' class='form-control' id='cidade' name='cidade' placeholder='São Paulo' value='". htmlspecialchars($_SESSION["cidade"]) ."' required>";
                            } 
                        ?>
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[9];?></div> 
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select" required>
                        <?php
                            if(isset($_SESSION["id"])) {
                                echo "<option value=''>". htmlspecialchars($_SESSION["estado"]) ."</option";
                            } 
                        ?> 
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP </option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
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
                        <div class="col-12 col-md-4 text-danger"><?php echo $msg[10];?></div>
                    </div>
                    <div class="col-12 col-md-4 d-grid gap-2 col-6 mx-auto mt-4 pt-2">
                        <button type="submit" class="btn btn-salvar btn-lg rounded-pill text-white">
                            Alterar informações
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>