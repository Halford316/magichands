{{-- Modal - Nuevo --}}
<div class="modal fade" id="mdlNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <form action="" method="POST" id="frmNuevoProducto" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="mdl_np_ficha_id" id="mdl_np_ficha_id">

                <div class="modal-header" >
                    <h6 class="modal-title">
                        <i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                        Nuevo Producto
                    </h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-4">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">-- Seleccione --</option>
                                    <option value="medicamento">Medicamento</option>
                                    <option value="ortesico">Ortésico</option>
                                    <option value="insumo">Insumo</option>
                                    <option value="articulo">Artículo</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="codigo">Código de producto</label>
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" maxlength="255" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="costo">Costo S/</label>
                                <input type="text" name="costo" id="costo" class="form-control" placeholder="" required>
                            </div>

                            <div class="col-sm-4">
                                <label for="precio_venta">Precio de venta S/</label>
                                <input type="text" name="precio_venta" id="precio_venta" class="form-control" placeholder="" required>
                            </div>

                            <div class="col-sm-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer p-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                        <i class="fa fa-times ml-2" aria-hidden="true"></i>
                    </button>

                    <button type="submit" class="btn btn-magic" id="btnGuardarProducto">
                        Guardar
                        <i class="fa fa-check-circle ml-1" id="icon_np_check"></i>
                        <i class="fa fa-spinner fa-spin ml-1" id="icon_np_spinner" style="display: none"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
