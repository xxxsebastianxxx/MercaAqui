@extends('layouts.app')

@section('content')
@can('soloAdmin')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        <li>posibles errores:</li>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    
</div>

@endif
<div class="row justify-content-center">
    <div class="col-11" style="border-radius: 5px; background:#fff; border: solid 1px;">
        <div id="tituloEditProductos" style="margin-top: 10px;">
            <h2>Modificar {{$producto->Nombre_producto}}</h2>
        </div>
        <form action="/productos/{{$producto->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="inputCreateProductos">
                <label for="Nombre_producto" class="form-label">
                    <h3>Nombre del Producto</h3>
                </label>
                <input type="text" class="form-control" id="Nombre_producto" name="Nombre_producto" placeholder="Ingrese el nombre del producto" value="{{$producto->Nombre_producto}}">
            </div>
            <div class="inputCreateProductos">
                <label for="Imagen" class="form-label">
                    <h3>Imagen</h3>
                </label>
                <input type="file" class="form-control" id="Imagen" name="Imagen">
            </div>
            <div class="inputCreateProductos">
                <label for="Descripcion" class="form-label">
                    <h3>Descripcion</h3>
                </label>
                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese la Descripcion del producto" value="{{$producto->Descripcion}}">
            </div>
            <div class="inputCreateProductos">
                <label for="Cantidad" class="form-label">
                    <h3>Cantidad</h3>
                </label>
                <input type="text" class="form-control" id="Cantidad" name="Cantidad" placeholder="Ingrese la Cantidad del producto" value="{{$producto->Cantidad}}">
            </div>
            <div class="inputCreateProductos">
                <label for="Precio" class="form-label">
                    <h3>Precio</h3>
                </label>
                <input type="text" class="form-control" id="Precio" name="Precio" placeholder="Ingrese el Precio del producto" value="{{$producto->Precio}}">
            </div>
            <div class="inputCreateProductos">
                <a href="/productos" class="btn btn-dark">Atras</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
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
@endsection