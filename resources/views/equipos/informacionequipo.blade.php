@extends('layouts.app')

@section('title') Información del equipo @endsection
@section('title_content') Información del equipo @endsection


@section('MyScripts')
<script src="{{ asset('assets/js/equipos.js') }}"></script>
@endsection


@section('content')

<div class="container" id="equipo_2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="card-header col-sm float-left">
                            @php
                                $nombre = $equipos->categorias->Categoria
                            @endphp

                            @php
                                $id = $equipos->categorias->id
                            @endphp
                            
                            @if($equipos->categorias->Categoria)
                                <a href="{{ url('/equipos/'.$nombre.'/'.$id) }}" class="btn btn-primary btn-sm col-md-6" >
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    Volver
                                </a>
                            @endif

                        </div>
                        <div class=" card-header col-sm float-right">
                            <a href="{{route('modificar',$equipos->id)}}" class="btn btn-outline-info btn-sm col-md-12" id="modificar" onclick = "return confirmarModificar()" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Modificar
                            </a>
                        </div>
                        <div class="card-header col-sm float-right">
                        <a href="{{route('AgregarObservacion',$equipos->id)}}" type="button" class="btn btn-outline-info btn-sm col-md-12" title="Agregar observación" id="observacion" onclick = "return confirmarObservacion()">
                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                            Agregar observación
                        </a>
                     </div>
                    </div>
                </div>
                <div class="card-body">
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif 
                    <div  style="text-align:center;"> 
                    <table class="table table-hover">
                        <thead> 
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Usuario Creador</th>
                                <th scope="col">Caracteristicas equipo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $equipos->Tipo }}</td>
                                    <td>{{ $equipos->Ubicacion }}</td>
                                    <td>{{ $equipos->users->name }}</td>
                                    <td>
                                        <select   name="informacion"  class="form-control " id="informacion" required>
                                            <option name="" >Ficha Tecnica</option>
                                            @foreach($json as $total)
                                                <option name="" >{{$total}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                        </tbody>
                    </table>
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3">Observaciones</th>
                                    <th>Fecha Observacion</th>
                                </tr>
                            </thead>
                        @foreach ($observaciones as $equipo) 
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <textarea disabled type="text" class="form-control" name="observacion" rows="2" >{{$equipo->Observaciones}}</textarea>
                                    </td>
                                    <td>{{$equipo->FechaObservacion}}</td>
                                </tr>
                            </tbody>
                        @endforeach
                        </table>
                    </div>
                    {{ $observaciones->links() }}
                {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection