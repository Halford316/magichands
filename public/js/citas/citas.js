$(document).ready(function () {

    $('#frmNuevaCita').on('submit', function(ev){
        ev.preventDefault();
        ajaxStore(this);
    });

    /** Update  */
    $('#frmEditarCita').on('submit', function(ev){
        ev.preventDefault();
        ajaxUpdate(this);
    });

    (function($){

        //$('#start_date').val(new Date());

        $('#start_date').inputmask("datetime",{
            mask: "1-2-y h:s",
            placeholder: "dd-mm-yyyy hh:mm",
            leapday: "-02-29",
            separator: "-",
            alias: "dd/mm/yyyy"
        });

    })(jQuery)

});

function nuevoCita()
{
    $('#mdlNuevaCita').modal('show');
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
        url: flagUrl+'admin/citas/store-process',
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
            $('#btnGuardarCita').prop("disabled", true);
        }
    })
    .done(function(result)
    {
        $("#icon_np_spinner").hide();
        $("#icon_np_check").show();
        $('#btnGuardarCita').prop("disabled", false);

        if (result.valid == 'existe') {
            swal.fire("Cita existente", "Se ha verificado que la Cita con esos atributos ya se encuentra registrada en el sistema.", "error");
        }else {
            if (result.valid == 'stored') {
                swal.fire({
                    title: 'Registrado',
                    text: 'La ficha se ha registrado satisfactoriamente.',
                    icon: 'success'
                });
            }
        }
        $("#frmNuevaCita")[0].reset();
        $('#mdlNuevaCita').modal('hide');
        $('#tblCitas').DataTable().ajax.reload();

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

/** Mostrando y valindado paciente */
$('#dni').on('change', function(e) {

    $(this).empty();
    $(this).focus();
    var stateID = $(this).val();

    if(stateID) {
        $.ajax({
            type: "GET",
            url: flagUrl+'admin/citas/showPacientexDNI/'+stateID,
            contentType: "application/json; charset=UTF-8",
            dataType: "json",
            headers: {
                //'Authorization': 'Bearer 903b014a4acee2585aad6b99d1e062d8c74f65fa504dea73373211748cf5247b'
            },

            beforeSend: function() {
                $("#loader").removeClass('hidden');
            },

            error: function (request, status, error) {
                $('#mensaje_error').show();
                $('#mensaje_error').html("No se encontró registro con ese nro. de documento.");
                $('.ficha').trigger("reset");
            },

            success: function(data) {
                if (data != 0) {

                    $('#paciente').val(data[0].ape_paterno+' '+data[0].ape_materno+' '+data[0].nombres);
                    $('#paciente_id').val(data[0].id);
                    $('#mensaje_error').hide();

                }else {
                    $('#mensaje_error').html("No se encontró registro con ese nro. de documento.");
                    $('#paciente').val('');
                    $('#paciente_id').val('');
                    $('.ficha').trigger("reset");
                }
            },

            complete: function(data){
                $("#loader").addClass('hidden');
            }
        });

    }else {
        $('#mensaje_error').html("Debe ingresar el nro. de documento");
        $('.ficha').trigger("reset");
    }

});


/* Mostrando el modal para editar */
function editarCita(id) {

    $.ajax({
        url: flagUrl+'admin/citas/show/'+id,
        dataType : 'json',
        type: 'GET',
        cache: false,
        processData: true,

        beforeSend: function()
        {
            $('#btnActualizar').prop("disabled", true);
        }
    })

    .done(function(data)
    {
        $('#btnActualizar').prop("disabled", false);
        $('#ec_ficha_id').val(data.ficha.id);
        $('#ec_dni').val(data.ficha.paciente.dni);
        $('#ec_paciente').val(data.ficha.paciente.nombres+' '+data.ficha.paciente.ape_paterno+' '+data.ficha.paciente.ape_materno);
        $('#ec_start_date').val(data.ficha.start_date);
        $('#ec_tipo_servicio').val(data.ficha.tipo_servicio);
        $('#ec_motivo_consulta').val(data.ficha.motivo_consulta);
        $('#ec_tipo_cita').val(data.ficha.tipo_cita);
        $('#ec_cita_status').val(data.ficha.cita_status);

        if (data) {
            /*$('#ec_hora_id').empty();
            $('#ec_hora_id').append('<option value="">-- Seleccione --</option>');

            $.each(data.horarios, function(llave, valor) {
                var sel = (data.ficha.hora_id === valor.id) ? 'selected': '';
                $('select[name="ec_hora_id"]').append('<option value="'+ valor.id +'" '+ sel +'>' + valor.hora + '</option>');
            });*/

            $.each(data.consultorios, function(llave, valor) {
                var sel = (data.ficha.consultorio_id === valor.id) ? 'selected': '';
                $('select[name="ec_consultorio_id"]').append('<option value="'+ valor.id +'" '+ sel +'>' + valor.nombre + '</option>');
            });

            $.each(data.podologas, function(llave, valor) {
                var sel = (data.ficha.podologa_id === valor.id) ? 'selected': '';
                $('select[name="ec_podologa_id"]').append('<option value="'+ valor.id +'" '+ sel +'>' + valor.nombres+' '+valor.ape_paterno+' '+valor.ape_materno + '</option>');
            });

        }

    })

    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
        console.log(jqXHR.statusText);
    });

    $('#mdlEditarCita').modal('show');
}

/** Actualizando  */
function ajaxUpdate(form) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var dataString = new FormData( $('#frmEditarCita')[0] );

    $.ajax({
        url: flagUrl+'admin/citas/update-process',
        dataType : 'json',
        type: 'POST',
        data: dataString,
        cache: false,
        contentType: false,
        processData: false,

        beforeSend: function()
        {
            $("#icon_np_check").hide();
            $("#icon_np_spinner").show();
            $('#btnActualizarCita').prop("disabled", true);
        }
    })

    .done(function(data)
    {
        if(data.status === "updated-cita") {
            $("#icon_np_check").show();
            $("#icon_np_spinner").hide();
            $('#btnActualizarCita').prop("disabled", false);

            $('#mdlEditarCita').modal('hide');
            $('#tblCitas').DataTable().ajax.reload(null, false);

            toastr.success('La cita ha sido actualizada', 'Success');
            toastr.options.timeOut = 3000;
        }
    })

    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
        var errors = $.parseJSON(jqXHR.responseText);
        console.log(errors);

        var errorsHtml = '';
        $.each(errors['errors'], function (index, value) {
            errorsHtml += '<li>' + value + '</li>';
        });

        if(jqXHR.status === 401) {
            errorsHtml = '<li>Error en la autenticación.</li>';
        }

        if(jqXHR.status === 500) {
            errorsHtml = '<li>Hubo un error en el sistema.</li>';
        }

    });

}
