
function valfpass() {

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })


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
      window.location.href = "verifyfpass?email=" + email + "";
      $('input[name=email]').removeClass('is-invalid');
    },
    error: function (response) {

      if (response.status == 422) {
        $.each(response.responseJSON.errors, function (key, value) {
          $('input[name=' + key + ']').addClass('is-invalid');
          $('.invalid-feedback.' + key).html(value[0]);

          if (response.responseJSON.errors.email == null) {
            $('input[name=email]').removeClass('is-invalid');
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