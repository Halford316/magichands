{{-- Modal - Editar --}}
<div class="modal fade" id="mdlEditarCita" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmEditarCita" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="ec_ficha_id" id="ec_ficha_id">

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Editar Cita
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
                                <input type="text" name="ec_dni" id="ec_dni" maxlength="10" class="form-control" placeholder="DNI" disabled required>
                            </div>

                            <div class="col-sm-5">
                                Paciente
                                <input type="text" name="ec_paciente" id="ec_paciente" class="form-control" disabled>
                                <input type="hidden" name="ec_paciente_id" id="ec_paciente_id" class="form-control">
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
                                <label for="ec_fecha">Fecha</label>
                                <input type="date" name="ec_fecha" id="ec_fecha" class="form-control" required>
                            </div>

                            <div class="col-sm-2">
                                <label for="ec_hora_id">Hora</label>
                                <select name="ec_hora_id" id="ec_hora_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="ec_consultorio_id">Consultorio</label>
                                <select name="ec_consultorio_id" id="ec_consultorio_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                </select>
                            </div>

                            <div class="col-sm-5">
                                <label for="ec_podologa_id">Podólogo(a)</label>
                                <select name="ec_podologa_id" id="ec_podologa_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="ec_tipo_servicio">Tipo de servicio</label>
                                <input type="text" name="ec_tipo_servicio" id="ec_tipo_servicio" class="form-control" placeholder="Indicar código de servicio" required>
                            </div>

                            <div class="col-sm-9">
                                <label for="ec__motivo_consulta">Motivo de la consulta</label>
                                <input type="text" name="ec_motivo_consulta" id="ec_motivo_consulta" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="ec_tipo_cita">Tipo cita</label>
                                <select name="ec_tipo_cita" id="ec_tipo_cita" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="primera-cita">Primera cita</option>
                                    <option value="visita-control">Visita de control</option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label for="ec_cita_status">Status cita</label>
                                <select name="ec_cita_status" id="ec_cita_status" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="iniciada">Iniciada</option>
                                    <option value="concluida">Concluída</option>
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

                    <button type="submit" class="btn btn-magic" id="btnActualizar">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
