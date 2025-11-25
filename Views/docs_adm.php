<?php
    if(!isset($_SESSION)) session_start();
    if(isset($_SESSION["id_estaleiro"])) {  
        require_once "navbar_est.php";        
    }         
    if(isset($_SESSION["id_administrador"])) {
        require_once "navbar_adm.php";                
    }    
    
?>
    <style>
        .card-custom:hover {
            transform: scale(1.07);
        }

        .card-custom {
            color: #0C3252;
            box-shadow: 0px 4px 10px #002b4eff;
            transition: all 0.3s ease;
        }

        .cor-texto {
            color: #0C3252;
        }

        .btn-salvar {
            background-color: #0C3252;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-salvar:hover {
            background-color: #004288ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px #004288ff;
        }

        .btn-del {
            background-color: #b92727ff;
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .btn-del:hover {
            background-color: #8d0000ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px #8d0000ff;
        }

    </style>
    <div class="container py-5 text-center cor-texto min-vh-100">
        <h1 class="display-4 fw-bold mb-3">Documentos para Assinar </h1>
        <p class="lead mb-5">Todos os documentos disponiveis para assinar.</p>

        <div class="row justify-content-center g-5 mt-5 ">
            <?php
                foreach($retornoPdfs as $pdfObj) {
                    $id_pdf = $pdfObj->id_pdf_documento;                  
                    $id_documento = $pdfObj->documento_id;                  
                    //  Criando a URL de download, injetando o ID
                    $url_download = "index.php?controle=documentoController&metodo=downloadPdfByBlob&id= " . $id_pdf ."";                   
                    echo '<div class="col-12 col-md-4 >';
                    echo '    <div class="card card-custom h-100">';
                    
                    // --- Seção da "Capa" ---
                    echo '        <div class="card-body p-4 text-center">';
                    echo '            <i class="fas fa-file-pdf fa-5x mb-3" style="color: #b92727ff;"></i>';
                    
                    // Opcional: Mostrar status
                    $status = ($pdfObj->assinado== 1) ? 'Assinado' : 'Pendente ';
                    echo '            <p class="text-muted small">Status: ' . $status . '</p>';
                    
                    echo '        </div>';
                    
                    // --- Seção do Botão de Download ---
                    echo '        <div class="card-footer border-0 d-grid gap-2 p-3">';
                    
                    //  O botão A aponta para a URL criada, garantindo que o ID correto seja enviado.
                    echo '            <a href="' . $url_download . '" class="btn btn-salvar text-white">';
                    echo '                <i class="fas fa-download me-2"></i> Baixar Documento';
                    echo '            </a>';
                    
                    echo '        </div>';
                    echo '    </div>';
                    echo '        <div class="card-footer bg-transparent border-0 p-3">';
                    echo '            <form action="index.php?controle=documentoController&metodo=update" method="post" enctype="multipart/form-data">';
                    echo '                <input type="hidden" name="id_pdf_original" value="' . $id_pdf . '">';
                    echo '                <input type="hidden" name="id_documento" value="' . $id_documento . '">';
                    echo '                <input type="file" name="pdf_assinado" required>'; 
                    echo '                <button type="submit" class="btn btn-salvar text-white mt-2">Enviar Documento Assinado</button>';
                    echo '            </form>';
                    echo '        </div>';
                }               
            ?>
        </div>
    </div>
<!-- Fechamento da tag <main> da navbar. -->
</main>
<?php
    require_once "footer.html";
?>
</body>
</html>