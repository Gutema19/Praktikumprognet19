let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let emailurl = urlParams.get('email');

function mailverif() {
  $.ajax({
    type: "POST",
    url: "/verifmail",
    data: emailurl,
    dataType: "JSON",
    success: function (response) {
      //alert('yeay');
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