@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Consultorios
    </h5>

    <div class="text-right">
        <a href="javascript:" class="btn btn-magic" onclick="nuevoConsultorio()">
            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
            Nuevo consultorio
        </a>
    </div>

@stop

@section('content')

<div class="table-responsive p-2">
    <table class="table table-hover w-100 text-sm" id="tblConsultorios">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Local</th>
                <th>Consultorio</th>
                <th>Fecha Reg</th>
                <th>Fecha Mod.</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>

@include('admin.consultorios.mdl_create')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/consultorios/consultorios.js') }}" language="JavaScript"></script>
    <script>

    </script>

<script>

    var flagUrl = '{{ URL::asset('') }}';

    $(document).ready(function() {

        /* Cargando los consultorios  */
        var table = $('#tblConsultorios').DataTable( {
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
                    "url" : flagUrl+"admin/consultorios/datatable",
                    "type" : "POST",
                    "data" : {'_token' : '{{ csrf_token() }}'}
                },
            "columnDefs": [
                {
                    className: "text-center", "targets": '_all'
                }
            ],
            "aaSorting": [[ 3, "desc" ]],
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': "_all" }
            ],

            "columns" : [
                { data: 'id' },
                { data: 'local' },
                { data: 'consultorio' },
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
