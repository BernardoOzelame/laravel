@extends('base')

@section('titulo', 'Cadastrar | Funcionários em uma empresa')

@section ('conteudo')

<p>Preencha o formulário</p>

@if($errors->any())
    <div>
        <h4>Ocorreu o(s) seguinte(s) erro(s):</h4>
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('funcionarios/gravar') }}">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
    <br>
    <input type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo') }}">
    <br>
    <input type="text" name="departamento" placeholder="Departamento" value="{{ old('departamento') }}">
    <br>
    <input type="number" step='any' name="salario" placeholder="Salário" value="{{ old('salario') }}">
    <br>
    <input type="submit" value="Gravar">
</form>

@endsection