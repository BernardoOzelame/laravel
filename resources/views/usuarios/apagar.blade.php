@extends('base')
@section('titulo', 'Apagar')
@section('conteudo')
    <div class="p-10 bg-white rounded shadow-xl">
        <p class="text-lg text-gray-700 font-bold">Tem certeza que deseja apagar este funcionário?</p>

        <p class="mt-4 text-gray-600">
            <em>
                <b>ID:</b> {{ $usuario['id'] }} 
                <br>
                <b>Nome:</b> {{ $usuario['name'] }}
                <br>
                <b>E-mail:</b> {{ $usuario['email'] }}
                <br>
                <b>Username:</b> {{ $usuario['username'] }}
            </em>
        </p>

        <form method="post" action="{{ route('usuarios/apagar', $usuario['id']) }}" class="mt-6 mb-6">
            @method('delete')
            @csrf
            @if ($usuario['username'] != 'admin')
                <button 
                    type="submit" 
                    class="px-4 py-2 text-white font-bold tracking-wider bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Pode apagar sem medo
                </button>
            @else
                <p class="text-md text-gray-500 italic">
                    Não é possível apagar o administrador principal do sistema.
                </p>
            @endif
        </form>

        <a 
            href="{{ route('usuarios') }}" 
            class="px-3 py-2 text-white font-bold tracking-wider bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 text-center">
            Cancelar
        </a>
    </div>
@endsection