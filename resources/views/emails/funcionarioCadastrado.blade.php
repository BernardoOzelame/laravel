<h1>Funcionário cadastrado</h1>
<p>Olha que supimpa! Um novo funcionário foi cadastrado. 🥳</p>
<p>
    <b>Nome: </b>{{ $funcionario->nome }}
    <br>
    <b>Cargo: </b>{{ $funcionario->cargo }}
</p>

<p>
    Olha a foto do funcionário:
    <br>
    <img src="{{ $message->embed('img/' . $funcionario->imagem) }}" style="max-width: 300px;">
</p>

<p>Para saber mais, visite <a href="{{ route('funcionarios/ver', $funcionario->id) }}">o perfil do funcionário</a>.</p>