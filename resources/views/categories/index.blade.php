@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    <form action="{{route('categories.search')}}" method="post">
        @csrf
        <input type="text" name="value">
        <select name="type" id="type" class="form-select me-2" style="width: auto;">
            <option value="genre">Genêro</option>
        </select>
        <button type="submit">Pesquisar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Genêro</th>
                <th>Descrição</th>
                <th>Popularidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $category)
                <tr>
                    <td>{{ $category->genre }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->popularity }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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