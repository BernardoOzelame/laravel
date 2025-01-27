@extends('base')
@section('titulo', 'Editar')
@section('conteudo')
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

    @php
        $isAdminPrincipal = $user->username == 'admin';
    @endphp

    <form method="post" action="{{ route('usuarios/editar', $user->id) }}"  class="p-10 bg-white rounded shadow-xl">
        @csrf
        @method('put')
        <div>
            <label class="block text-sm text-gray-600" for="name">Nome</label>  
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name ?? '') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">E-mail</label>  
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="email" name="email" placeholder="E-mail" value="{{ old('email', $user->email ?? '') }}">
        </div>
        <div>
            <label class="block text-sm text-gray-600" for="username" @if($isAdminPrincipal) title="Este usuário é o administrador principal do sistema e não pode ter seu username alterado." style="display: inline-flex; align-items: center;" @endif>
                Username
                @if($isAdminPrincipal)
                    <img 
                        src="{{ asset('img/info.png') }}" 
                        style="margin-left: 5px; width: 12px; height: 12px; opacity: 0.6;"
                    >
                @endif
            </label>  
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @if($isAdminPrincipal) disabled @endif type="text" name="username" placeholder="Username" value="{{ old('username', $user->username ?? '') }}">
            @if($isAdminPrincipal)
                <input type="hidden" name="username" value="admin">
            @endif
        </div>
        <div>
            <label title="A senha será alterada somente se você preencher este campo. Caso contrário, ela permanecerá inalterada." class="block text-sm text-gray-600" for="password" style="display: inline-flex; align-items: center;">
                Senha 
                <img 
                    src="{{ asset('img/info.png') }}" 
                    style="margin-left: 5px; width: 12px; height: 12px; opacity: 0.6;"
                >
            </label>
            <div class="relative">
                <input id="password" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="password" name="password" placeholder="Senha">
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 py-1 text-gray-500 focus:outline-none">
                    <img id="toggleImage" src="{{ asset('img/eyeVisible.png') }}">
                </button>
            </div>
        </div>
        <div>
            <label class="block text-sm text-gray-600" for="admin" @if($isAdminPrincipal) title="Este usuário é o administrador principal do sistema e não pode ter seus privilégios alterados." style="display: inline-flex; align-items: center;" @endif>
                Atribuir privilégios de administrador a este usuário?
                @if($isAdminPrincipal)
                    <img 
                        src="{{ asset('img/info.png') }}" 
                        style="margin-left: 5px; width: 12px; height: 12px; opacity: 0.6;"
                    >
                @endif
            </label>
            <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="admin" @if($isAdminPrincipal) disabled @endif>
                <option value="null">Selecione</option>
                <option value="0" @if($user->admin == 0) selected @endif>Não</option>
                <option value="1" @if($user->admin == 1)selected @endif>Sim</option>
            </select>
            @if($isAdminPrincipal)
                <input type="hidden" name="admin" value="1">
            @endif
        </div>

        <div class="mt-6 flex justify-end">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const togglePassword = document.querySelector("#togglePassword");
            const passwordField = document.querySelector("#password");
            const toggleImage = document.querySelector("#toggleImage");
    
            togglePassword.addEventListener("click", () => {
                const isPassword = passwordField.getAttribute("type") === "password";
                passwordField.setAttribute("type", isPassword ? "text" : "password");
                toggleImage.src = isPassword ? "{{ asset('img/eyeHidden.png') }}" : "{{ asset('img/eyeVisible.png') }}";
            });
        });
    </script>
@endsection