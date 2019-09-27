@extends('layout')
@section('content')
<h3>Libros</h3>
  <table class="table table-striped" id="history" >
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Libro</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>      
      <th scope="col">Cliente / Proveedor</th>
      <th scope="col">Entrada / Salida</th>
      <th scope="col">Fecha </th>
    </tr>
  </thead>
  <tbody>
  @foreach($history as $item)
                        <tr>
                            <td scope="row">{{$item->codigo}}</td>
                            <td>{{$item->inventario->nombre}}</td>
                            <td><i class="fa fa-dollar mr-2"></i>{{$item->precio}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>{{$item->empresa_cliente}}</td>
                            <td>{!! ($item->tipo == 0) ? 
                                'Entrada <i class="fa fa-angle-double-up text-success" ></i>':
                                'Salida <i class="fa fa-angle-double-down text-danger"></i>' !!}
                            </td>
                            <td title="{{$item->created_at}}">{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                        </tr>
@endforeach

  </tbody>
</table>

<script>
$(document).ready(function() {
    $('#history').DataTable({
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