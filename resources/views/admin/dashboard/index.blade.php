@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h1>Sistema de Administración</h1>
@stop

@section('content')
    <p class="p-4">
        Este es mi dashboard
    </p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
