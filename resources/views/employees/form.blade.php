@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($employee) ? 'Editar Funcionário' : 'Criar Novo Funcionário' }}</h1>
    <form action="{{ isset($employee) ? route('employees.update',$employee->id): route('employees.store') }}" method="POST">
        @csrf
        @if (isset($employee))
            @method("PUT")
        @endif
        <h4>Nome completo:</h4>
        <input type="text" name="name" required id="name" value="{{old('name',$employee->name ?? '')}}">
        <h4>Idade:</h4>
        <input type="number" name="age" required id="age" value="{{old('age',$employee->age ?? '')}}">
        <h4>Posição:</h4>
        <input type="text" name="position" required id="position" value="{{old('position',$employee->position ?? '')}}">
        <h4>Salário:</h4>
        <input type="number" name="salary" required id="salary" value="{{old('salary',$employee->salary ?? '')}}">
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection