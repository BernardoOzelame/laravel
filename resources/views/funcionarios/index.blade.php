@extends('base')

@section('titulo', 'Funcionários em uma empresa')

@section ('conteudo')
    <p>
        <a class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" href="{{ route('funcionarios/cadastrar') }}"><i class="fas fa-plus mr-3   "></i> Cadastrar funcionário</a>
    </p>

    <div class="bg-white overflow-auto min-w-full mt-8">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Cargo</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Departamento</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Salário</th>
                    <th colspan="2" class="w-1/12 uppercase font-semibold text-sm">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($funcionarios as $idx => $funcionario)
                    <tr @if ($idx % 2) class="bg-gray-200" @endif>
                        <td class="text-left py-3 px-4">{{ $funcionario['nome'] }}</td>
                        <td class="text-left py-3 px-4">{{ $funcionario['cargo'] }}</td>
                        <td class="text-left py-3 px-4">{{ $funcionario['departamento'] }}</td>
                        <td class="text-left py-3 px-4">R$ {{ $funcionario['salario'] }}</td>
                        <td class="text-center py-3 px-4">
                            <a class="bg-green-200 border-green-500 border-2 opacity-60 rounded-lg p-2 font-bold text-green-900" href="{{ route('funcionarios/editar', $funcionario['id']) }}"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td class="text-center py-3 px-4">
                            <a class="bg-red-200 border-red-500 border-2 opacity-60 rounded-lg p-2 font-bold text-red-900" href="{{ route('funcionarios/apagar', $funcionario['id']) }}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection