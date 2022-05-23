function showpass1() {
  var pass = document.getElementById('exampleInputPassword1');
  if (pass.type === "password") {
    pass.setAttribute('type', 'text');
  } else {
    pass.setAttribute('type', 'password');
  }
}

function logdata() {

  var username = $('#exampleInputUsername1').val();
  var pass = $('#exampleInputPassword1').val();
  var form_data = new FormData();
  form_data.append('username', username);
  form_data.append('password', pass);

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  $.ajax({
    type: "POST",
    url: "/admin/adminlogindt",
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
        timer: 10000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 10000)
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
        //confirmButtonText: 'Next',
      })
      isProcessing = false;
      window.location.href = "/admin/homeadmin";
    },
    error: function (response) {

      if (response.status == 422) {
        $.each(response.responseJSON.errors, function (key, value) {
          $('input[name=' + key + ']').addClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);

          if (response.responseJSON.errors.username == null) {
            $('input[name=email]').removeClass('is-invalid');
            $('.invalid-feedback.' + key).html(value[0]);
          }

          if (response.responseJSON.errors.password == null) {
            $('input[name=password]').removeClass('is-invalid');
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
        $('#exampleInputUsername1').val('');
        $('#exampleInputPassword1').val('');
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


  $('.btn.btn-secondary.regadmin').click(function (e) {
    e.preventDefault();
    window.location.href = "/admin/adminregview";

  });
});