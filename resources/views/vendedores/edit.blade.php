@extends('layouts.app')
@section('content')
@can('soloAdmin')
@if($errors->any())
<div class="alert alert-danger" id="alerterror">
  <ul>
    <li>posibles errores:</li>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  
</div>
@endif

<h2 class="titlemodvendedor"><strong>Modificar datos del vendedor: {{$editar->name}}</strong></h2>

<div  class="tablamodvendedor">
  <div id="tituloEditProductos">
    </div>
    <form action="/vendedores/{{$editar->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="inputCreateProductos">
        <label for="nombre" class="form-label"><h3>Nombre</h3></label>
        <input  class="form-control" id="nombree" name="nombree" placeholder="cambia el nombre " value="{{ old('name') }} {{$editar->name}}">
      </div>
      <div class="inputCreateProductos">
        <label for="Descripcion" class="form-label"><h3>Email</h3></label>
        <input type="text" class="form-control" id="emaile" name="emaile" placeholder="cambia el email" value="{{$editar->email}}">
      </div>
      <a href="/vendedores" class="btn btn-dark btnatrasmodvendedor">Atras</a>
      <button class="btn btn-primary " type="submit">Guardar</button>
    </form>
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
