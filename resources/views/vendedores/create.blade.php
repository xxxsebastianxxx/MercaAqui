@extends('layouts.app')
@section('content')
@can('menuHome')
@can('soloAdmin')
@if($errors->any())
<div class="alert alert-warning">
  <ul>
    <li>posibles errores:</li>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  @endif
</div>

<div class="row justify-content-center">
  <div class="col-11" style="border-radius: 5px; background:#fff; border: solid 1px;" >
    <form action="/vendedores" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="inputCreateProductos">
        <label for="Imagen" class="form-label">
          <h3>Nombre</h3>
        </label>
        <input class="form-control" id="nombrenv" name="nombrenv" placeholder="Ingrese el nombre del vendedor">
      </div>
      <div class="inputCreateProductos">
        <label for="Descripcion" class="form-label">
          <h3>Email</h3>
        </label>
        <input type="email" class="form-control" id="emailnv" name="emailnv" placeholder="Ingrese el email del vendedor">
      </div>
      <div class="inputCreateProductos">
        <label for="Descripcion" class="form-label">
          <h3>Contraseña</h3>
        </label>
        <input type="password" class="form-control" id="contraseñanv" name="contraseñanv" placeholder="Ingrese la contraseña del vendedor">
      </div>
    <div class="inputCreateProductos">
      <a href="/vendedores" class="btn btn-dark">Atras</a>
      <button class="btn btn-primary" type="submit">Crear vendedor</button>
    </div>
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
@endcan
@endsection