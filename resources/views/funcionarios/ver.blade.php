@extends('base')
@section('titulo', 'Perfil do funcionário')
@section ('conteudo')
    <b>Nome: </b>{{ $funcionario->nome }}
    <br>
    <b>Cargo: </b>{{ $funcionario->cargo }}
    <br>
    @if ($funcionario->imagem)
        <img src="{{ asset('img/' . $funcionario->imagem) }}" style="max-width: 300px;">
    @else
        <p class="text-md text-gray-500 italic">Este funcionário não possui nenhuma imagem cadastrada.</p>
    @endif
@endsection