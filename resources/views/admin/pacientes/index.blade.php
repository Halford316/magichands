@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Pacientes
    </h5>

    <div class="text-right">
        <a href="javascript:" class="btn btn-magic" onclick="nuevoPaciente()">
            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
            Nuevo paciente
        </a>
    </div>

@stop

@section('content')

<div class="table-responsive p-2">
    <table class="table table-hover w-100 text-sm" id="tblPacientes">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Ape. paterno</th>
                <th>Ape. materno</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Fecha Reg</th>
                <th>Fecha Mod.</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</div>

@include('admin.pacientes.mdl_create')
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/pacientes/pacientes.js') }}" language="JavaScript"></script>
    <script>
        (function($){
            $("#email").inputmask("email");

            $('#fecha_nac').val(new Date());

            $('#fecha_nac').inputmask("datetime",{
                mask: "1-2-y",
                placeholder: "dd-mm-yyyy",
                leapday: "-02-29",
                separator: "-",
                alias: "dd-mm-yyyy"
            });


        })(jQuery)
    </script>

<script>

    var flagUrl = '{{ URL::asset('') }}';

    $(document).ready(function() {

        /* Cargando los pacientes  */
        var table = $('#tblPacientes').DataTable( {
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
                    "url" : flagUrl+"admin/pacientes/datatable",
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
                { data: 'ape_paterno' },
                { data: 'ape_materno' },
                { data: 'nombres' },
                { data: 'dni' },
                { data: 'edad' },
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
