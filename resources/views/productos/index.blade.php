@extends('layouts.app')
@section('content')
@can('menuHome')
<div id="tablaPrincipal">
  <table class="table table-bordered align-middle table-responsive">
    <thead>
      <tr class="text-center align-middle">
        <th class="col-2">Producto</th>
        <th class="col-1">Cantidad</th>
        <th class="col-1">Id</th>
        <th class="col-1">Precio Unitario</th>
        @can('soloAdmin')
        <th class="col-1">Acciones</th>
        @endcan
        
      </tr>
    </thead>
    <tbody>
      @foreach($producto as $producto)
      <tr >
        <td ><img src="/images/{{$producto->Imagen}}" alt="imagen del producto" class="imagenesTablas vertical">{{$producto->Nombre_producto}}</td>
        <td class="text-center vertical">{{$producto->Cantidad}}</td>
        <th class="text-center vertical">{{$producto->id}}</th>
        <td class="text-center vertical">{{$producto->Precio}}</td>
        @can('soloAdmin')
        <td class="text-center  vertical">
          <a href="/productos/{{$producto->id}}/edit" class="btn btn-warning">Modificar</a>
          <a href="/productos/{{$producto->id}}/borrar" class="btn btn-danger ">Eliminar</a>
        </td>
        @endcan
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div id="pieDePagina">
  @can('soloAdmin')
  <div class="pieVistasAdministradorIzquierdo">
    <a class="btn btn-dark" href="../administrador" type="submit">Atras </a>
  </div>
  @endcan
  @can('soloUsuario')
  <div class="pieVistasAdministradorIzquierdo">
    <a class="btn btn-dark" href="../" type="submit">Atras </a>
  </div>
  @endcan
  <div class="pieVistasAdministradorDerecho">
    <a class="btn btn-success" href="ventas" type="submit">Ventas </a>
  </div>
  <div class="pieVistasAdministradorDerecho">
    <a class="btn btn-success" href="vendedores">Vista Vendedores</a>
  </div>
  @can('soloAdmin')
  <div class="pieVistasAdministradorDerecho">
    <a class="btn btn-success" href="productos/create">Crear Producto</a>
  </div>
  @endcan
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
