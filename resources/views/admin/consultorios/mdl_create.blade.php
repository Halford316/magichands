{{-- Modal - Nuevo --}}
<div class="modal fade" id="mdlNuevoConsultorio" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmNuevoConsultorio" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Nuevo Consultorio
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="local_id">Local</label>
                                <select name="local_id" id="local_id" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    @foreach ($locales as $local)
                                        <option value="{{ $local->id }}">{{ $local->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nombre">Nombre del consultorio</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresar nombre" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer p-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times ml-2" aria-hidden="true"></i>
                    </button>

                    <button type="submit" class="btn btn-magic" id="btnGuardarConsultorio">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
