@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Funcionários</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Novo Funcionário</a>

    <form action="{{route('employees.search')}}" method="post">
        @csrf
        <input type="text" name="value">
        <select name="type" id="type" class="form-select me-2" style="width: auto;">
            <option value="name">Nome</option>
        </select>
        <button type="submit">Pesquisar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Posição</th>
                <th>Salário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
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