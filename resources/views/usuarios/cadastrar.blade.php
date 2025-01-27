@extends('base')
@section('titulo', 'Cadastrar')
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

    <form method="post" action="{{ route('usuarios/gravar') }}" class="p-10 bg-white rounded shadow-xl">
        @csrf
        <div>
            <label class="block text-sm text-gray-600" for="name">Nome</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">E-mail</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="username">Username</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Senha</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="admin">Atribuir privilégios de administrador a este usuário?</label>
            <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="admin" value="{{ old('admin') }}">
                <option value="null">Selecione</option>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="mt-6 flex justify-end">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
        </div>
    </form>
@endsection