<?php
    use Mpdf\Mpdf;
    require_once __DIR__ ."/../Models/Documento.class.php";
    require_once __DIR__ ."/../Models/Cliente.class.php";
    require_once __DIR__ ."/../Models/ClienteDAO.class.php";
    require_once __DIR__ ."/../Models/Estaleiro.class.php";
    require_once __DIR__ ."/../Models/EstaleiroDAO.class.php";
    require_once __DIR__ ."/../Models/Embarcacao.class.php";
    require_once __DIR__ ."/../Models/EmbarcacaoDAO.class.php";
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../Models/DocumentoDAO.class.php';
    require_once __DIR__ . '/../Models/PdfDocumento.class.php';
    require_once __DIR__ . '/../Models/PdfDocumentoDAO.class.php';
    class documentoController {
        
        public function select() {
            // Pegando os dados do documento
            $id_cliente = (int)$_GET["id"];
            $documento = new Documento(cliente_id:$id_cliente);
            $docDAO = new DocumentoDAO();
            $retornoDoc = $docDAO->select($documento);
            // Pegando os dados do cliente
            $cliente = new Cliente(id_cliente:$id_cliente);
            $clienteDAO = new ClienteDAO();
            $retornoCli = $clienteDAO->getById($cliente);
            // Pegando os dados da embarcação
            $emb = new Embarcacao(id_embarcacao:$retornoDoc[0]->embarcacao_id);
            $embDAO = new EmbarcacaoDAO();
            $retornoEmb = $embDAO->getById($emb);
            // Pegando os dados do estaleiro
            $est = new Estaleiro(id_estaleiro:$retornoEmb[0]->estaleiro_id);
            $estDAO = new EstaleiroDAO();
            $retornoEst = $estDAO->getById($est);
            require_once "Views/form_documento.php";
        }

        public function selectPdf() {
             // Pegando os dados do estaleiro
            $id_estaleiro = (int)$_GET["id"];
            $documentosDoEstaleiro = [];
            $pdfsDoEstaleiro = [];

            // Pegando os dados da embarcação
            $emb = new Embarcacao(estaleiro_id:$id_estaleiro);
            $embDAO = new EmbarcacaoDAO();
            $retornoEmb = $embDAO->select($emb);
            // var_dump($retornoEmb);
            foreach($retornoEmb as $emb) {
                $documento = new Documento(embarcacao_id:$emb->id_embarcacao);
                $docDAO = new DocumentoDAO();
                $retornoDoc = $docDAO->selectEmb($documento);
                if (!empty($retornoDoc)) {            
                    $documentosDoEstaleiro = array_merge($documentosDoEstaleiro, $retornoDoc);
                }               
            }
            // var_dump($documentosDoEstaleiro);
            $pdfDAO = new PdfDocumentoDAO();
            foreach ($documentosDoEstaleiro as $documentoObj) {
                $id_documento = $documentoObj->id_documento;
                // Cria um objeto PdfDocumento usando o ID do Documento
                $pdf = new PdfDocumento(documento_id:$id_documento);              
                // Busca os PDFs relacionados a este Documento
                $retornoPdfUnico = $pdfDAO->select($pdf); 
           
                if (!empty($retornoPdfUnico)) {
                    // Acumula os objetos PdfDocumento no array principal
                    $pdfsDoEstaleiro = array_merge($pdfsDoEstaleiro, $retornoPdfUnico);
 
                }
            }
            $retornoPdfs = $pdfsDoEstaleiro; 
            require_once "Views/docs_adm.php";
        }
        public function selectPdfAss() {
             // Pegando os dados do estaleiro
            if(!isset($_SESSION)) session_start();
            $id_estaleiro = $_SESSION["id_estaleiro"];
            $documentosDoEstaleiro = [];
            $pdfsDoEstaleiro = [];

            // Pegando os dados da embarcação
            $emb = new Embarcacao(estaleiro_id:$id_estaleiro);
            $embDAO = new EmbarcacaoDAO();
            $retornoEmb = $embDAO->select($emb);
            // var_dump($retornoEmb);
            foreach($retornoEmb as $emb) {
                $documento = new Documento(embarcacao_id:$emb->id_embarcacao);
                $docDAO = new DocumentoDAO();
                $retornoDoc = $docDAO->selectEmb($documento);
                if (!empty($retornoDoc)) {            
                    $documentosDoEstaleiro = array_merge($documentosDoEstaleiro, $retornoDoc);
                }               
            }
            // var_dump($documentosDoEstaleiro);
            $pdfDAO = new PdfDocumentoDAO();
            foreach ($documentosDoEstaleiro as $documentoObj) {
                $id_documento = $documentoObj->id_documento;
                // Cria um objeto PdfDocumento usando o ID do Documento
                $pdf = new PdfDocumento(documento_id:$id_documento);              
                // Busca os PDFs relacionados a este Documento
                $retornoPdfUnico = $pdfDAO->selectAss($pdf); 
           
                if (!empty($retornoPdfUnico)) {
                    // Acumula os objetos PdfDocumento no array principal
                    $pdfsDoEstaleiro = array_merge($pdfsDoEstaleiro, $retornoPdfUnico);
 
                }
            }
            $retornoPdfs = $pdfsDoEstaleiro; 
            require_once "Views/docs_est.php";
        }

        public function downloadPdfByBlob() {
            // 1. Pega o ID do PDF enviado pelo link (URL)
            $id_pdf = (int)$_GET['id'];           
            $pdfDAO = new PdfDocumentoDAO();           
            // 2. Busca o objeto (stdClass) completo, incluindo a coluna BLOB
            $pdfObj = $pdfDAO->getById(new PdfDocumento(id_pdf_documentos: $id_pdf));          
            // 3. Validação e obtenção do BLOB
            // Assumindo que a coluna BLOB no banco se chama 'pdf'
            if (empty($pdfObj) || empty($pdfObj[0]->pdf)) {
                http_response_code(404);
                die("PDF não encontrado ou conteúdo vazio.");
            }
            
            // Obtém a string binária BLOB. Se você usou FETCH_OBJ, o nome da coluna é a propriedade.
            $pdf_conteudo_blob = $pdfObj[0]->pdf;
            
            // Define um nome de arquivo para o download (melhor prática)
            // Se você tiver o nome do documento, use-o! Exemplo com ID do documento:
            $nome_para_download = 'termo_documento_' . $pdfObj[0]->documento_id . '.pdf'; 
            
            // 4. ENVIANDO OS CABEÇALHOS PARA FORÇAR O DOWNLOAD
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf'); 
            header('Content-Disposition: attachment; filename="' . $nome_para_download . '"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . strlen($pdf_conteudo_blob)); 
            
            // Limpa o buffer de saída (muito importante)
            ob_clean();
            flush();
            
            // 5. ENVIA O CONTEÚDO BINÁRIO
            echo $pdf_conteudo_blob;
            exit;
        }

        public function update() {
            // 1. Verifica se houve submissão POST
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Redireciona ou trata se a requisição não for POST
                return; 
            }
            
            // 2. RECEBE E VALIDA O ID do documento original
            $id_pdf_original = filter_input(INPUT_POST, 'id_pdf_original', FILTER_VALIDATE_INT);
            if (!$id_pdf_original) {
                // Tratar erro: ID do PDF não enviado ou inválido
                return; 
            }

            // 3. MANIPULAÇÃO DO UPLOAD (usando $_FILES)
            $upload_file = $_FILES['pdf_assinado'] ?? null;
            
            if (!$upload_file || $upload_file['error'] !== UPLOAD_ERR_OK) {
                // Tratar erro: Arquivo não enviado ou erro de upload
                return; 
            }
            
            // 4. VALIDAÇÃO BÁSICA DO ARQUIVO
            if ($upload_file['type'] !== 'application/pdf') {
                // Tratar erro: Arquivo não é um PDF
                return; 
            }
            
            // 5. OBTENÇÃO DO CONTEÚDO BINÁRIO (BLOB)
            // O conteúdo do arquivo deve ser lido
            $novo_pdf_blob = file_get_contents($upload_file['tmp_name']);
            
            // 6. PREPARAÇÃO DO OBJETO E CHAMADA DO DAO
            
            $pdfDAO = new PdfDocumentoDAO();
            
            // Cria o objeto PDF com os dados para atualização:
            $pdfAtualizar = new PdfDocumento();
            $pdfAtualizar->setIdPdfDocumentos($id_pdf_original); // Seta o ID para a cláusula WHERE
            $pdfAtualizar->setPdf($novo_pdf_blob);               // Seta o novo conteúdo BLOB
            $pdfAtualizar->setAssinado(1);                       // Seta o status de assinado
            
            // 7. CHAMA O MÉTODO DE ATUALIZAÇÃO NO BANCO
            $retornoDAO = $pdfDAO->update($pdfAtualizar);
            header("location:index.php?controle=inicioController&metodo=inicioAdm");

        }

        public function gerarPDF() {            
            // Se o formulário foi enviado para gerar PDF, processa antes de emitir qualquer HTML
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gerar_pdf'])) {
                // IDs recebidos via POST (o formulário deve enviar todos os campos)
                $id_emb = $_POST['id_embarcacao'] ?? null;
                $id_doc = $_POST['id_documento'] ?? null;
                $id_est = $_POST['id_estaleiro'] ?? null;
                $id_cli = $_POST['id_cliente'] ?? null;
                $cliDAO = new ClienteDAO();
                $estDAO = new EstaleiroDAO();
                $embDAO = new EmbarcacaoDAO();
                $cli = $cliDAO->getById(new Cliente(id_cliente: $id_cli));
                $est = $estDAO->getById(new Estaleiro(id_estaleiro: $id_est));
                $emb = $embDAO->getById(new Embarcacao(id_embarcacao: $id_emb));

                // função que prioriza valor enviado via POST; se não existir, usa valor do DB; caso contrário, string padrão
                $get = function($postKey, $dbObject, $dbKey, $placeholder = 'Não informado') {
                    // prioriza valor enviado via POST; se não existir, usa valor do DB; caso contrário, placeholder
                    if (isset($_POST[$postKey]) && $_POST[$postKey] !== '') return htmlspecialchars($_POST[$postKey]);
                    if (is_object($dbObject) && isset($dbObject->$dbKey) && $dbObject->$dbKey !== '') return htmlspecialchars($dbObject->$dbKey);
                    return $placeholder;
                };

                // coletar todos os campos utilizados no termo (todos podem vir via POST)
                $data = [];
                $data['empresa'] = $get('empresa', $est, 'nome_empresa');
                $data['cnpj'] = $get('cnpj', $est, 'cnpj');
                $data['emb_nome'] = $get('emb_nome', $emb, 'nome');
                $data['comprimento_total'] = $get('comp_total', $emb, 'comprimento_total');
                $data['boca_moldada'] = $get('boca_mold', $emb, 'boca_moldada');
                $data['pontal_moldado'] = $get('pontal_mold', $emb, 'pontal_moldado');
                $data['calado_maximo'] = $get('calado_max', $emb, 'calado_maximo');
                $data['calado_leve'] = $get('calado_leve', $emb, 'calado_leve');
                $data['arqueacao_bruta'] = $get('arqueacao_bruta', $emb, 'arqueacao_bruta');
                $data['arqueacao_liquida'] = $get('arqueacao_liquida', $emb, 'arqueacao_liquida');
                $data['tpb'] = $get('tpb', $emb, 'tpb');
                $data['contorno'] = $get('contorno', $emb, 'contorno');
                $data['lastro'] = $get('lastro', $emb, 'lastro');
                $data['area_naval'] = $get('area_naval', $emb, 'area_navegacao_tipo_servico');
                $data['tipo_embarcacao'] = $get('tipo_emb', $emb, 'tipo_embarcacao');
                $data['material_casco'] = $get('material_casco', $emb, 'material_casco');
                $data['motorizacao_max'] = $get('mot_max', $emb, 'motorizacao_max');
                $data['motorizacao_min'] = $get('mot_min', $emb, 'motorizacao_min');
                $data['ano_construcao'] = $get('ano_construcao_emb', $cli, 'ano_construcao_emb');
                $data['chassi'] = $get('chassi_emb', $cli, 'chassi_emb');
                $data['num_inscricao'] = $get('num_inscricao', $emb, 'num_inscricao');
                $data['armador_nome'] = $get('armador_nome', $cli, 'nome');
                $data['armador_cpf'] = $get('armador_cpf', $cli, 'cpf_cnpj');
                $data['end_logradouro'] = $get('logradouro', $cli, 'logradouro');
                $data['end_numero'] = $get('numero', $cli, 'numero');
                $data['end_complemento'] = $get('complementos', $cli, 'complementos');
                $data['end_bairro'] = $get('bairro', $cli, 'bairro');
                $data['end_cidade'] = $get('cidade', $cli, 'cidade');
                $data['end_estado'] = $get('estado', $cli, 'estado');
                $data['end_cep'] = $get('cep', $cli, 'cep');
                $data['num_tripulantes'] = $get('num_tripulantes', $emb, 'num_tripulantes');
                $data['num_passageiros'] = $get('num_passageiros', $emb, 'num_passageiros');

                // montar HTML do termo (estilo simples)
                $html = '<h2 style="text-align:center;">TERMO DE RESPONSABILIDADE DE CONSTRUÇÃO</h2>';
                $html .= '<p>Certifico, para comprovação perante a <strong>Capitania dos Portos</strong>, que a embarcação modelo <strong>' . $data['emb_nome'] . '</strong>, foi construída por <strong>' . $data['empresa'] . ', CNPJ ' . $data['cnpj'] . '</strong> com as seguintes características:</p>';
                $html .= '<ul>';
                $html .= '<li>a) Comprimento Total: <strong>' . $data['comprimento_total'] . '</strong></li>';
                $html .= '<li>b) Boca Moldada: <strong>' . $data['boca_moldada'] . '</strong></li>';
                $html .= '<li>c) Pontal Moldado: <strong>' . $data['pontal_moldado'] . '</strong></li>';
                $html .= '<li>d) Calado Máximo: <strong>' . $data['calado_maximo'] . '</strong></li>';
                $html .= '<li>e) Calado Leve: <strong>' . $data['calado_leve'] . '</strong></li>';
                $html .= '<li>f) Arqueação Bruta: <strong>' . $data['arqueacao_bruta'] . '</strong></li>';
                $html .= '<li>g) Arqueação Líquida: <strong>' . $data['arqueacao_liquida'] . '</strong></li>';
                $html .= '<li>h) TPB: <strong>' . $data['tpb'] . '</strong></li>';
                $html .= '<li>i) Contorno: <strong>' . $data['contorno'] . '</strong></li>';
                $html .= '<li>j) Lastro: <strong>' . $data['lastro'] . '</strong></li>';
                $html .= '<li>k) Área de Navegação/Tipo de Serviço: <strong>' . $data['area_naval'] . '</strong></li>';
                $html .= '<li>l) Tipo de Embarcação: <strong>' . $data['tipo_embarcacao'] . '</strong></li>';
                $html .= '<li>m) Material do Casco: <strong>' . $data['material_casco'] . '</strong></li>';
                $html .= '<li>n) Motorização Máxima: <strong>' . $data['motorizacao_max'] . '</strong></li>';
                $html .= '<li>o) Motorização Mínima: <strong>' . $data['motorizacao_min'] . '</strong></li>';
                $html .= '<li>p) Ano de Construção: <strong>' . $data['ano_construcao'] . '</strong></li>';
                $html .= '<li>q) Nº do Casco/Chassi: <strong>' . $data['chassi'] . '</strong></li>';
                $html .= '<li>r) Nº de Inscrição: <strong>' . $data['num_inscricao'] . '</strong></li>';
                $html .= '<li>s) Armador: <strong>' . $data['armador_nome'] . ' / ' . $data['armador_cpf'] . '</strong></li>';
                $html .= '<li>t) Endereço: <strong>' . $data['end_logradouro'] . ', ' . $data['end_numero'] . ' ' . $data['end_complemento'] . ' - ' . $data['end_bairro'] . ' - ' . $data['end_cidade'] . '/' . $data['end_estado'] . ' - CEP ' . $data['end_cep'] . '</strong></li>';
                $html .= '</ul>';
                $html .= '<p>Tripulantes: <strong>' . $data['num_tripulantes'] . '</strong> — Passageiros: <strong>' . $data['num_passageiros'] . '</strong></p>';
                $html .= '<p style="margin-top:40px;">Assinatura: ____________________________</p>';
                $html .= '<p>Tecnólogo Nval Responsável</p>';
                $html .= '<p>Helcio Marcelo De Russi</p>';
                $html .= '<p>CREA: 5060478012</p>';

                // gerar PDF
                try {
                    $mpdf = new \Mpdf\Mpdf();
                    $mpdf->WriteHTML($html);
                    $pdfArquivo =$mpdf->Output('', 'S');
                    $filename = 'termo_' . ($id_doc ?? time()) . '.pdf';
                    $saveDir = __DIR__ . '/../pdfs'; 
                    if (!is_dir($saveDir)) mkdir($saveDir, 0777, true); // Cria o diretório se não existir
                    $savePath = $saveDir . $filename;
                    file_put_contents($savePath, $pdfArquivo);
                    $pdf = new PdfDocumento(0, $id_doc, $pdfArquivo, 0);
                    $pdfDAO = new PdfDocumentoDAO();
                    $retronoPdf = $pdfDAO->insert($pdf);
                } catch (\Exception $e) {
                    header('Content-Type: text/plain; charset=utf-8');
                    echo "Erro ao gerar PDF: " . $e->getMessage();
                }
                if(!isset($_SESSION)) session_start();
                if(isset($_SESSION["id_estaleiro"])) {
                    header("location:index.php?controle=inicioController&metodo=inicioEstaleiro");
                } else {
                    header("location:index.php?controle=inicioController&metodo=inicioAdm");
                }
            }
        }
    }
?>