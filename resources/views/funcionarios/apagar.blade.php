@extends('base')
@section('titulo', 'Apagar')
@section('conteudo')
    <div class="p-10 bg-white rounded shadow-xl">
        <p class="text-lg text-gray-700 font-bold">Tem certeza que deseja apagar este funcionário?</p>

        <p class="mt-4 text-gray-600">
            <em>
                <b>ID:</b> {{ $funcionario['id'] }} 
                <br>
                <b>Nome:</b> {{ $funcionario['nome'] }}
                <br>
                <b>Cargo:</b> {{ $funcionario['cargo'] }}
                <br>
                <b>Departamento:</b> {{ $funcionario['departamento'] }}
            </em>
        </p>

        <form method="post" action="{{ route('funcionarios/apagar', $funcionario['id']) }}" class="mt-6 mb-6">
            @method('delete')
            @csrf
            <button 
                type="submit" 
                class="px-4 py-2 text-white font-bold tracking-wider bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                Pode apagar sem medo
            </button>
        </form>

        <a 
            href="{{ route('funcionarios') }}" 
            class="px-3 py-2 text-white font-bold tracking-wider bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 text-center">
            Cancelar
        </a>
    </div>

@endsection