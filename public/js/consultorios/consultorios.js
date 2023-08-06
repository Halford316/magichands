$(document).ready(function () {

    $('#frmNuevoConsultorio').on('submit', function(ev){
        ev.preventDefault();
        ajaxStore(this);
    });

});

function nuevoConsultorio()
{
    $('#mdlNuevoConsultorio').modal('show');
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
        url: flagUrl+'admin/consultorios/store-process',
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
            $('#btnGuardarConsultorio').prop("disabled", true);
        }
    })
    .done(function(result)
    {
        $("#icon_np_spinner").hide();
        $("#icon_np_check").show();
        $('#btnGuardarConsultorio').prop("disabled", false);

        if (result.valid=='existe') {
            swal.fire("Consultorio existente", "Se ha verificado que el nombre del consultorio ya se encuentra registrado en el sistema.", "warning");
        }else {
            if(result.success){
                swal.fire({
                    title: 'Registrado',
                    text: 'El consultorio se ha registrado satisfactoriamente.',
                    icon: 'success'
                });
            }
        }
        $("#frmNuevoConsultorio")[0].reset();
        $('#mdlNuevoConsultorio').modal('hide');
        $('#tblConsultorios').DataTable().ajax.reload();

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
