@extends('layouts.app')

@section('title') Nuevo inventario @endsection
@section('title_content') Nuevo inventario @endsection

@section('MyScripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="{{ asset('assets/js/equipos.js') }}"></script>
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <a href="{{ route('equipos') }}" class="btn btn-primary btn-sm">Volver a menú principal</a>
               <a href="#ex1" onclick="insertCategori()" id="btn_modal" rel="modal:open"  class="btn btn-primary btn-sm">
                  Agregar categoria
              </a>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
               @if ( session('mensaje') )
               <div class="alert alert-success">{{ session('mensaje') }}</div>
               @endif
               <form method="POST" action="/nuevo" >
                  @csrf
                  <div class="row">
                     <div class="form-group col-3">
                        <select   name="categoria"  class="form-control " id="categoria" required>
                           <option value="">Seleccione</option>
                           @foreach($categorias as $categoria)
                              <option value={{$categoria->id}} name="" >{{$categoria->Categoria}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-3">
                        <input  type="text" name="tipo" id="tipo" placeholder="Nombre equipo" class="form-control mb-2" required min="1" maxlength="69"/>
                     </div>
                     
                  </div>
                  <div class="row">
                     <div class="form-group col-3">
                        <input  type="text" name="referencia" id="referencia" placeholder="Referencia" class="form-control mb-2" required min="1" maxlength="49"/>
                     </div>
                     <div class="form-group col-3">
                        <input  type="text" name="marca" id="marca" placeholder="Marca" class="form-control  mb-2" required min="1" maxlength="29"/>
                     </div>
                     <div class="form-group col-3">
                        <select   name="estado"  class="form-control " id="estado" required>
                           <option value="">Seleccione</option>
                           <option  value="activo" name="activo" id="activo">Activo</option>
                           <option  value="Inactivo" name="Inactivo" id="Inactivo">Inactivo</option>
                        </select>
                     </div>
                     <div class="form-group col-3">
                        <input   type="text" name="ubicacion" placeholder="Ubicación" class="form-control mb-2" id="ubicacion" required min="1" maxlength="19"/>
                     </div>
                  </div>
                  <div class="field_wrapper row">
                     <div class="input-group">
                        <input type="text" class="form-control mb-2 col-md-11" name="cantidades[]" placeholder="Ficha Tecnica" required min="1" maxlength="533"/>
                        <a href="javascript:void(0);" class="add_button form-group col-1 " title="Agregar casilla"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                     </div>
                 </div>
                 
                  <br>
                  <button id="agregar" class="btn btn-primary btn-block" type="submit">Agregar</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="modal" class="modal-dialog modal-dialog-centered" height="450px" width="450px">
   <form method="POST" action="/equipos/insertar_categoria" id="ex1" class="modal" style="text-align:center;">
      @csrf
      <div class="form-group col-12">
         <label name="Categoria" for="categoria" class="label">Agrega una categoria<label>
      </div>
      <div class="row justify-content-center">
         <div class="form-group col-8">
               <input  type="text" name="Categoria" placeholder="Categoria" class="form-control mb-2" required min="1" maxlength="49"/>
         </div>
         <br>
         <button id="agregar" class="btn btn-primary btn-block" type="submit">Agregar</button>
      </div>
   </form>
</div>
@endsection