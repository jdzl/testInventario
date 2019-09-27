@extends('layout')
@section('content')
<form method="POST" action="{{ route('inventario/create') }}"  role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
		<label for="nombre" class="negrita">Codigo:</label> 
		<div>
			<input class="form-control" placeholder="Codigo del libro" required="required" name="codigo" type="text" id="codigo"> 
		</div>
	</div>
<div class="form-group">
		<label for="nombre" class="negrita">Nombre:</label> 
		<div>
			<input class="form-control" placeholder="Nombre del libro" required="required" name="nombre" type="text" id="nombre"> 
		</div>
	</div>
 
	<div class="form-group">
		<label for="precio" class="negrita">Precio unidad:</label> 
		<div>
			<input class="form-control" placeholder="USD" required="required" name="precio_unidad" type="number" min="0" step="0.1" id="precio"> 
		</div>
	</div>
	<div class="form-group">
		<label for="precio" class="negrita">Proveedor:</label> 
		<div>
			<input class="form-control" placeholder="Nombre del proveedor" required="required" name="proveedor" type="text" id="proveedor"> 
		</div>
	</div>
 
	<div class="form-group">
		<label for="stock" class="negrita">Cantidad:</label> 
		<div>
			<input class="form-control" placeholder="Cantidad" required="required" name="cantidad"  type="number" min="0" id="cantidad"> 
		</div>
	</div>
 
    <button type="submit" class="btn btn-success">Guardar</button>
    <a  href="{{ route('inventario')}}"  class="btn ">Cancelar</a>
    </form>
    @endsection