<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card-aluno {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        width: 250px;
        box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        background-color: #fff;
    }

    .card-aluno h3 {
        margin: 0 0 10px 0;
    }

    .card-aluno p {
        margin: 5px 0;
    }

    .acoes {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
    }
</style>
</head>
<body>
    <h1>Relatório de Alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>ID TURMA</th>
                <th>SERIE</th>
                <th>NUM SALA</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->turma?->id}}</td>
                    <td>{{ $aluno->turma?->serie}}</td>
                    <td>{{ $aluno->turma?->numSala}}</td>
                    <td>
                        <a href="{{route('aluno.atualizar', $aluno->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('aluno.deletar', $aluno->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Aluno encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="container-cards">
        @forelse($alunos as $aluno)
            <div class="card-aluno">
                <h3>{{ $aluno->nome }}</h3>

                <p><strong>ID:</strong> {{ $aluno->id }}</p>
                <p><strong>Email:</strong> {{ $aluno->email }}</p>
                <p><strong>Turma ID:</strong> {{ $aluno->turma?->id }}</p>
                <p><strong>Série:</strong> {{ $aluno->turma?->serie }}</p>
                <p><strong>Sala:</strong> {{ $aluno->turma?->numSala }}</p>

                <div class="acoes">
                    <a href="{{ route('aluno.atualizar', $aluno->id) }}">Editar</a>

                    <form action="{{ route('aluno.deletar', $aluno->id) }}" method="POST"
                        onsubmit="return confirm('Deseja realmente excluir');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Nenhum aluno encontrado</p>
        @endforelse
        <div class="card-aluno">
            <h3>Nome do Aluno</h3>

            <p><strong>ID:</strong> 300</p>
            <p><strong>Email:</strong> email@exemplo.com</p>
            <p><strong>Turma ID:</strong> 20</p>
            <p><strong>Série:</strong> 1EF</p>
            <p><strong>Sala:</strong> 200</p>
        </div>
    </div>

</body>
</html>