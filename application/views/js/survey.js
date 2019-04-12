$(function() {
    $('#birth_date').datepicker({
        yearRange: '-100:+0',
        maxDate: '0',
        changeYear: true,
        changeMonth: true
    });

    $('form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            favorite_color: {
                required: true,
                minlength: 3
            }
        },

        submitHandler: sendSurvey
    });

    function sendSurvey(form) {
        var formData = new FormData();
        $(form).serializeArray().forEach(function (input) {
            formData.append(input.name, input.value);
        });

        $.ajax({
            url: 'index.php/survey',
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function () {
                $('#btn-submit').prop('disabled', true);
            },

            success: function (data) {
                $('.info-block .success').show();
                $('form input').prop('disabled', true);
                $('form button').prop('disabled', true);
            },
            error: function (data) {
                var csrf = data.responseJSON.csrf;
                $('#csrf_params').val(csrf.csrf_hash);
                $('#csrf_params').attr('name', csrf.csrf_name);
                $('.info-block .error').show();
                $('#btn-submit').prop('disabled', false);
            }
        });
    }
});