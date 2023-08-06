@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Atención / Citas
    </h5>

    <div class="text-right">
        <a href="javascript:" class="btn btn-magic" onclick="nuevoCita()">
            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
            Nueva cita
        </a>
    </div>

@stop

@section('content')

<div class="table-responsive p-2">
    <table class="table table-hover w-100 text-sm" id="tblCitas">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Paciente</th>
                <th>Fecha / Hora</th>
                <th>Podólogo(a)</th>
                <th>Consultorio</th>
                <th>Estado</th>
                <th>Fecha Reg</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>

@include('admin.citas.mdl_create')
@include('admin.citas.mdl_edit')

@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/citas/citas.js') }}" language="JavaScript"></script>

    <script>

    var flagUrl = '{{ URL::asset('') }}';

    $(document).ready(function() {

        /* Cargando los citas  */
        var table = $('#tblCitas').DataTable( {
            "responsive": true,
            bInfo: true,
            bSort: true,
            autoWidth: false,
            "processing": true,
            "searching" : true,
            "paging" : true,
            "iDisplayLength": 10,
            "info": false,
            ajax: {
                    "url" : flagUrl+"admin/citas/datatable",
                    "type" : "POST",
                    "data" : {'_token' : '{{ csrf_token() }}'}
                },
            "columnDefs": [
                {
                    className: "text-center", "targets": [0,4,5,6,7]
                }
            ],
            "aaSorting": [[ 6, "desc" ]],
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': "_all" }
            ],

            "columns" : [
                { data: 'id' },
                { data: 'paciente' },
                { data: 'fecha' },
                { data: 'podologo' },
                { data: 'consultorio' },
                { data: 'estado' },
                { data: 'fecha_reg' },
                { data: 'acciones' }
            ],

            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     " _MENU_  &nbsp; entradas por página",
                "sZeroRecords":    "¡No se encontraron registros!",
                "sEmptyTable":     "¡No se encontraron registros!",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de <span class='text-danger'>_TOTAL_</span> registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "&gt;",
                    "sPrevious": "&lt;"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }

        } );

    } );

    </script>
@stop
