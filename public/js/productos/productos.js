$(document).ready(function () {

    $('#frmNuevoProducto').on('submit', function(ev){
        ev.preventDefault();
        ajaxStore(this);
    });

});

function nuevoProducto()
{
    $('#mdlNuevoProducto').modal('show');
}

/* Guardando */
function ajaxStore(form) {

    var dataString = new FormData(form);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: flagUrl+'admin/productos/store-process',
        datatType : 'json',
        type: 'POST',
        data: dataString,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function()
        {
            $("#icon_np_check").hide();
            $("#icon_np_spinner").show();
            $('#btnGuardarProducto').prop("disabled", true);
        }
    })
    .done(function(result)
    {
        $("#icon_np_spinner").hide();
        $("#icon_np_check").show();
        $('#btnGuardarProducto').prop("disabled", false);

        if (result.valid=='existe') {
            swal.fire("Producto existente", "Se ha verificado que el código del producto ya se encuentra registrado en el sistema.", "warning");
        }else {
            if(result.success){
                swal.fire({
                    title: 'Registrado',
                    text: 'El producto se ha registrado satisfactoriamente.',
                    icon: 'success'
                });
            }
        }
        $("#frmNuevoProducto")[0].reset();
        $('#mdlNuevoProducto').modal('hide');
        $('#tblProductos').DataTable().ajax.reload();

    })
    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
        var errors = $.parseJSON(jqXHR.responseText);
        console.log(errors);

        var errorsHtml = '';
        $.each(errors['errors'], function (index, value) {
            errorsHtml += '- ' + value;
        });

        if(jqXHR.status === 401) {
            errorsHtml = 'Error en la autenticación.';
        }

        if(jqXHR.status === 500) {
            errorsHtml = 'Hubo un error en el sistema.';
        }

        swal("Error en el registro", errorsHtml, "warning");

    });

}
