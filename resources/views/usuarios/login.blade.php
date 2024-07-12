@extends('base')

@section('titulo', 'Login | Usuários')

@section ('conteudo')

@if($errors->any())
    <div>
        <h4>Preenche a porcaria do formulário</h4>
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="Username">
    <br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="submit" value="Entrar">
</form>

@if(session('erro'))
    <div style='background-color: red; color: white; width: 177px;'>{{ session('erro') }}</div>
@endif

@endsection