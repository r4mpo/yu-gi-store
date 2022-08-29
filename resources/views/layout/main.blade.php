<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- JS --}}
    <script src="/js/CardsRequest.js" defer></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- BootStrap 5.2.0 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- Favi-Icon --}}
    <link rel="shortcut icon" href="/img/layout/yugi-card-icon.jpg" type="image/x-icon">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>

<body class="CompletePage">

    <header>
        <nav class="navbar navbar-expand-lg header d-print-none" style="background-color: #9a0056;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Yu-Gi-Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item headerText" style="margin-top: 8px;">
                        <p><i class="bi bi-arrow-repeat" onclick="CardsRequest()"></i></p>
                    </li>
                    @guest
                        <li class="nav-item headerText">
                            <a class="nav-link" href="/login">ENTRAR</a>
                        </li>
                        <li class="nav-item headerText">
                            <a class="nav-link" href="/register">CADASTRAR-SE</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item headerText">
                            <a class="nav-link" href="/cards/pesquisar">PESQUISAR CARTAS</a>
                        </li>
                        <li class="nav-item headerText">
                            <form action="/logout" method="post">
                                @csrf
                                <a class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">SAIR</a>
                            </form>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" id="search" type="search" placeholder="Buscar carta..." aria-label="Search">
                    <button class="btn btn-outline-warning" type="button" onclick="searchCard()"><i class="bi bi-search"></i></button>
                </form>            
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="footer d-print-none">
            &copy;Yu-Gi-Store | @r4mpo | <a href="https://ygoprodeck.com/api-guide/">YGO-PRO-Deck</a>
        </div>
    </footer>

</bodyc>

</html>