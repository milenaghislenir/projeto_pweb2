@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($category) ? 'Editar Categoria' : 'Criar Nova Categoria' }}</h1>
    <form action="{{ isset($category) ? route('categories.update',$category->id): route('categories.store') }}" method="POST">
        @csrf
        @if (isset($category))
            @method("PUT")
        @endif
        <h4>Genêro:</h4>
        <input type="text" name="genre" required id="genre" value="{{old('genre',$category->genre ?? '')}}">
        <h4>Descrição:</h4>
        <input type="text" name="description" required id="description" value="{{old('description',$category->description ?? '')}}">
        <h4>Popularidade(%):</h4>
        <input type="number" name="popularity" required id="popularity" value="{{old('popularity',$category->popularity ?? '')}}">
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection
