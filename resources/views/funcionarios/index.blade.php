@extends('base')

@section('titulo', 'Funcionários em uma empresa')

@section ('conteudo')
    <p>
        <a href="{{ route('funcionarios/cadastrar') }}">Cadastrar funcionário</a>
    </p>
    <p>Veja a lista de funcionários</p>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Departamento</th>
            <th>Salário</th>
        </tr>
        @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{ $funcionario['nome'] }}</td>
                <td>{{ $funcionario['cargo'] }}</td>
                <td>{{ $funcionario['departamento'] }}</td>
                <td>R$ {{ $funcionario['salario'] }}</td>
                <td><a href="{{ route('funcionarios/editar', $funcionario['id']) }}">Editar</a></td>
                <td><a href="{{ route('funcionarios/apagar', $funcionario['id']) }}">Apagar</a></td>
            </tr>
        @endforeach
    </table>
@endsection