@extends('base')
@section('titulo', 'Sem permissão de acesso!')
@section('conteudo')
    @if (session('rotaQueTentouAcessar'))
        <p class="text-lg text-gray-500 italic mb-5">
            Você não possui permissão para acessar o módulo de {{ session('rotaQueTentouAcessar') == 'usuarios' ? 'usuários' : session('rotaQueTentouAcessar') }}. Caso acredite que isto seja um erro, contate o administrador do sistema.
        </p>
    @else
        <p class="text-lg text-gray-500 italic mb-5">
            Você não tem permissão para acessar a página solicitada. Caso acredite que isto seja um erro, contate o administrador do sistema.
        </p>
    @endif
    <a href="{{ route('index') }}" class="px-4 py-3 text-white font-bold tracking-wider bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 text-center">Voltar para a página inicial</a>
@endsection