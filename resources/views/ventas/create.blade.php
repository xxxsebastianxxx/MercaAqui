@extends('layouts.app')

@section('content')
@can('menuHome')
<script type="text/javascript">
    function restar() {
        var x = parseInt(document.getElementById('valor1').value);
        document.getElementById('resultado').innerHTML = x - {{$sql3}};
    }
</script>
@if($errors->any())
<div class="alert alert-danger errores" role="alert">
    ERROR!
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>
@endif

<div id="tablaPrincipal">
    <table class="table table-bordered tablaventa" id="tablaPrincipal">
        <thead>
            <tr>
                <th>id</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio total</th>
                <th>Producto vendido</th>
                <th>Editar Producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $ventas)
            <tr>

                <td class="ids_venta"></td>
                <td><img src="/images/imagenVentas.jpg" alt="imagen del producto" class="imagenesTablas">{{ $ventas->Nombre_producto }}</td>
                <th scope="row">{{ $ventas->Cantidad }}</th>
                <td>{{ $ventas->Precio }}</td>
                <td>{{ $ventas->Precio_total }}</td>
                <td>{{ $ventas->created_at }}</td>
                <td><a href="/ventas/{{ $ventas->id }}/edit" style="margin-left: 20px;" type="button" class="btn btn-warning">Modificar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br><br><br><br><br><br>
<div id="pieDePagina">

    <form action="/ventas" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="ingresarDatosVenta">
            <div class="inputVenta2">
                <label for="disabledTextInput" class="form-label">
                    <h6>Producto</h6>
                </label>
                <select class="form-select select_venta" name="id_producto" id="id_producto">
                    <option selected>seleccione Producto</option>
                    @foreach ($producto as $producto)
                    <option class="form-control" value="  {{ $producto->id }}">{{ $producto->Nombre_producto }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="inputVenta">
                <label for="disabledTextInput" class="form-label">
                    <h6>Cantidad</h6>
                </label>
                <div id="orden_cantidad_venta">
                    <div class="ingreso_cantidad">
                        <input type="text" id="Cantidad" name="Cantidad" class="form-control " placeholder="Cuantos unidades">
                    </div>
                    <div class="botonInputVenta">
                        <button id="REGISTAR" type="submit" class="btn btn-primary botonesCantidad">Registar</button>
                    </div>

                </div>
            </div>

        </div>
    </form>
    <div id="tablaPrecios">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1 textoTablaPago">Pago Cliente</th>
                    <th class="col-1 textoTablaPago"> <button type="button" class="btn btn-secondary" onclick="restar()" ;>Cambio</button></th>
                    <th class="col-1 textoTablaPago"><a> Precio Total</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <input type="text" id="valor1" name="valor1" class="form-control"> </td>
                    <td class="textoTablaPago"> <span id="resultado"></span> </td>
                    <td id="valor2">{{ $sql3 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="opciones_ventas_facturacion">
        <form action="/ventas/2" method='POST' enctype="multipart/form-data">
            @csrf
            @method('delete')
            <button onclick=" return borrar();" type='submit' class='btn btn-danger boton_acceso_rapido '>Facturar</button>
        </form>
        <!-- <script>alert('hello');window.location.href="/ventas";</script> -->
        <script >
              function borrar(){
                  var respuesta = confirm("estas seguro que deseas facturar");
                  if (respuesta == true)
                  {
                     return true;
                  }
                  else
                  {
                     return false;
                  }
                  }
         </script>
        <a class="btn btn-success boton_acceso_rapido" href="/facturacion" type="submit">Recibo</a>
    </div>
    <div class="opciones_ventas">

        <a class="btn btn-success boton_acceso_rapido" href="productos" type="submit">Vista Productos</a>

        <a class="btn btn-success boton_acceso_rapido" href="vendedores">Vista Vendedor</a>


        <a class="btn btn-dark boton_acceso_rapido" href="/home">Atras</a>

    </div>
</div>
@else
  <div class="container" id="contenerdorgeneralhome">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header text-center font-weight-bold">
                <p>acceso denegado para el </p>
                {{ __('usuario') }} {{ Auth::user()->name }}
            </div>
            <div class="row menu">
                <div class="contenedor col2"  >
                    <a href="/home" class="">
                        <figure>
                            <img src="/images/xxx.png">
                            <div class="capa">
                                <h3>Acceso Denegado</h3>
                            </div>
                        </figure>
                    </a>
                </div>
            <div class="card-body">
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endcan
@endsection
