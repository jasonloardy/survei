$(document).ready(function() {
  if ($("#geo").val() != 'non') {
    $("#geo").val('');
    getLocation();
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
  let geolocation = position.coords.latitude + ', ' + position.coords.longitude;
  $("#geo").val(geolocation);
}
