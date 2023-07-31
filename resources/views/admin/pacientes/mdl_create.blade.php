{{-- Modal - Nuevo --}}
<div class="modal fade" id="mdlNuevoPaciente" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmNuevoPaciente" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="mdl_np_ficha_id" id="mdl_np_ficha_id">

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Nuevo paciente
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" name="nro_historia" id="nro_historia" class="form-control" placeholder="Nro. historia clínica" required>
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
                            <div class="col-sm-4">
                                <input type="text" name="fecha_nac" id="fecha_nac" class="form-control" placeholder="Fecha nacimiento" required>
                            </div>
                            <div class="col-sm-4">
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                    <option value="">-- Estado civil --</option>
                                    @foreach ($estado_civil as $llave=>$valor)
                                    <option value="{{ $llave }}">{{ $valor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="talla" id="talla" class="form-control" placeholder="Talla">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="peso" id="peso" class="form-control" placeholder="Peso (Kg)">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="presion_arterial" id="presion_arterial" class="form-control" placeholder="Presión arterial">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="ocupacion" id="ocupacion" class="form-control" placeholder="Ocupación">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer p-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times ml-2" aria-hidden="true"></i>
                    </button>

                    <button type="submit" class="btn btn-magic" id="btnGuardarPaciente">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
