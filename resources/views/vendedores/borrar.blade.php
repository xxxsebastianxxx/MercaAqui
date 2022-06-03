@extends('layouts.app')
@section('content')
@can('soloAdmin')
<div class="container" style="margin-top: 10rem;  ">
            <div class="row align-items-center justify-content-center">
                <div class="col-8 alert" role="alert"
                style="border-radius: 10px; background-image: linear-gradient(-60deg, #19648C 0%, #124763 100%);">
                <h1 style="font-family: 'Courier New', Courier, monospace;" class="text-center text-white">¿Deseas eliminar al Vendedor "{{ $eliminar->name }}"?</h1>
                <div class="col border-dark text-center mt-4">
                    <form action="/vendedores/{{ $eliminar->id }}" method='POST' enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <a href="/vendedores" class="btn btn-dark text-white col-5">Cancelar</a>
                        <button type='submit' class='btn btn-danger col-5'>Aceptar</button>
                    </form>
                </div>
            </div><br>
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
