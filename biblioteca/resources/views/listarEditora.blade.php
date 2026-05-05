<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Relatório de Editar</h1>
    <br>
    <a href="{{route('editora.cadastro')}}">Editora Cadastrar</a>
    <br>
    <br>
    <a href="{{route('livro.listar')}}">Listar Editora</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CNPJ</th>
                <th>PAIS</th>
                <th>CIDADE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($editoras as $editora)
                <tr>
                    <td>{{ $editora->id }}</td>
                    <td>{{ $editora->nome }}</td>
                    <td>{{ $editora->cnpj }}</td>
                    <td>{{ $editora->pais }}</td>
                    <td>{{ $editora->cidade }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Aluno encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>