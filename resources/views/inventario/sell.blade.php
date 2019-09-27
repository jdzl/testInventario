@extends('layout')
@section('content')
<form method="POST" action="{{ route('inventario/sell') }}"  role="form" enctype="multipart/form-data">
 
  <!-- <input type="hidden" name="_method" value="PUT"> -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
            <div class="form-group ">
              <label for="libro">Seleccione referencia del libro a vender</label>
              <select class="form-control" name="codigo" id="libro" required >
                <option value="" selected="selected"><em>---</em></option>
                @foreach($libros as $libro)                
                <option value="{{$libro->codigo}}" 
                {{  isset($data) &&  $data['codigo'] == $libro->codigo ? 'selected="selected"' : '' }} 
                >{{$libro->codigo}} - {{$libro->nombre}} ({{$libro->cantidad}}) </option>
                @endforeach
              </select>

            </div>
         
  
    <div class="form-group">
		<label for="precio" class="negrita">Cantidad:</label> 
		<div>
			<input class="form-control" placeholder="" required="required" name="cantidad"  type="number" min="0" id="cantidad" value="{{isset($data)?$data['cantidad']:'' }}"> 
            @isset($error)
    <small class="text-danger">{{ $error  }}</small>
    
@endisset            
		</div>
	</div>
    <div class="form-group">
		<label for="precio" class="negrita">Precio venta:</label> 
		<div>
			<input class="form-control" placeholder="" required="required" name="precio"  type="number" min="0" id="precio" value="{{isset($data)?$data['precio']:'' }}"> 
		</div>
	</div>
	<div class="form-group">
		<label for="precio" class="negrita">Nombre del cliente</label> 
		<div>
			<input class="form-control" placeholder="" required="required" name="empresa_cliente" type="text" id="empresa_cliente" value="{{isset($data)?$data['empresa_cliente']:'' }}"> 
		</div>
	</div>
  <div class="form-group">
		<label for="precio" class="negrita">Total</label> 
		<div>
			<input class="form-control" placeholder="" required="required" disabled type="text" id="total" value=""> 
		</div>
	</div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="" class="btn ">Cancelar</a>
    </form>
    <script>
      $(document).ready(function(){

        $("#precio,#cantidad").on("change", function(){
          let total = parseFloat($("#precio").val()) * parseFloat($("#cantidad").val())
          total =  isNaN( total) ?'':total
          $("#total").val(total)
        })
        
        let total = parseFloat($("#precio").val()) * parseFloat($("#cantidad").val())
        total =  isNaN( total) ?'':total
        $("#total").val(total)

      })
      </script>
    @endsection