@extends('layouts.app')

@section('content')
@can('menuHome')

<form action="/ventas/{{$deleteproducto}}" method="POST" enctype="multipart/form-data">
    @csrf
      @method('delete')
<div id="tablaPrincipal">
    <table class="table table-bordered tablaventa">
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
                <th scope="row">{{ $eliminar->Cantidad }}</th>
                <td>{{ $eliminar->Precio }}</td>
                <td>{{ $eliminar->Precio_total }}</td>
                <td>{{ $eliminar->created_at }}</td>
                <td><a href="/ventas/{{ $eliminar->id }}/edit" style="margin-left: 20px;" type="button" class="btn btn-warning">modificar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br><br><br><br><br><br>
<div id="pieDePagina">
         <a class="btn btn-outline-success  atras" type="submit">Atras </a>
</form>
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