@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Podólogas
    </h5>

    <div class="text-right">
        <a href="javascript:" class="btn btn-magic" onclick="nuevoPodologa()">
            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
            Nueva podóloga
        </a>
    </div>

@stop

@section('content')

<div class="table-responsive p-2">
    <table class="table table-hover w-100 text-sm" id="tblPodologas">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Tipo contrato</th>
                <th>Ape. paterno</th>
                <th>Ape. materno</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Fecha Reg</th>
                <th>Fecha Mod.</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>

@include('admin.podologas.mdl_create')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/podologas/podologas.js') }}" language="JavaScript"></script>
    <script>

    </script>

<script>

    var flagUrl = '{{ URL::asset('') }}';

    $(document).ready(function() {

        /* Cargando los Podologas  */
        var table = $('#tblPodologas').DataTable( {
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
                    "url" : flagUrl+"admin/podologas/datatable",
                    "type" : "POST",
                    "data" : {'_token' : '{{ csrf_token() }}'}
                },
            "columnDefs": [
                {
                    className: "text-center", "targets": [0,4,5,6,7,8]
                }
            ],
            "aaSorting": [[ 6, "desc" ]],
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': "_all" }
            ],

            "columns" : [
                { data: 'id' },
                { data: 'tipo_contrato' },
                { data: 'ape_paterno' },
                { data: 'ape_materno' },
                { data: 'nombres' },
                { data: 'dni' },
                { data: 'fecha_reg' },
                { data: 'fecha_mod' },
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
