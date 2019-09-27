@extends('layout')
@section('content')
@if(isset($data))
<form method="POST" action="{{ route('inventario/edit') }}"  role="form" >
 
  <!-- <input type="hidden" name="_method" value="PUT"> -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
		<label for="nombre" class="negrita">Codigo:</label> 
		<div>
			<input class="form-control" placeholder="Codigo del libro" required="required" disabled name="codigo" type="text" id="codigo" value="{{$data['codigo'] }}"> 
            <input class="form-control" placeholder="Codigo del libro" required="required"  name="codigo" type="hidden" id="codigo" value="{{$data['codigo'] }}"> 
		</div>
	</div>
<div class="form-group">
		<label for="nombre" class="negrita">Nombre:</label> 
		<div>
			<input class="form-control" placeholder="Nombre del libro" required="required" name="nombre" type="text" id="nombre" value="{{$data['nombre'] }}"> 
		</div>
	</div>
 
	<div class="form-group">
		<label for="precio" class="negrita">Precio unidad:</label> 
		<div>
			<input class="form-control" placeholder="USD" required="required" name="precio_unidad" type="number" min="0" step="0.1" id="precio" value="{{$data['precio_unidad'] }}"> 
		</div>
	</div>

 
	<div class="form-group">
		<label for="stock" class="negrita">Stock: (Actualmente tiene {{$data['cantidad']}} unidad{{($data['cantidad']>1)?'es':'' }} )</label> 
		<div>
			<input class="form-control" placeholder="Agregar nuevas unidades" required="required" name="cantidad" type="number" min="0.0"  id="cantidad" value=""> 
		</div>
	</div>
 
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('inventario')}}" class="btn ">Cancelar</a>
    </form>
    @else
        Oops..!
    @endif
    @endsection