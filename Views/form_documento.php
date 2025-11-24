<?php
// Se o formulário foi enviado para gerar PDF, processa antes de emitir qualquer HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gerar_pdf'])) {
    require_once __DIR__ . '/../config/Database.php';
    // carregar autoload do composer para mPDF
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        // erro: autoload ausente
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Autoload do Composer não encontrado. Rode: composer install';
        exit;
    }
    require_once $autoload;

    $pdo = Database::connect();

    // IDs recebidos via POST (o formulário deve enviar todos os campos)
    $id_emb = $_POST['id_embarcacao'] ?? null;
    $id_est = $_POST['id_estaleiro'] ?? null;
    $id_cli = $_POST['id_cliente'] ?? null;

    // função auxiliar para buscar uma linha no banco (caso falte algum dado no POST)
    $fetchOne = function($table, $idField, $id) use ($pdo) {
        if (!$id) return [];
        $sql = "SELECT * FROM {$table} WHERE {$idField} = :id LIMIT 1";
        try {
            $st = $pdo->prepare($sql);
            $st->execute([':id' => $id]);
            return $st->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            return [];
        }
    };

    // busca no banco apenas quando necessário (o objetivo é usar os dados vindos via POST)
    $emb = $fetchOne('embarcacoes', 'id_embarcacao', $id_emb);
    if (empty($emb)) $emb = $fetchOne('embarcacoes', 'id', $id_emb);
    $est = $fetchOne('estaleiros', 'id_estaleiro', $id_est);
    $cli = $fetchOne('clientes', 'id_cliente', $id_cli);

    // função que prioriza valor enviado via POST; se não existir, usa valor do DB; caso contrário, string padrão
    $get = function($postKey, $dbRow, $dbKey, $placeholder = 'Não informado') {
        // prioriza valor enviado via POST; se não existir, usa valor do DB; caso contrário, placeholder
        if (isset($_POST[$postKey]) && $_POST[$postKey] !== '') return htmlspecialchars($_POST[$postKey]);
        if (!empty($dbRow[$dbKey])) return htmlspecialchars($dbRow[$dbKey]);
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

    // gerar PDF
    try {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $filename = 'termo_' . ($id_emb ?? time()) . '.pdf';
        $mpdf->Output($filename, 'D');
    } catch (\Exception $e) {
        header('Content-Type: text/plain; charset=utf-8');
        echo "Erro ao gerar PDF: " . $e->getMessage();
    }
    exit;
}

// incluir a navbar apenas quando não estivermos gerando o PDF (incluir antes do HTML)
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
</head>

