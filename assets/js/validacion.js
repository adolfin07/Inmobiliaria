
$('#nick').change(function () {
    $.post('ajax_validacion_nick.php', {
        nick: $('#nick').val(),

        beforeSend: function () {
            $('.validacion').html("espera un momento, payaso");
        }
    }, function (respuesta) {
        $('.validacion').html(respuesta);

    });
});

$('btn_guardar').hide();
$('#pass2').change(function (event) {
    if ($('#pass1').val() == $('#pass2').val()) {
        swal('bien hecho payaso...', 'Las contraseñas coinciden', 'success');
        $('#btn_guardar').show();
    } else {
        swal('Oppss...', 'Las contraseñas no coinciden', 'error');
        $('#btn_guardar').hide();
    }
});

$('.form').keypress(function (e) {
    if (e.which == 13) {
        return false;
    }
});

