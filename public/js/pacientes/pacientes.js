$(document).ready(function () {

    (function($){
        $("#email").inputmask("email");

        $('#fecha_nac').val(new Date());

        $('#fecha_nac').inputmask("datetime",{
            mask: "1-2-y",
            placeholder: "dd-mm-yyyy",
            leapday: "-02-29",
            separator: "-",
            alias: "dd-mm-yyyy"
        });


    })(jQuery)

    $('#frmNuevoPaciente').on('submit', function(ev){
        ev.preventDefault();
        ajaxStore(this);
    });

});

function nuevoPaciente()
{
    $('#mdlNuevoPaciente').modal('show');
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
        url: flagUrl+'admin/pacientes/store-process',
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
            $('#btnGuardarPaciente').prop("disabled", true);
        }
    })
    .done(function(result)
    {
        $("#icon_np_spinner").hide();
        $("#icon_np_check").show();
        $('#btnGuardarPaciente').prop("disabled", false);

        if (result.valid=='existe') {
            swal.fire("Paciente existente", "Se ha verificado que el paciente ya se encuentra registrado en el sistema.", "warning");
        }else {
            if(result.success){
                swal.fire({
                    title: 'Registrado',
                    text: 'La ficha se ha registrado satisfactoriamente.',
                    icon: 'success'
                });
            }
        }
        $("#frmNuevoPaciente")[0].reset();

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