<body>
    <div class="container min-vh-100">
        <div class="card card-form mt-5 mb-5">
            <div class="card-header cor-texto rounded-top-4">
                <h3 class="mb-0 text-center"><i class="bi bi-gear-fill me-2"></i>Documento</h3>
            </div>
            <div class="card-body p-4 p-md-5">                
                <form action="#" method="POST" class="row g-4">
                    <?php
                        // garantir que os IDs e todos os campos importantes venham via POST
                        if (!empty($retornoEmb[0]->id_embarcacao) || !empty($retornoEmb[0]->id)) {
                            $embId = $retornoEmb[0]->id_embarcacao ?? $retornoEmb[0]->id;
                            echo "<input type='hidden' name='id_embarcacao' value='".htmlspecialchars($embId)."'>";
                        }
                        if (!empty($retornoEst[0]->id_estaleiro) || !empty($retornoEst[0]->id)) {
                            $estId = $retornoEst[0]->id_estaleiro ?? $retornoEst[0]->id;
                            echo "<input type='hidden' name='id_estaleiro' value='".htmlspecialchars($estId)."'>";
                        }
                        if (!empty($retornoCli[0]->id_cliente) || !empty($retornoCli[0]->id)) {
                            $cliId = $retornoCli[0]->id_cliente ?? $retornoCli[0]->id;
                            echo "<input type='hidden' name='id_cliente' value='".htmlspecialchars($cliId)."'>";
                        }

                        // gerar hidden inputs com nomes corretos para que todas as informações sejam enviadas via POST
                        // estes campos também podem ser convertidos em inputs visíveis se quiser editar antes de gerar
                        echo "<input type='hidden' name='empresa' value='".htmlspecialchars($retornoEst[0]->nome_empresa ?? '')."'>";
                        echo "<input type='hidden' name='cnpj' value='".htmlspecialchars($retornoEst[0]->cnpj ?? '')."'>";
                        echo "<input type='hidden' name='emb_nome' value='".htmlspecialchars($retornoEmb[0]->nome ?? '')."'>";
                        echo "<input type='hidden' name='comp_total' value='".htmlspecialchars($retornoEmb[0]->comprimento_total ?? '')."'>";
                        echo "<input type='hidden' name='boca_mold' value='".htmlspecialchars($retornoEmb[0]->boca_moldada ?? '')."'>";
                        echo "<input type='hidden' name='pontal_mold' value='".htmlspecialchars($retornoEmb[0]->pontal_moldado ?? '')."'>";
                        echo "<input type='hidden' name='calado_max' value='".htmlspecialchars($retornoEmb[0]->calado_maximo ?? '')."'>";
                        echo "<input type='hidden' name='calado_leve' value='".htmlspecialchars($retornoEmb[0]->calado_leve ?? '')."'>";
                        echo "<input type='hidden' name='arqueacao_bruta' value='".htmlspecialchars($retornoEmb[0]->arqueacao_bruta ?? '')."'>";
                        echo "<input type='hidden' name='arqueacao_liquida' value='".htmlspecialchars($retornoEmb[0]->arqueacao_liquida ?? '')."'>";
                        echo "<input type='hidden' name='tpb' value='".htmlspecialchars($retornoEmb[0]->tpb ?? '')."'>";
                        echo "<input type='hidden' name='contorno' value='".htmlspecialchars($retornoEmb[0]->contorno ?? '')."'>";
                        echo "<input type='hidden' name='lastro' value='".htmlspecialchars($retornoEmb[0]->lastro ?? '')."'>";
                        echo "<input type='hidden' name='area_naval' value='".htmlspecialchars($retornoEmb[0]->area_navegacao_tipo_servico ?? '')."'>";
                        echo "<input type='hidden' name='tipo_emb' value='".htmlspecialchars($retornoEmb[0]->tipo_embarcacao ?? '')."'>";
                        echo "<input type='hidden' name='material_casco' value='".htmlspecialchars($retornoEmb[0]->material_casco ?? '')."'>";
                        echo "<input type='hidden' name='mot_max' value='".htmlspecialchars($retornoEmb[0]->motorizacao_max ?? '')."'>";
                        echo "<input type='hidden' name='mot_min' value='".htmlspecialchars($retornoEmb[0]->motorizacao_min ?? '')."'>";
                        echo "<input type='hidden' name='ano_construcao_emb' value='".htmlspecialchars($retornoCli[0]->ano_construcao_emb ?? '')."'>";
                        echo "<input type='hidden' name='chassi_emb' value='".htmlspecialchars($retornoCli[0]->chassi_emb ?? '')."'>";
                        echo "<input type='hidden' name='num_inscricao' value='".htmlspecialchars($retornoEmb[0]->num_inscricao ?? '')."'>";
                        echo "<input type='hidden' name='armador_nome' value='".htmlspecialchars($retornoCli[0]->nome ?? '')."'>";
                        echo "<input type='hidden' name='armador_cpf' value='".htmlspecialchars($retornoCli[0]->cpf_cnpj ?? '')."'>";
                        echo "<input type='hidden' name='logradouro' value='".htmlspecialchars($retornoCli[0]->logradouro ?? '')."'>";
                        echo "<input type='hidden' name='numero' value='".htmlspecialchars($retornoCli[0]->numero ?? '')."'>";
                        echo "<input type='hidden' name='complementos' value='".htmlspecialchars($retornoCli[0]->complementos ?? '')."'>";
                        echo "<input type='hidden' name='bairro' value='".htmlspecialchars($retornoCli[0]->bairro ?? '')."'>";
                        echo "<input type='hidden' name='cidade' value='".htmlspecialchars($retornoCli[0]->cidade ?? '')."'>";
                        echo "<input type='hidden' name='estado' value='".htmlspecialchars($retornoCli[0]->estado ?? '')."'>";
                        echo "<input type='hidden' name='cep' value='".htmlspecialchars($retornoCli[0]->cep ?? '')."'>";
                        echo "<input type='hidden' name='num_tripulantes' value='".htmlspecialchars($retornoEmb[0]->num_tripulantes ?? '')."'>";
                        echo "<input type='hidden' name='num_passageiros' value='".htmlspecialchars($retornoEmb[0]->num_passageiros ?? '')."'>";
                    ?>
                    <p class="text-center"><strong>TERMOS DE RESPONSABILIDADE DE CONSTRUÇÃO</strong></p>
                    <?php
                        echo "<p>Certifico, para comprovação perante a <strong>Capitania dos Portos</strong>, que a embarcação modelo " . $retornoEmb[0]->nome . ", foi construída por <strong>" . $retornoEst[0]->nome_empresa . ", CNPJ ". $retornoEst[0]->cnpj . "</strong>com as seguintes características:</p>";
                    ?>

                    <div class="col-12">
                        <?php
                            echo "<p>a) Comprimento Total <strong>". $retornoEmb[0]->comprimento_total ." m</strong></p>";                            
                            echo "<input type='hidden' id='comp_total' name='comp_total' value='". $retornoEmb[0]->comprimento_total ."'>";
                        ?>                         
                    </div>


                    <div class="col-12 ">
                        <?php  
                            echo "<p>b) Boca Moldada <strong>". $retornoEmb[0]->boca_moldada ." m</strong></p>";                          
                            echo "<input type='hidden' class='form-control' id='boca_mold' name='boca_mold' value='". $retornoEmb[0]->boca_moldada ."'>";
                        ?>
                    </div>
                    
                    <div class="col-12 ">
                        <?php
                            echo "<p>c) Pontal Moldado <strong>". $retornoEmb[0]->pontal_moldado ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='pontal_mold' name='pontal_mold' value='". $retornoEmb[0]->pontal_moldado ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>d) Calado Máximo <strong>". $retornoEmb[0]->calado_maximo ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->calado_maximo ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>e) Calado Leve <strong>". $retornoEmb[0]->calado_leve ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->calado_leve ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>f) Arqueação Bruta <strong>". $retornoEmb[0]->arqueacao_bruta ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->arqueacao_bruta ."'>";
                        ?> 
                    </div>

                    <div class="col-12 col-md-4">
                        <?php
                            echo "<p>g) Arqueação Liquida <strong>". $retornoEmb[0]->arqueacao_liquida ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->arqueacao_liquida ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>h) TPB <strong>". $retornoEmb[0]->tpb ." ton</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->tpb ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>i) Contorno <strong>". $retornoEmb[0]->contorno ." m</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->contorno ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>j) Lastro <strong>". $retornoEmb[0]->lastro ." ton</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->lastro ."'>";
                        ?> 
                    </div>
                    <div class="col-12">
                        <?php
                            echo "<p>k) Área de Navegação/Tipo de Serviço <strong>". $retornoEmb[0]->area_navegacao_tipo_servico .".</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->area_navegacao_tipo_servico ."'>";
                        ?> 
                    </div>
                    <div class="col-12">
                        <?php
                            echo "<p>l) Tipo de Embarcação <strong>". $retornoEmb[0]->tipo_embarcacao ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->tipo_embarcacao ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>m) Material do Casco <strong>". $retornoEmb[0]->material_casco ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->material_casco ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>n) Motorização Máxima <strong>". $retornoEmb[0]->motorizacao_max ." HP</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->motorizacao_max ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>o) Motorização Minima <strong>". $retornoEmb[0]->motorizacao_min ." HP</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->motorizacao_min ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>p) Ano de Construção <strong>". $retornoCli[0]->ano_construcao_emb ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->ano_construcao_emb ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>q) N do Casco/Chassi <strong>". $retornoCli[0]->chassi_emb ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->chassi_emb ."'>";
                        ?> 
                    </div>
                    <div class="col-12 ">
                        <?php
                            echo "<p>r) N de Inscrição<strong>". $retornoEmb[0]->num_inscricao ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoEmb[0]->num_inscricao ."'>";
                        ?> 
                    </div>

                    <div class="col-12">
                        <?php
                            echo "<p>s) Armador <strong>". $retornoCli[0]->nome ." / ". $retornoCli[0]->cpf_cnpj . "</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->nome ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cpf_cnpj ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>t) Endereço <strong>". $retornoCli[0]->logradouro .", ". $retornoCli[0]->numero . " ". $retornoCli[0]->complementos ." - ". $retornoCli[0]->bairro ." - ". $retornoCli[0]->cidade . "/". $retornoCli[0]->estado ." - CEP". $retornoCli[0]->cep ."</strong></p>";   
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->logradouro ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->numero ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->complementos ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->bairro ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cidade ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->estado ."'>";
                            echo "<input type='hidden' class='form-control' id='calado_max' name='calado_max' value='". $retornoCli[0]->cep ."'>";
                        ?> 
                    </div>

                    <div class="col-12 ">
                        <?php
                            echo "<p>Atende as prescrições aplicáveis constantes na norma NORMAM-211/DPC e apresenta condições de segurança, estabilidade e estruturais satisfatórias, para operar com a seguinte capacidade de pessoas:</p><br>";  
                            echo "<p>Tipulantes: <strong>". $retornoEmb[0]->num_tripulantes ."</strong></p><br>";   
                            echo "<p>Passageiros: <strong>". $retornoEmb[0]->num_passageiros ."</strong></p><br>";   
                            echo "<p>Certifico, ainda, que a embarcação foi constrída em conformidade com as normas e regulamentos nacionais em vigor.</p><br>";   
                            echo "<p>Declaro outrossim que qualquer modificação de lastreamento, trancagem, arranjo geral ou alteração de qualquer monta, bem como incidentes ou sinistros, invalidam a presente declaração.</p><br>";   
                            echo "<p>". $retornoEst[0]->cidade . "/". $retornoEst[0]->estado .", " . date('d/m/y') ."</p>";   
                          
                        ?> 
                    </div>

                    <div class="col-12  mx-auto mt-4 pt-2">
                        <a href="index.php?controle=clienteController&metodo=update&id=<?php echo $retornoCli[0]->id_cliente; ?>">
                            <button type="button" class="btn btn-salvar btn-md rounded-pill text-white">
                                Alterar informações
                            </button>
                        </a>
                        <button type="submit" name="gerar_pdf" value="1" class="btn btn-del btn-md rounded-pill text-white">
                            Gerar Documento PDF
                        </button>
                    </div>
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