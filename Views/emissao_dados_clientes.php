<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emissão de Documentos do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #89B9E4;
            font-family: 'Noto Sans TC', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        h1,
        h2 {
            color: #00293C;
        }

        h2 {
            color: #555;
            font-weight: 400;
        }

        .form-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
            max-width: 800px;
            width: 100%;
        }

        .form-control-custom {
            border-radius: 15px;
            border: 1px solid #ccc;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            border-color: #004F73;
            box-shadow: 0 0 0 0.2rem rgba(0, 79, 115, 0.25);
        }

        .btn-custom {
            background-color: #0C3252;
            color: white;
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 30px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #8bd1f1;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">Emitir documento do cliente</h1>
        <h2 class="fs-5">Preencha os dados abaixo para gerar automaticamente sua Nota Fiscal em PDF</h2>
    </div>
    <div class="form-card">
        <h3 class="text-center text-primary fw-bold mb-4">DADOS DO CLIENTE</h3>
        <form class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control form-control-custom" placeholder="Nome do cliente">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-custom" placeholder="CPF/CNPJ">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-custom" placeholder="Chassi">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-custom" placeholder="Ano">
            </div>
            <div class="col-12">
                <input type="text" class="form-control form-control-custom" placeholder="Logradouro">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" placeholder="Número">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" placeholder="Complementos">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control form-control-custom" placeholder="Bairro">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-custom" placeholder="Cidade">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control form-control-custom" placeholder="Estado">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control form-control-custom" placeholder="CEP">
            </div>
            <div class="col-12">
                <input type="date" class="form-control form-control-custom">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-custom w-100 py-3 mt-3">
                    FINALIZAR
                </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>