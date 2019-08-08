<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
               
                padding: 10px 25px;
                font-size: 13px;
                font-weight: 600;
                /* letter-spacing: .1rem; */
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn-outline-awesome {
                color: #ff33d7;
                background-color: transparent;
                background-image: none;
                border-color: #ff33d7;
            }

            .btn-outline-awesome:hover {
                color: white;
                background-color: #ff33d7;
                background-image: none;
                border-color: white;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Estoque API
                </div>

                <div class="links">
                        <div class="btn-group-lg" role="group" aria-label="Exemplo básico">
                    <a class="btn btn-outline-primary" href="api/produtos">Produtos</a>
                    <a  class="btn btn-outline-success" href="api/marcas">Marcas</a>
                    <a  class="btn btn-outline-danger" href="api/sabores">Sabores</a>
                    <a  class="btn btn-outline-warning" href="api/depositos">Depositos</a>
                    <a  class="btn btn-outline-info" href="api/estoque">Estoque</a>
                    <a  class="btn btn-outline-secondary" href="api/transacoes">Transacoes</a>
                    <a  class="btn btn-outline-awesome" href="api/healthcheck">HealthCheck</a>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>
