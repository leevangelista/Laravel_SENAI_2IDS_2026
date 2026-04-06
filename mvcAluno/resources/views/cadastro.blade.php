<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Alunos</title>
</head>
<body>
    <h1>Cadastro Alunos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('aluno.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email')}}"
        >

        <br><br>
        <label for="turma_id">ID DA TURMA: </label>
        {{-- <input type="number" name="turma_id" id="turma_id" placeholder="ID TURMA..."
            value="{{ old('turma_id')}}"
        > --}}
        <select name="turma_id" id="turma_id">
            @foreach ($turmas as $turma)
                <option value="{{$turma->id}}">{{$turma->serie}}</option>
            @endforeach
        </select>

        {{-- <select name="turma_id" id="turma_id">
            <option value="1">1EM</option>
            <option value="2">3EM</option>
            <option value="3">2EM</option>
            <option value="4">9EF</option>
        </select> --}}

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>