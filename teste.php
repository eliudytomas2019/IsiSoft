<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .tables {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .table {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #ffffff;
        }
        .payment-info {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Fatura</h1>
        <p>Cliente: DALVA PIRES ARNALDO, COMERCIO E SERVIÇOS LDA</p>
        <p>NIF: 531035886</p>
    </div>
    <div class="buttons">
        <div class="button">Ver Produtos em Promoção</div>
        <div class="button">Importar Futura Orçamento</div>
        <div class="button">Ver Documentos em Espera</div>
    </div>
    <div class="tables">
        <div class="table">
            <!-- Conteúdo da tabela esquerda -->
        </div>
        <div class="table">
            <!-- Conteúdo da tabela direita -->
        </div>
    </div>
    <div class="payment-info">
        <!-- Conteúdo das informações de pagamento -->
    </div>
</div>
</body>
</html>
