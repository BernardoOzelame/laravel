@extends('base')
@section('titulo', 'Bem-vindo à Página Inicial!')
@section('conteudo')
    <div class="text-gray-700">
        @if(!Auth::user())
            <p class="mb-4 text-lg">
                Estamos felizes por tê-lo aqui! Para acessar o sistema, é necessário realizar o login.
            </p>
            <p class="mb-4 text-lg">
                Basta clicar na imagem localizada no canto superior direito e, em seguida, selecionar <span class="font-semibold">"Login"</span>.
            </p>
        @endif
        <p class="text-md text-gray-500 italic">
            Caso precise de ajuda, não hesite em contatar o administrador do sistema.
        </p>
    </div>
@endsection