let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let nameurl = urlParams.get('name');
let emailurl = urlParams.get('email');

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

function validateadmin() {

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  var name = $('#exampleInputName1').val();
  var username = $('#exampleInputUsername1').val();
  var phone = $('#exampleInputPhone1').val();
  var password = $('#exampleInputPassword1').val();
  var confirm_password = $('#exampleInputPassword2').val();
  var form_data = new FormData();
  form_data.append('name', name);
  form_data.append('username', username);
  form_data.append('phone', phone);
  form_data.append('password', password);
  form_data.append('confirm_password', confirm_password);


  $.ajax({
    type: "POST",
    url: "/admin/regdtpt2",
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function (response) {
      isProcessing = true;
      let timerInterval
      Swal.fire({
        title: 'Info',
        text: 'Your data is being processed',
        icon: 'info',
        timer: 5000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 5000)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      })
    },
    success: function (response) {
      swalWithBootstrapButtons.fire({
        title: 'Yeay',
        text: 'Data Validation Successful',
        icon: 'success',
        showConfirmButton: false,
      })
      isProcessing = false;
      window.location.href = "/admin";
      $('input[name=password]').removeClass('is-invalid');
      $('input[name=confirm_password]').removeClass('is-invalid');
      $('input[name=name]').removeClass('is-invalid');
      $('input[name=email]').removeClass('is-invalid');
    },
    error: function (response) {

      if (response.status == 422) {
        $.each(response.responseJSON.errors, function (key, value) {
          $('input[name=' + key + ']').addClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);

          if (response.responseJSON.errors.name == null) {
            $('input[name=name]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }

          if (response.responseJSON.errors.email == null) {
            $('input[name=email]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }

          if (response.responseJSON.errors.phone == null) {
            $('input[name=phone]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }

          if (response.responseJSON.errors.password == null) {
            $('input[name=password]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }

          if (response.responseJSON.errors.confirm_password == null) {
            $('input[name=confirm_password]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }
        });


      } else {
        swalWithBootstrapButtons.fire({
          title: 'Error',
          text: response.responseJSON.message,
          icon: 'error',
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonText: 'Back',
        })
        $('input[name=password]').removeClass('is-invalid');
        $('input[name=confirm_password]').removeClass('is-invalid');
        $('input[name=phone]').removeClass('is-invalid');
        $('input[name=name]').removeClass('is-invalid');
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

  $('.form-login.admin').submit(function (e) {
    e.preventDefault();
    validateadmin();
  });

});