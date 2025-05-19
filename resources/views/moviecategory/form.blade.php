@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($movie) ? 'Editar Filme' : 'Criar Novo Filme' }}</h1>
    <form action="{{ isset($movie) ? route('movies.update',$movie->id): route('movies.store') }}" method="POST" enctype="multipart/form-data">
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
        <input type="hidden" name="category_id" value="{{ old('category_id', $movie->category_id ?? '') }}">
        <h4>Avaliação Rotten Tomatoes (%):</h4>
        <input type="number" name="tomatoes" required id="tomatoes" value="{{old('tomatoes',$movie->tomatoes ?? '')}}">
        <label for="image" class="form-label">Capa do Filme:</label>
            <input type="file" id="image" name="image" class="form-control">
            @if (isset($movie) && $movie->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $movie->image) }}" alt="Capa do Filme" class="img-thumbnail" width="150">
                </div>
            @endif


        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection
