$(document).ready(function() {
  // map_survei();
  get_geoJson();
});

function get_geoJson() {
  $.getJSON(window.location.href.replace("detail", "geojson"))
    .done(function(data) {
      map_survei(data);
    })
}

function map_survei(geojson) {
  mapboxgl.accessToken = 'pk.eyJ1IjoiamFzb25sb2FyZHkiLCJhIjoiY2ticHkwYTJzMGQyMTJva2F1ZzFubDc2cyJ9.hVSZAbuxC_SDI7sCl2tkyA';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [119.423790, 	-5.135399],
    zoom: 12
  });

  // add markers to map
  geojson.features.forEach(function(marker) {

    // console.log(marker);

    // create a HTML element for each feature
    var el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el)
      .setLngLat(marker.geometry.coordinates)
      // .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      //   .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
      .addTo(map);

    el.addEventListener('click', function() {

      let description = '';

      $.each( marker.properties.description, function( i, val ) {

        description += '<b>' + val.nama_pertanyaan + '</b><br>' + val.opsi + '<br>';

      })

      $('#bodyModal').html(description);
      $('#detailSurveiModal').modal('show');
      // console.log(description);
    });
  });
}
