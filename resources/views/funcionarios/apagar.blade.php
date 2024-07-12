@extends('base')

@section('titulo', 'Apagar | Funcionários em uma empresa')

@section ('conteudo')

<p>Tem certeza que quer apagar?</p>

<p><em><b>ID:</b> {{ $funcionario['id'] }} - <b>Nome:</b> {{ $funcionario['nome'] }}</em></p>

<form method="post" action="{{ route('funcionarios/apagar', $funcionario['id']) }}">
    @method('delete')
    @csrf
    <input type="submit" value="Pode apagar sem medo" style="background-color: red; color: white;">
</form>

<a href="{{ route('funcionarios') }}">Cancelar</a>

@endsection