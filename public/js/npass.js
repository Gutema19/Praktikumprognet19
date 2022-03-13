let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let email = urlParams.get('email');
var link = document.URL;
//var token = link.substring(link.lastIndexOf('/') + 1);

function showpass1() {
  var pass = document.getElementById('exampleInputPassword1');
  var pass2 = document.getElementById('exampleInputPassword2');
  if (pass.type === "password" && pass2.type === "password") {
    pass.setAttribute('type', 'text');
    pass2.setAttribute('type', 'text');
  } else {
    pass.setAttribute('type', 'password');
    pass2.setAttribute('type', 'password');
  }
}

function validate() {

  var password = $('#exampleInputPassword1').val();
  var confirm_password = $('#exampleInputPassword2').val();
  var token = $('.token').val();
  var form_data = new FormData();
  form_data.append('token', token);
  form_data.append('password', password);
  form_data.append('confirm_password', confirm_password);
  form_data.append('email', email);


  $.ajax({
    type: "POST",
    url: "/newpass",
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      $('.form-login').find('.invalid-feedback').text('');
    },
    success: function (response) {
      window.location.href = "/";
      $('input[name=password]').removeClass('is-invalid');
      $('input[name=confirm_password]').removeClass('is-invalid');
    },
    error: function (response) {

      if (response.status == 422) {
        $.each(response.responseJSON.errors, function (key, value) {
          $('input[name=' + key + ']').addClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);

        });

        if (response.responseJSON.errors.password == null) {
          $('input[name=password]').removeClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);
        }

        if (response.responseJSON.errors.confirm_password == null) {
          $('input[name=confirm_password]').removeClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);
        }

      } else {
        $('input[name=password]').removeClass('is-invalid');
        $('input[name=confirm_password]').removeClass('is-invalid');
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
    validate();
  });
});