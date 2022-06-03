@extends('layouts.app')
@section('content')
@can('menuHome')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>posibles errores:</li>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <h3 class="titlemodcantid">Modificar cantidad del prodecto</h3>
    <div class="container formmodcant" >
        <form action="/ventas/{{ $editar->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="disabledTextInput" class="form-label">
                    <h6>Cantidad</h6>
                </label>
                <input type="number" id="Cantidad" name="Cantidad" class="form-control"
                    value="{{$editar->Cantidad}}">
                <br><br>
                <a href="/ventas" class="btn btn-dark">Atras</a>
                <button type="submit" class="btn btn-primary">Registar</button>
            </div>
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
