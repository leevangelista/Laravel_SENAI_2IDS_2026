<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="{{route('livro.cadastro')}}">Cadastrar Livro</a>
    <br>

    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar Editora</a>
    <br>

    <br>
    <a href="{{route('editora.listar')}}">Listar Editora</a>
    <br>

    <h1>Relatório de Livros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRICAO</th>
                <th>NUM PAGINA</th>
                <th>DATA</th>
                <th>EDITORA</th>
                <th>CUSTO</th>
                <th>PRECO</th>
                <th>IMPOSTO</th>
                <th>ATUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>{{ $livro->num_pagina }}</td>
                    <td>{{ $livro->data_publicacao }}</td>
                    <td>{{ $livro->editora?->nome}}</td>
                    <td>{{ $livro->detalhe?->custo}}</td>
                    <td>{{ $livro->detalhe?->preco_venda}}</td>
                    <td>{{ $livro->detalhe?->imposto}}</td>
                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
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