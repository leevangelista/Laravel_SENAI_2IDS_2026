<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livros</title>
</head>
<body>
    <h1>Cadastro Livros</h1>

    <br>
    <a href="{{route('livro.listar')}}">Livro listar</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('livro.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor" placeholder="Autor..."
            required value="{{ old('autor')}}"
        >

        <br><br>
        <label for="descricao">Descricao: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descricao..."
            required value="{{ old('autor')}}"
        >

        <br><br>
        <label for="num_pagina">Numero da página: </label>
        <input type="number" name="num_pagina" id="num_pagina" placeholder="Numero da página..."
            value="{{ old('num_pagina')}}"
        >

        <br><br>
        <label for="data_publicacao">Numero da página: </label>
        <input type="date" name="data_publicacao" id="data_publicacao" placeholder="Numero da página..."
            value="{{ old('data_publicacao')}}"
        >

        <br><br>
        <label for="editora_id">Editora: </label>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{$editora->id}}">{{$editora->nome}}</option>
            @endforeach
        </select>

        <br><br>
        <label for="custo">Custo: </label>
        <input type="number" name="custo" id="custo" placeholder="Custo..."
            value="{{ old('custo')}}"
        >

        <br><br>
        <label for="preco_venda">Preço: </label>
        <input type="number" name="preco_venda" id="preco_venda" placeholder="Preço..."
            value="{{ old('preco_venda')}}"
        >

        <br><br>
        <label for="imposto">Imposto: </label>
        <input type="number" name="imposto" id="imposto" placeholder="Imposto..."
            value="{{ old('imposto')}}"
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