@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Filmes -{{$category->genre}}</h1>

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Novo Filme</a>

    <form action="{{route('movies.search')}}" method="post">
        @csrf
        <input type="text" name="value">
        <select name="type" id="type" class="form-select me-2" style="width: auto;">
            <option value="title">Title</option>
        </select>
        <button type="submit">Pesquisar</button>

    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ano</th>
                <th>Nota (Tomatoes)</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->tomatoes }}%</td>
                <td><img src="{{ asset('storage/' . $movie->image) }}"alt="Capa do Filme" class="img-thumbnail" width="150"></img></td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
