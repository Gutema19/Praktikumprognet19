let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let emailurl = urlParams.get('email');

function mailverif() {

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  $.ajax({
    type: "POST",
    url: "/verifmail",
    data: emailurl,
    dataType: "JSON",
    beforeSend: function (response) {
      isProcessing = true;
      let timerInterval
      Swal.fire({
        title: 'Info',
        text: 'Sending your new verification email',
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
    },
    error: function (response) {
      swalWithBootstrapButtons.fire({
        title: 'Error',
        text: response.responseJSON.message,
        icon: 'error',
        showCancelButton: true,
        showConfirmButton: false,
        cancelButtonText: 'Back',
      })
    }
  });
}

$(document).ready(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var mailv = "<b>" + emailurl + "</b>";
  $('.mail').append(mailv);

  $('.btn.btn-secondary.log').click(function (e) {
    e.preventDefault();
    mailverif();
  });
});