@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($bomboniere) ? 'Editar Bomboniere' : 'Criar Nova Bomboniere' }}</h1>
    <form action="{{ isset($bomboniere) ? route('bombonieres.update',$bomboniere->id): route('bombonieres.store') }}" method="POST">
        @csrf
        @if (isset($bomboniere))
            @method("PUT")
        @endif
        <h4>Doce:</h4>
        <input type="text" name="candy" required id="candy" value="{{old('candy',$bomboniere->candy ?? '')}}">
        <h4>Bebida:</h4>
        <input type="text" name="drink" required id="drink" value="{{old('drink',$bomboniere->drink ?? '')}}">
        <h4>Salgado:</h4>
        <input type="text" name="salty" required id="salty" value="{{old('salty',$bomboniere->salty ?? '')}}">
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection
