
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

function adminvalfpass() {

  var username = $('#exampleInputUsername1').val();
  var form_data = new FormData();
  form_data.append('username', username);

  $.ajax({
    type: "POST",
    url: "fpassadmin",
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      $('.form-login.admin').find('.invalid-feedback').text('');
    },
    success: function (response) {
      window.location.href = "/admin";
      $('input[name=username]').removeClass('is-invalid');
    },
    error: function (response) {

      if (response.status == 422) {
        $.each(response.responseJSON.errors, function (key, value) {
          $('input[name=' + key + ']').addClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);

        });

        if (response.responseJSON.errors.username == null) {
          $('input[name=userame]').removeClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);
        }


      } else {
        $('input[name=usernamel]').removeClass('is-invalid');
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

  $('.form-login.admin').submit(function (e) {
    e.preventDefault();
    adminvalfpass();
  });
});