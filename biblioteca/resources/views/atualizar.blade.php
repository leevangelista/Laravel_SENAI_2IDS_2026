<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro</title>
</head>
<body>
    <h1>Atualizar Livro</h1>

    <br>
    <a href="{{route('livro.listar')}}">Livro Listar</a>
    <br>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('livro.update', $livro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome', $livro->nome) }}"
        >
        <br><br>
        <label for="autor">Auto: </label>
        <input type="text" name="autor" id="autor" placeholder="autor..."
            required value="{{ old('autor', $livro->autor)}}"
        >
        <br><br>
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" placeholder="descricao..."
            required value="{{ old('descricao', $livro->descricao)}}"
        >

        <br><br>
        <label for="num_pagina">Numero da página: </label>
        <input type="number" name="num_pagina" id="num_pagina" placeholder="Numero da página..."
            value="{{ old('num_pagina', $livro->num_pagina)}}"
        >

        <br><br>
        <label for="data_publicacao">Data: </label>
        <input type="date" name="data_publicacao" id="data_publicacao" placeholder="Numero da página..."
            value="{{ old('data_publicacao', $livro->data_publicacao)}}"
        >

        <br><br>
        <label for="editora_id">Editora: </label>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}"
                    {{ $livro->editora_id == $editora->id ? 'selected' : '' }}>
                    {{ $editora->nome }}
                </option>
            @endforeach
        </select>

        <br><br>
        <label for="custo">Custo: </label>
        <input type="number" name="custo" id="custo" placeholder="custo..."
            value="{{ old('custo', $livro->detalhe->custo)}}"
        >

        <br><br>
        <label for="preco_venda">Preço: </label>
        <input type="number" name="preco_venda" id="preco_venda" placeholder="preco_venda..."
            value="{{ old('preco_venda', $livro->detalhe->preco_venda)}}"
        >

        <br><br>
        <label for="imposto">Imposto: </label>
        <input type="number" name="imposto" id="imposto" placeholder="imposto..."
            value="{{ old('imposto', $livro->detalhe->imposto)}}"
        >

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>