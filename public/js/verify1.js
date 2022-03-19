let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let emailurl = urlParams.get('email');

function valfpass() {

  var form_data = new FormData();
  form_data.append('email', emailurl);

  $.ajax({
    type: "POST",
    url: "{{ route('verification.resend') }}",
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {

    },
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

  $('.btn.btn-secondary.log.v2').click(function (e) {
    e.preventDefault();
    valfpass();
  });
});