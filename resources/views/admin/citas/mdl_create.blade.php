{{-- Modal - Nuevo --}}
<div class="modal fade" id="mdlNuevaCita" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmNuevaCita" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Nueva Cita
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                DNI
                                <input type="text" name="dni" id="dni" maxlength="10" class="form-control" placeholder="DNI" required>
                            </div>

                            <div class="col-sm-5">
                                Paciente
                                <input type="text" name="paciente" id="paciente" class="form-control" disabled>
                                <input type="hidden" name="paciente_id" id="paciente_id" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label for=""></label>
                                <div id="mensaje_error" class="text-danger">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>

                            <div class="col-sm-2">
                                <label for="hora_id">Hora</label>
                                <select name="hora_id" id="hora_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    @foreach ($horarios as $horario)
                                        <option value="{{ $horario->id }}">{{ $horario->hora }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="consultorio_id">Consultorio</label>
                                <select name="consultorio_id" id="consultorio_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-5">
                                <label for="podologa_id">Podólogo(a)</label>
                                <select name="podologa_id" id="podologa_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    @foreach ($podologas as $podologa)
                                        <option value="{{ $podologa->id }}">{{ $podologa->ape_paterno }} {{ $podologa->ape_materno }} {{ $podologa->nombres }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="tipo_servicio">Tipo de servicio</label>
                                <input type="text" name="tipo_servicio" id="tipo_servicio" class="form-control" placeholder="Indicar código de servicio" required>
                            </div>

                            <div class="col-sm-9">
                                <label for="motivo_consulta">Motivo de la consulta</label>
                                <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="tipo_cita">Tipo cita</label>
                                <select name="tipo_cita" id="tipo_cita" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="primera-cita">Primera cita</option>
                                    <option value="visita-control">Visita de control</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer p-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times ml-2" aria-hidden="true"></i>
                    </button>

                    <button type="submit" class="btn btn-magic" id="btnGuardarCita">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
