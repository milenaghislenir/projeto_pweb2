@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bombonieres</h1>

    <a href="{{ route('bombonieres.create') }}" class="btn btn-primary mb-3">Nova Bomboniere</a>

    <form action="{{route('bombonieres.search')}}" method="post">
        @csrf
        <input type="text" name="value">
        <select name="type" id="type" class="form-select me-2" style="width: auto;">
            <option value="candy">Doce</option>
        </select>
        <button type="submit">Pesquisar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Doce</th>
                <th>Bebida</th>
                <th>Salgado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $bomboniere)
                <tr>
                    <td>{{ $bomboniere->candy }}</td>
                    <td>{{ $bomboniere->drink }}</td>
                    <td>{{ $bomboniere->salty }}</td>
                    <td>
                        <a href="{{ route('bombonieres.edit', $bomboniere->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('bombonieres.destroy', $bomboniere->id) }}" method="POST" class="d-inline">
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
