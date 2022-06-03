@extends('layouts.app')
@section('content')
@can('menuHome')
    <div class="container" id="contenerdorgeneralhome">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        {{ __('Bienvenido') }} {{ Auth::user()->name }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('') }}
                    </div>
                    <div class="row menu">
                            @can('soloAdmin')
                            <div class="contenedor col"  >
                                <a href="/administrador" class="">
                                    <figure>
                                        <img src="/images/administrador.jpg">
                                        <div class="capa">
                                            <h3>Panel de Administrador</h3>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                            @endcan
                        <div class="contenedor col" >
                            <a href="/ventas" class="">
                                <figure>
                                    <img src="/images/ventas.jpg">
                                    <div class="capa">
                                        <h3>Ventas</h3>
                                    </div>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
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
