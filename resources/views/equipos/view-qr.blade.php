@extends('layouts.app')

@section('title') Información del equipo @endsection
@section('title_content') Información del equipo @endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{--<div class="right ">
                        <div class="notification d-flex">
                            <a class="btn btn-facebook" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2 font-size-16 align-middle mr-1"></i> Salir</a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>--}}
                </div>
                
                <div class="card-body"> 
                    <div class="table-responsive " style="text-align:center;">
                        <table class="table table-hover">
                            <thead>
                                {{--<div type="hidden">
                                    <th scope="col">
                                        <a class="btn btn-facebook" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2 font-size-16 align-middle mr-1"></i> Salir</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </th>
                                </div>--}}
                                
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Ficha Tecnica</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $equipos->Tipo }}</td>
                                        <td>{{ $equipos->referencias->Referencia }}</td>
                                        <td>
                                            <select   name="informacion"  class="form-control " id="informacion" required>
                                                <option name="" >Estado "{{$equipos->referencias->Estado }}"</option>
                                                @foreach($json as $total)
                                                    <option name="" >{{$total}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </td>
                                    </tr>   
                            </tbody>
                        </table>
                    </div>
                    <div  style="text-align:center;"> 
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection