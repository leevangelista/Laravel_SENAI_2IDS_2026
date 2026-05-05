<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Editora</title>
</head>
<body>
    <h1>Cadastro Editora</h1>

    <br>
    <a href="{{route('editora.listar')}}">Listar Editora</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('editora.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="cnpj">CNPJ: </label>
        <input type="text" name="cnpj" id="cnpj" placeholder="cnpj..."
            required value="{{ old('cnpj')}}"
        >

        <br><br>
        <label for="pais">Pais: </label>
        <input type="text" name="pais" id="pais" placeholder="pais..."
            required value="{{ old('pais')}}"
        >

        <br><br>
        <label for="cidade">Cidade: </label>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade..."
            value="{{ old('cidade')}}"
        >

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