@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($movie) ? 'Editar Filme' : 'Criar Novo Filme' }}</h1>
    <form action="{{ isset($movie) ? route('movies.update',$movie->id): route('movies.store') }}" method="POST">
        @csrf
        @if (isset($movie))
            @method("PUT")
        @endif
        <h4>Título:</h4>
        <input type="text" name="title" required id="title" value="{{old('title',$movie->title ?? '')}}">
        <h4>Diretor:</h4>
        <select id="director_id" name="director_id" class="form-control" required>
            <option value="" disabled {{ old('director_id', $movie->director_id ?? '') == '' ? 'selected' : '' }}>Selecione um Diretor</option>
            @foreach($directors as $director)
                <option value="{{ $director->id }}" >
                    {{ $director->name }}
                </option>
            @endforeach
        </select>
        <h4>Ano de lançamento:</h4>
        <input type="text" name="year" required id="year" value="{{old('year',$movie->year ?? '')}}">
        <h4>Categoria:</h4>
        <select id="category_id" name="category_id" class="form-control" required>
            <option value="" disabled {{ old('category_id', $movie->category_id ?? '') == '' ? 'selected' : '' }}>Selecione uma categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" >
                    {{ $category->genre }}
                </option>
            @endforeach
        </select>
        <h4>Avaliação Rotten Tomatoes (%):</h4>
        <input type="number" name="tomatoes" required id="tomatoes" value="{{old('tomatoes',$movie->tomatoes ?? '')}}">
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection