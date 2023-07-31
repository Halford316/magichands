@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Paciente:
        <span class="text-dark">
            {{ $ficha->ape_paterno }} {{ $ficha->ape_materno }} {{ $ficha->nombres }}
        </span>
    </h5>
@stop

@section('content')

<div class="row">
    <div class="col-sm-6">

        <div class="card shadow">

            <div class="card-header">
                <i class="fa fa-edit mr-1" aria-hidden="true"></i>
                Editar datos personales
            </div>

            <div class="card-body">

                <form action="" id="frmEditarPaciente" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <br>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="paciente_id" value="{{ old('id', $ficha->id) }}"">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" name="nro_historia" id="nro_historia" class="form-control" placeholder="Nro. historia clínica" value="{{ old('id', $ficha->id) }}"" required>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" name="dni" id="dni" maxlength="10" class="form-control" placeholder="Nro. documento identidad" value="{{ old('dni', $ficha->dni) }}"" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="ape_paterno" id="ape_paterno" class="form-control" placeholder="Apellido paterno" value="{{ old('ape_paterno', $ficha->ape_paterno) }}"" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="ape_materno" id="ape_materno" class="form-control" placeholder="Apellido materno" value="{{ old('ape_materno', $ficha->ape_materno) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" value="{{ old('nombres', $ficha->nombres) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" value="{{ old('celular', $ficha->celular) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email', $ficha->email) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="{{ old('direccion', $ficha->direccion) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="fecha_nac" id="fecha_nac" class="form-control" placeholder="Fecha nacimiento" value="{{ old('fecha_nac', $ficha->fecha_nac) }}" required>
                            </div>
                            <div class="col-sm-4">
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                    <option value="">-- Estado civil --</option>
                                    @foreach ($estado_civil as $llave=>$valor)
                                    <option value="{{ $llave }}" {{ ($llave==$ficha->estado_civil) ? 'selected' : '' }}>{{ $valor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="talla" id="talla" class="form-control" value="{{ old('talla', $ficha->talla) }}" placeholder="Talla">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="peso" id="peso" class="form-control" placeholder="Peso (Kg)" value="{{ old('peso', $ficha->peso) }}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="presion_arterial" id="presion_arterial" class="form-control" placeholder="Presión arterial" value="{{ old('presion_arterial', $ficha->presion_arterial) }}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="ocupacion" id="ocupacion" class="form-control" placeholder="Ocupación" value="{{ old('ocupacion', $ficha->ocupacion) }}">
                            </div>
                        </div>
                    </div>

                    <div class="footer p-3 text-center">
                        <button type="submit" class="btn btn-magic" id="btnGuardarPaciente">
                            Guardar
                            <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                            <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                        </button>
                    </div>

                </form>

            </div>

            <div class="card-footer text-center">
                <a href="javascript:" class="btn btn-magic mr-2" onclick="showHistoriaClinica()">
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                    Historia clínica
                </a>

                <a href="javascript:" class="btn btn-magic mr-2" onclick="addHistoriaClinicaPodologica()">
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                    Ingresar formulario podológico
                </a>

                <a href="javascript:" class="btn btn-magic" onclick="addCita()">
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                    Agregar cita sin reserva
                </a>
            </div>
        </div>

    </div>

    <div class="col-sm-6">

        <div class="card shadow">

            <div class="card-header">
                <i class="fa fa-file mr-1" aria-hidden="true"></i>
                Información del paciente
            </div>

            <div class="card-body">

                <div class="pb-2">
                    <a href="">
                        <img src="{{ asset('images/icons/ico-cita.png') }}" alt="" width="40">
                        Agendar cita
                    </a>
                </div>

                <div class="pb-2">
                    <a href="">
                        <img src="{{ asset('images/icons/ico-history.png') }}" alt="" width="40">
                        Historia clínica
                    </a>
                </div>

                <div>
                    <a href="">
                        <img src="{{ asset('images/icons/ico-forms.png') }}" alt="" width="40">
                        Formularios y documentos
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>



@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/pacientes/pacientes.js') }}" language="JavaScript"></script>
    <script>

    </script>

<script>

    var flagUrl = '{{ URL::asset('') }}';

    $(document).ready(function() {



    } );

    </script>
@stop
