<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('images') }}">Imagens do produto</a>
        </li>
        <li>
            <a href="{{ url('operations') }}">Operações de Estoque</a>
        </li>
        <li>
            <a href="{{ url('transactions') }}">Transações</a>
        </li>
        <li>
            <a href="{{ url('transactionProducts') }}">Transações de Produtos</a>
        </li>
    </ul>
</body>
</html>
