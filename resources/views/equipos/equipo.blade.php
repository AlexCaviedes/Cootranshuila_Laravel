@extends('layouts.app')
@foreach ($equipos as $equipo)
    @section('title') Listado de {{$equipo->categorias->Categoria}} @endsection
    @section('title_content') Listado de {{$equipo->categorias->Categoria}} @endsection
@endforeach


{{--{{dd(json_decode( $equipo->Cantidad))}}--}}
@section('MyScripts')
<script src="{{ asset('assets/js/equipos.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@endsection

@section('content')

<div class="container" id="equipo_1">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ url('/equipos') }}" class="btn btn-primary btn-sm">Volver a menú principal</a>
                    @foreach ($equipos as $equipo)
                        <form class="pull-right " method="GET" action="{{route('busqueda',$equipo->id)}}" >
                    @endforeach
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </span>
                                <input type="text"  name="equipo" class="form-control"  placeholder="Marca o Referencia" required min="1" maxlength="49">
                            </div>
                        </form>
                </div>
                <div class="card-body"> 
                @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                    <div class="table-responsive" style="text-align:center;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($equipos as $equipo)
                                    <tr>
                                        <td>{{ $equipo->referencias->Referencia }}</td>
                                        <td>{{ $equipo->referencias->Marca }}</td>
                                        <td>{{ $equipo->referencias->Estado }}</td>
                                        <td>
                                            <a href="/equipos/ver_equipo/{{$equipo->categorias->Categoria}}/{{$equipo->id}}" type="button" class="btn btn-outline-info btn-sm" title="Más informacion">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                            
                                            {{--<a href="#ex1" onclick="showQr('{{url($equipo->CodigoQR) }}')" id="btn_modal" rel="modal:open"  class="btn btn-outline-secondary btn-sm" title="Ver código Qr">
                                                <i class="fa fa-qrcode "></i>
                                            </a>--}}
                                            <form class="d-inline" method="POST" action="{{route('EliminarEquipo',$equipo->id)}}" id="FormDeleteTime" onsubmit = "return confirmarEliminar()" >
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm " aria-hidden="true"  type="submit" title="Eliminar">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$equipos->links()}}   
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal" class="modal-dialog modal-dialog-centered">
    <div id="ex1" class="modal" style="text-align:center;" >
        
    </div>
</div>
@endsection

