<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MercaAqui</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="/descarga.jfif" />
</head>

<body id="colorBody">
    <div id="app">
        <nav class=" colorNavegacion navbar navbar-expand-md navbar-light shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MercaAquí
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="pt-5 pb-3">
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center " id="hero">
                    <div class="col-md-5 p-lg-5 mx-auto my-5 ">
                        <h1 class="display-4 font-weight-normal text-white">MercaAqui</h1>
                        <p class="lead font-weight-normal text-white">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
                        <a class="btn btn-outline-light capa" href="{{ route('login') }}">Iniciar</a>
                    </div>
                </div>
            </div>
            <section id="somos-mercaaqui">
                <div class="contenido">
                    <div class="img-container"></div>
                    <div class="texto">
                        <h2 class="h2">Somos <span class="color-acento">MercaAqui</span></h2>
                        <p>Un software enfocado al menejo de tu negicio de ventas. Contamos con soluciones precticas para la facil venta de tus prodectos, con base de datos hecha a tu medida siempre garantizando la mejor calidad y seguridad para tus ventas</p>
                    </div>
                </div>
            </section>
            <section id="nuestros-servicios">
                <div class="contenido">
                    <h2>Nuestros Servicios</h2>
                    <div class="servicios">
                        <div class="carta">
                            <h3>Productos</h3>
                            <p>en nuestra app puedes agregar  cualquier tipo de producto enfocado a cualquier negocio o empresa con la mejor velocidad de venta y facil de utilizar garantizando la mejor calidad y seguridad para tus ventas entra y no pieras  </p>
                        </div>
                        <div class="carta">
                            <h3>Vendedores</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt vero corporis incidunt saepe qui commodi quasi neque veniam quam, aspernatur est beatae maxime animi sed reiciendis mollitia ducimus veritatis repellendus?</p>
                        </div>
                        <div class="carta">
                            <h3>Ventas</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt vero corporis incidunt saepe qui commodi quasi neque veniam quam, aspernatur est beatae maxime animi sed reiciendis mollitia ducimus veritatis repellendus?</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="caracteristicas">
                <div class="contenido">
                    <ul>
                        <li>✔️ 100% online</li>
                        <li>✔️ Mantenimiento constante</li>
                        <li>✔️ Soporte 1:1</li>
                        <li>✔️ Almacenamiento sin limites</li>
                    </ul>
                </div>
            </section>

            <section id="final">
                <h2>Listo para comenzar?</h2>
                <a href="/login"><button >INICIAR YA!</button></a>
            </section>

            <footer>
                <div class="contenido">
                    <p>&copy; MercaAqui 2022</p>
                </div>
            </footer>
        </main>

    </div>
</body>

</html>
