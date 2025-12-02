<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- LINK FONTES DO GOOGLE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- LINK CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <!-- LINK CSS DE APLICAÇÃO -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/script.js"></script>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div id="navbar">

                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="HDC Events">
                    </a>

                    <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbar"
                            aria-controls="navbar"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">

                        <ul class="navbar-nav ms-auto"> <li class="nav-item">
                                <a href="/" class="nav-link">Eventos</a>
                            </li>

                            <li class="nav-item">
                                <a href="/contato" class="nav-link">Contato</a>
                            </li>

                            <li class="nav-item">
                                <a href="/events/create" class="nav-link">Criar Evento</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Meus Eventos</a>
                            </li>

                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class="nav-link"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                            @endauth

                            @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>

                            <li class="nav-item">
                                <a href="/register" class="btn btn-primary">Cadastrar</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                    </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>


        <footer>
            <p>HDC Events &copy; 2024</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
