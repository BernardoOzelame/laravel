<html>
    </head>
        <title>@yield('titulo')</title>
    </head>
    <body>
        <h1>@yield('titulo')</h1>
        <hr>
        <a href="{{ route('index') }}">Inicial</a>
        |
        <a href="{{ route('funcionarios') }}">Funcionários</a>
        |
        <a href="{{ route('usuarios') }}">Usuários</a>
        |
        <a href="{{ route('login') }}">Login</a>
        <hr>
        @yield('conteudo')
    </body>
</html>