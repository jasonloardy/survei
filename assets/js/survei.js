$(document).ready(function() {
  if ($("#geo").length) {
    $("#geo").val('');
    getLocation();
  }
});

function rules() {
  let index = 0;
  let rulesText = '{ ';
  $("div[id=pertanyaan]").each(function() {
    rulesText += '\'param[jawaban]['+index+'][text]\': { required: true }, ';
    rulesText += '\'param[jawaban]['+index+'][opsi][]\': { required: true }, ';
    index++;
  });
  rulesText += '}';
  return eval("("+rulesText+")");
}

$('#surveiForm').validate({
  rules: rules(),
  errorPlacement: function (error, element) {
    console.log(element[0].classList[0]);
    if (element[0].classList[0] == 'form-control') {
      error.insertAfter(element.parent());
    } else if (element[0].classList[0] == 'form-check-input') {
      error.insertAfter(element.parent().parent());
    }
  },
  submitHandler: function (form) {
    return true;
  }
});

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  let geolocation = position.coords.longitude + ', ' + position.coords.latitude;
  $("#geo").val(geolocation);
}
