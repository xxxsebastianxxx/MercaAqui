@extends('layouts.app')

@section('content')
@can('menuHome')
@can('soloAdmin')
<div class="container" id="contenerdorgeneralhome">
    <div class="row justify-content-center" id="contenerdorgeneralhome">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    {{ __('Panel administrador') }}
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
                    <div class="contenedor col">
                        <a href="../vendedores">
                            <figure>
                                <img src="/images/Vendedor.jpeg">
                                <div class="capa">
                                    <h3>Vendedores</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    
                    <div class="contenedor col">
                        <a href="../productos">
                            <figure>
                                <img src="/images/productos.jpg">
                                <div class="capa">
                                    <h3>Productos</h3>
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
@endcan
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