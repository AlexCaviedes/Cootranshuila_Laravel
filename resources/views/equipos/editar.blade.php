@extends('layouts.app')

@section('title') Modificar @endsection

@section('title_content') Modificar @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{--<div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('equipos') }}" class="btn btn-primary btn-sm">Volver a menú principal</a>
                </div>--}}
                <div class="card-body">     
                 
                <form method="POST" action="{{route('update', $equipos->id)}}">
                    @csrf
                    <!--Computador de mesa-->
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="nombre" class="control-label">Referencia</label>
                                <input id="id_referencia"  type="text" name="referencia" placeholder="Referencia" class="form-control mb-2" value="{{ $equipos->referencias->Referencia }}" required min="1" maxlength="49"/>
                            </div>
                            <div class="form-group col-3">
                                <label for="nombre" class="control-label">Marca</label>
                                <input id="id_marca"  type="text" name="marca" placeholder="marca" class="form-control mb-2"  value="{{ $equipos->referencias->Marca }}" required min="1" maxlength="29"/>
                            </div>
                            <div class="form-group col-3">
                                <label for="nombre" class="control-label">Estado</label>
                                <select id="id_estado"  name="estado" id="select" class="form-control" required>

                                    <option  value="">Estado</option>

                                    <option {{ $equipos->referencias->Estado == 'Activo' ? 'selected' : '' }} value="activo" name="activo" id="activo">Activo</option>

                                    <option {{ $equipos->referencias->Estado == 'Inactivo' ? 'selected' : '' }} value="Inactivo" name="Inactivo" id="Inactivo">Inactivo</option>

                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label for="nombre" class="control-label">Ubicación</label>
                                <input id="id_ubi"  type="text" name="ubicacion" placeholder="Ubicación" class="form-control mb-2" value="{{ $equipos->Ubicacion }}" required min="1" maxlength="19"/>
                            </div>
                            @foreach($json as $total)
                            <div class="form-group col-3">
                                <label for="nombre" class="control-label">Caracteriasticas</label>
                                <input id="id_ficha"  type="text" name="cantidades[]" placeholder="Ubicación" class="form-control mb-2" value="{{ $total }}" required min="1" maxlength="533"/>
                            </div>
                            @endforeach
                        </div>
                    <!--Fin-->
                    <button class="btn btn-primary btn-block" type="submit" id="agregar" >¡Actualizar!</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection