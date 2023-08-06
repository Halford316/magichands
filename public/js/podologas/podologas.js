$(document).ready(function () {

    (function($){
        $("#email").inputmask("email");

        $('input[id$="horario_inicio"]').inputmask(
            "hh:mm", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: 24
        });

        $('input[id$="horario_fin"]').inputmask(
            "hh:mm", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: 24
        });

    })(jQuery)

    $('#frmNuevoPodologa').on('submit', function(ev){
        ev.preventDefault();
        ajaxStore(this);
    });

});

function nuevoPodologa()
{
    $('#mdlNuevoPodologa').modal('show');
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
        url: flagUrl+'admin/podologas/store-process',
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
            $('#btnGuardarPodologa').prop("disabled", true);
        }
    })
    .done(function(result)
    {
        $("#icon_np_spinner").hide();
        $("#icon_np_check").show();
        $('#btnGuardarPodologa').prop("disabled", false);

        if (result.valid=='existe') {
            swal.fire("Podologa existente", "Se ha verificado que la podóloga ya se encuentra registrado en el sistema.", "warning");
        }else {
            if(result.success){
                swal.fire({
                    title: 'Registrado',
                    text: 'La ficha se ha registrado satisfactoriamente.',
                    icon: 'success'
                });
            }
        }
        $("#frmNuevoPodologa")[0].reset();
        $('#mdlNuevoPodologa').modal('hide');
        $('#tblPodologas').DataTable().ajax.reload();

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
