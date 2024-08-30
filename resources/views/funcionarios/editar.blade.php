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

    <form action="{{ route('funcionarios/editar', $func->id) }}" method="post" class="p-10 bg-white rounded shadow-xl">
        @csrf
        @method('put')
        <div>
            <label class="block text-sm text-gray-600" for="nome">Nome</label>  
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="nome" placeholder="Nome" value="{{ old('nome', $func->nome ?? '') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="cargo">Cargo</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo', $func->cargo ?? '') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="departamento">Departamento</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="departamento" placeholder="Departamento" value="{{ old('departamento', $func->departamento ?? '') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="salario">Salário</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" step='any' name="salario" placeholder="Salário" value="{{ old('salario', $func->salario ?? '') }}">
        </div>
        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
        </div>
    </form>

@endsection