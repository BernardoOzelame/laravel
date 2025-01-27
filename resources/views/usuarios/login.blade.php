@extends('base')
@section('titulo', 'Login')
@section ('conteudo')
    @if($errors->any())
        <div class="bg-red-200 border-t-4 border-red-500 rounded-b text-red-800 px-4 py-3 shadow-md mb-3" role="alert">
            <div class="flex">
                <div class="py-2"><i class="fas fa-exclamation-triangle mr-3"></i></div>
                <div>
                <p class="font-bold">Erro!</p>
                @foreach($errors->all() as $erro)
                    <p class="text-sm">{{ $erro }}</p>
                @endforeach
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('login') }}" method="post" class="p-10 bg-white rounded shadow-xl">
        @csrf
        <div>
            <label class="block text-sm text-gray-600" for="username">Usuário</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" placeholder="Usuário" aria-label="Usuário">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Senha</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Senha" aria-label="Senha">
        </div>
        <div class="mt-6 flex justify-end">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Entrar</button>
        </div>
    </form>
@endsection