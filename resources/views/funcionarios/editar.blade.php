@extends('base')

@section('titulo', 'Editar | Funcionários em uma empresa')

@section ('conteudo')

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

    <form action="{{ route('funcionarios/editar', $func->id) }}" method="post">
        @csrf
        @method('put')

        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome', $func->nome ?? '') }}">
        <br>
        <input type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo', $func->cargo ?? '') }}">
        <br>
        <input type="text" name="departamento" placeholder="Departamento" value="{{ old('departamento', $func->departamento ?? '') }}">
        <br>
        <input type="number" step='any' name="salario" placeholder="Salário" value="{{ old('salario', $func->salario ?? '') }}">
        <br>
        <input type="submit" value="Gravar">
    </form>

@endsection