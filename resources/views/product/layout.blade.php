<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos Nota 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="p-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ url('/') }}"
                            class="nav-link px-2 {{ Request::is('products') ? 'link-secondary' : 'link-dark' }}">Produtos</a>
                    </li>
                    <li><a href="{{ url('/categories') }}"
                            class="nav-link px-2 {{ Request::is('categories') ? 'link-secondary' : 'link-dark' }}">Categorias</a>
                    </li>
                </ul>

                <div class="dropdown text-end">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <a type="button" href="{{ url('/products/create') }}"
                            class="btn btn-outline-primary me-2 {{ Request::is('products/create') ? 'active' : '' }}">Cadastrar
                            produto</a>
                        <a type="button" href="{{ url('/categories/create') }}"
                            class="btn btn-outline-primary me-2 {{ Request::is('categories/create') ? 'active' : '' }}">Cadastrar
                            categoria</a>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">O melhor gerenciador de estoque</h1>
                <p class="lead fw-normal text-white-50 mb-0">Gerencie seu estoque com o Produtos Nota 10</p>
            </div>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="py-5 my-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">
                A1 - Desenvolvimento de Software para Web<br>
                UniRitter - FAPA - Ciência da Computação - Noite<br>
                Desenvolvido e prototipado por Bernardo Moreira e Enzo Petry.<br>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        $(window).on('load', function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const error = urlParams.get('error')

            if (error) {
                $('.error').css('display', 'block')
                $('.error-message').html(error)
            }
        });
    </script>
</body>

</html>
