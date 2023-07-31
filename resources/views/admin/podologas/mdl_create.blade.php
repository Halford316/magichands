{{-- Modal - Nuevo --}}
<div class="modal fade" id="mdlNuevoPodologa" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmNuevoPodologa" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="mdl_np_ficha_id" id="mdl_np_ficha_id">

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Nueva Podóloga
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value="">-- Seleccione --</option>
                                    <option value="planilla">Planilla</option>
                                    <option value="destajo">Destajo</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" name="dni" id="dni" maxlength="10" class="form-control" placeholder="Nro. documento identidad" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="ape_paterno" id="ape_paterno" class="form-control" placeholder="Apellido paterno" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="ape_materno" id="ape_materno" class="form-control" placeholder="Apellido materno" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <input type="text" name="telefono_emergencia" id="telefono_emergencia" class="form-control" placeholder="Teléfono emergencia">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="contacto_emergencia" id="contacto_emergencia" class="form-control" placeholder="Contacto de emergencia">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" placeholder="Fecha de ingreso">
                            </div>

                            <div class="col-sm-2">
                                <input type="text" name="horario_inicio" id="horario_inicio" class="form-control" placeholder="Hora inicio">
                            </div>

                            <div class="col-sm-2">
                                <input type="text" name="horario_fin" id="horario_fin" class="form-control" placeholder="Hora fin">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="number" name="comision_medicamento" id="comision_medicamento" class="form-control" placeholder="% Comisión medicamento">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="comision_ortesicos" id="comision_ortesicos" class="form-control" placeholder="% Comisión ortésicos">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="comision_atencion" id="comision_atencion" class="form-control" placeholder="% Comisión atención">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer p-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times ml-2" aria-hidden="true"></i>
                    </button>

                    <button type="submit" class="btn btn-magic" id="btnGuardarPodologa">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
