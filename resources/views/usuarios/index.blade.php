@extends('base')
@section('titulo', 'Usuários do sistema')
@section ('conteudo')
    <p>
        <a class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" href="{{ route('usuarios/cadastrar') }}"><i class="fas fa-plus mr-3   "></i> Cadastrar usuário</a>
    </p>
    @if (session('senhaAlterada'))
        <div id="alert-info" 
            class="bg-yellow-200 border-t-4 border-yellow-500 rounded-b text-yellow-800 px-4 py-3 shadow-md mb-3" role="alert"
            style="position: fixed; top: 80px; right: 10px; z-index: 9999; min-width: 350px;">
            <div class="flex">
                <div class="py-2"><i class="fas fa-exclamation-triangle mr-3"></i></div>
                <div>
                    <p class="font-bold">Atenção!</p>
                    <p class="text-sm">{!! session('senhaAlterada') !!}</p>
                </div>
            </div>
        </div>

        <script>
            setTimeout(function () {
                var alertElement = document.getElementById('alert-info');
                if (alertElement) {
                    alertElement.style.transition = 'opacity 0.5s ease';
                    alertElement.style.opacity = 0;
                    setTimeout(() => alertElement.remove(), 500);
                }
            }, 5000);
        </script>
    @endif

    @if (count($usuarios) > 0)
        <div class="bg-white overflow-auto min-w-full mt-8">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">E-mail</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Username</th>           
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Administrador?</th>            
                        <th colspan="2" class="w-1/12 uppercase font-semibold text-sm">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($usuarios as $idx => $usuario)
                        <tr @if ($idx % 2) class="bg-gray-200" @endif>
                            <td class="text-left py-3 px-4">{{ $usuario['name'] }}</td>
                            <td class="text-left py-3 px-4">{{ $usuario['email'] }}</td>
                            <td class="text-left py-3 px-4">{{ $usuario['username'] }}</td>
                            <td class="text-left py-3 px-4"> @if($usuario['admin'] == 0) Não @else Sim @endif </td>
                            <td class="text-center py-3 px-4">
                                <a class="bg-green-200 border-green-500 border-2 opacity-60 rounded-lg p-2 font-bold text-green-900" href="{{ route('usuarios/editar', $usuario['id']) }}"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td class="text-center py-3 px-4">
                                <a
                                    @if ($usuario['username'] == 'admin') 
                                        class="bg-gray-200 border-gray-500 border-2 opacity-60 rounded-lg p-2 font-bold text-gray-900 cursor-not-allowed" 
                                        title="Este usuário é o administrador principal do sistema e não pode ser apagado."
                                    @else 
                                        class="bg-red-200 border-red-500 border-2 opacity-60 rounded-lg p-2 font-bold text-red-900" 
                                        href="{{ route('usuarios/apagar', $usuario['id']) }}"
                                    @endif
                                >
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-md text-gray-500 italic pt-5">Nenhum usuário cadastrado.</p>
    @endif
@endsection