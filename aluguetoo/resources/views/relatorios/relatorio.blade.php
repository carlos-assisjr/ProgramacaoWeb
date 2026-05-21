<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Equipamentos</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 15px;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela th,
        .tabela td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        .tabela th {
            background-color: #f0f0f0;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            text-align: center;
            width: 100%;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="titulo">
        Relatório de Equipamentos
    </div>

    <div class="info">
        Data: {{ date('d/m/Y') }}
    </div>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Loja</th>
                <th>Valor Diária</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->marca }}</td>
                    <td>{{ $item->categoria->nome ?? '-' }}</td>
                    <td>{{ $item->loja->nome ?? '-' }}</td>
                    <td>R$ {{ number_format($item->valor_diaria, 2, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Relatório gerado em {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>