function showpass1() {
    var pass = document.getElementById('exampleInputPassword1');
    var pass2 = document.getElementById('exampleInputPassword2');
    if (pass.type === "password") {
        pass.setAttribute('type', 'text');
    } else {
        pass.setAttribute('type', 'password');
    }
}

function logdata() {

    var se = $('#exampleInputEmail1').val();
    var pass = $('#exampleInputPassword1').val();
    var form_data = new FormData();
    form_data.append('email', se);
    form_data.append('password', pass);

    $.ajax({
        type: "POST",
        url: "/logindt",
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        //dataType: "JSON",
        success: function (response) {
            //alert(response.responseJSON.message);
            window.location.href = "/home";
        },
        error: function (response) {

            if (response.status == 422) {
                $.each(response.responseJSON.errors, function (key, value) {
                    $('input[name=' + key + ']').addClass('is-invalid');
                    $('.invalid-feedback.' + key).html(value[0]);
                });
                if (response.responseJSON.errors.email == null) {
                    $('input[name=email]').removeClass('is-invalid');
                    $('.invalid-feedback.' + key).html(value[0]);
                }

                if (response.responseJSON.errors.password == null) {
                    $('input[name=password]').removeClass('is-invalid');
                    $('.invalid-feedback.' + key).html(value[0]);
                }

            } else {
                $('#exampleInputEmail1').val('');
                $('#exampleInputPassword1').val('');
                alert(response.responseJSON.message);
            }
        }
    });
}

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.form-login').submit(function (e) {
        e.preventDefault();
        logdata();
    });

    $('.btn.btn-secondary.reg').click(function (e) {
        e.preventDefault();
        window.location.href = "regview";

    });

    $('.btn.btn-secondary.regadmin').click(function (e) {
        e.preventDefault();
        window.location.href = "adminregview";

    });
});