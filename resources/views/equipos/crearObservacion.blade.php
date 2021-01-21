@extends('layouts.app')

@section('title') Crear observaciones @endsection
@section('title_content') Crear observaciones @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- $observacion->Observaciones = $request->observacion;
        $observacion->FechaObservacion = $date;
        $observacion->equipos_id = $variable;
        $observacion['users_id'] = auth()->user()->id;--}}
            <div class="card">
                <div class="card-body">     
                  <form method="POST" action="{{route('nuevo')}}">
                    @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="nombre" class="control-label">Observacion</label>
                                <textarea type="text" class="form-control" id="mensaje" name="observacion" rows="5" required min="1" maxlength="249"></textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$id}}"/>
                        </div>
                    <button class="btn btn-primary btn-block" type="submit" >Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection