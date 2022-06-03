@extends('layouts.app')

@section('content')
@can('menuHome')

<div id="tablaPrincipal">
  <table class="table table-bordered align-middle table-responsive ">
    <thead>
      <tr class="text-center align-middle">
        <th class="col-3">Nombre Vendedor</th>
        <th class="col-1">Correo Vendedor</th>
        <th class="col-1">ID</th>
        <th class="col-1">Salario</th>
        @can('soloAdmin')
        <th colspan="2" class="col-2">Acciones</th>
        @endcan
      </tr>
    </thead>
    <tbody class="align-items-center">
      @foreach($user as $user)
      <tr>
        <td><img src="/images/iconVendedor.png" alt="imagen del producto" class="imagenesTablas">{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <th class="text-center" scope="row">{{$user->id}}</th>
        
        <td class="text-center">$120.000</td>
        @can('soloAdmin')
        <td class="text-center  vertical">
          <a href="/vendedores/{{$user->id}}/edit" class="btn btn-warning " >Modificar</a>
          <a href="/vendedores/{{$user->id}}/borrar" class="btn btn-danger">Eliminar</a>
        </td>
       @endcan 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br><br>

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
    <a class="btn btn-success" href="ventas" type="submit">ventas </a>
  </div>
  <div class="pieVistasAdministradorDerecho">
    <a class="btn btn-success" href="productos" type="submit">Vista Productos</a>
  </div>
  {{-- <div class="pieVistasAdministradorDerecho">
    <a class="btn btn-success" href="vendedores/create">Crear Vendedor</a>
  </div> --}}
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