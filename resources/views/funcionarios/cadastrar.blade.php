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

    <form method="post" enctype="multipart/form-data" action="{{ route('funcionarios/gravar') }}" class="p-10 bg-white rounded shadow-xl">
        @csrf
        <div>
            <label class="block text-sm text-gray-600" for="nome">Nome</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="cargo">Cargo</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="departamento">Departamento</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="departamento" placeholder="Departamento" value="{{ old('departamento') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="salario">Salário</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" step='any' name="salario" placeholder="Salário" value="{{ old('salario') }}">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="imagem">Imagem</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="imagem" name="imagem" type="file" required="" placeholder="Idade" aria-label="Idade" value="{{ old('idade') }}">
        </div>
        <div class="mt-6 flex justify-end">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
        </div>
    </form>
@endsection