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
    <form action="{{ route('funcionarios/editar', $func->id) }}" method="post" class="mb-10 p-10 bg-white rounded shadow-xl" enctype="multipart/form-data">
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
        <div class="mt-2">
            @if(!empty($func->imagem))
                <div class="mt-4 flex items-center justify-between">
                    <button id="ver-imagem" type="button" class="px-4 py-1 text-sm text-white font-light tracking-wider bg-blue-400 rounded hover:bg-blue-600">Ver Imagem atual</button>
                    <button id="alterar-imagem" type="button" class="px-4 py-1 text-sm text-white font-light tracking-wider bg-yellow-300 rounded hover:bg-yellow-500">Alterar Imagem</button>
                </div>

                <div id="modal-imagem" class="z-20 hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center">
                    <div class="bg-white rounded-lg shadow-lg p-5">
                        <img src="{{ asset('img/' . $func->imagem) }}" class="rounded shadow-lg max-w-full max-h-96">
                        <div class="flex justify-end mt-3">
                            <button type="button" id="fechar-modal" class="px-4 py-2 bg-red-500 text-sm text-white rounded" style="max-width: 500px">Fechar</button>
                        </div>
                    </div>
                </div>
                                
                <div id="input-imagem" class="hidden mt-3">
                    <input class="block cursor-pointer w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="imagem" name="imagem" type="file">
                </div>
            @else
                <label class="block text-sm text-gray-600">Adicionar Imagem</label>
                <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="imagem" name="imagem" type="file">
            @endif
        </div>
        <div class="mt-6 flex justify-end">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('modal-imagem');
            const verImagemButton = document.getElementById('ver-imagem');
            const fecharModalButton = document.getElementById('fechar-modal');
            const alterarImagemButton = document.getElementById('alterar-imagem');
            const inputImagemDiv = document.getElementById('input-imagem');

            if (verImagemButton) {
                verImagemButton.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            }
            if (fecharModalButton) {
                fecharModalButton.addEventListener('click', function () {
                    modal.classList.add('hidden');
                });
            }
            if (alterarImagemButton) {
                alterarImagemButton.addEventListener('click', function () {
                    inputImagemDiv.classList.toggle('hidden');
                });
            }
        });
    </script>
@endsection