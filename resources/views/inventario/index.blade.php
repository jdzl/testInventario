@extends('layout')
@section('content')
<h3>Libros</h3>
<table class="table table-striped" id="index">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio Unidad</th>
      <th scope="col"><i class="fa fa-cog mr-2"></i></th>
    </tr>
  </thead>
  <tbody>
  @foreach($items as $item)
                        <tr>
                            <th scope="row">{{$item->codigo}}</th>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td title="USD"><i class="fa fa-dollar mr-2"></i>{{$item->precio_unidad}} USD</td>
                            <td><a href="{{ route('inventario/{codigo}',['codigo' => $item->codigo]) }}"><i title="editar libro {{$item->codigo}}" class="fa fa-edit mr-2"></i></a></td>
                        </tr>
@endforeach

  </tbody>
</table>


<script>
$(document).ready(function() {
    $('#index').DataTable({
      language: {
        
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }
    });
} );
</script>
    @endsection