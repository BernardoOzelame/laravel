@extends('base')

@section('titulo', 'Funcionário: ' . $funcionario->nome)

@section ('conteudo')
    <b>Nome: </b>{{ $funcionario->nome }}
    <br>
    <b>Cargo: </b>{{ $funcionario->cargo }}
    <br>
    <img src="{{ asset('img/' . $funcionario->imagem) }}">
@endsection