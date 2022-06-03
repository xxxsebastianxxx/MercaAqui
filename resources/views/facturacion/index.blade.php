<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MercaAqui</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="/descarga.jfif" />
    <!-- <Link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
  <Link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet" /> -->

</head>

<body id="colorBody">
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <div id="app">
        <nav class=" colorNavegacion navbar navbar-expand-md navbar-light shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    MercaAquí
                </a>

            </div>
        </nav>

        <main class="py-4">

            <br><br>

            <h3 class="titulorecibo">Facturas de ventas realizadas </h3>

            <div id="tablaPrincipal">
                <table id="example" class="table table-striped table-bordered tablas_de_facturacion">
                    <thead>
                        <tr class="text-center align-middle">
                            <th class="col-1">Id</th>
                            <th class="col-1">Creado</th>
                            <th class="col-1">Editado</th>
                            <th class="col-1">Id venta</th>
                            <th class="col-1">Id producto</th>
                            <th class="col-1">Nombre producto</th>
                            <th class="col-1">Cantidad</th>
                            <th class="col-1">Precio</th>
                            <th class="col-1">Precio total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facturacion as $facturacion)
                        <tr>
                            <td class="text-center">{{$facturacion->id}}</td>
                            <td class="text-center">{{$facturacion->created_at}}</td>
                            <th class="text-center">{{$facturacion->updated_at}}</th>
                            <th class="text-center">{{$facturacion->id_ventas}}</th>
                            <td class="text-center">{{$facturacion->id_producto}}</td>
                            <td class="text-center">{{$facturacion->Nombre_producto}}</td>
                            <td class="text-center">{{$facturacion->Cantidad}}</td>
                            <td class="text-center">{{$facturacion->Precio}}</td>
                            <td class="text-center">{{$facturacion->Precio_total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <br><br>
            <!-- <br> -->
            <div id="pieDePagina">
                <div class="pieVistasAdministradorDerecho">
                    <a class="btn btn-dark" href="/ventas" type="submit">Atras </a>
                </div>
            </div>
            <br>
        </main>
    </div>
</body>

</html>