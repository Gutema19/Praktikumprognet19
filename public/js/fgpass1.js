
function valfpass() {

  var email = $('#exampleInputEmail1').val();
  var form_data = new FormData();
  form_data.append('email', email);



  $.ajax({
    type: "POST",
    url: "fpassmail",
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      $('.form-login').find('.invalid-feedback').text('');
    },
    success: function (response) {
      window.location.href = "verifyfpass?email=" + email + "";
      $('input[name=email]').removeClass('is-invalid');
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


      } else {
        $('input[name=email]').removeClass('is-invalid');
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
    valfpass();
  });
});