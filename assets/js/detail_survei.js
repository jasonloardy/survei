$(document).ready(function() {
  map_survei();
});

function map_survei() {
  mapboxgl.accessToken = 'pk.eyJ1IjoiamFzb25sb2FyZHkiLCJhIjoiY2ticHkwYTJzMGQyMTJva2F1ZzFubDc2cyJ9.hVSZAbuxC_SDI7sCl2tkyA';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [119.423790, 	-5.135399],
    zoom: 12
  });


  var geojson = {
    type: 'FeatureCollection',
    features: [{
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: ["119.48851199999999", "-5.1347456000000005"]
      },
      properties: {
        title: 'Mapbox',
        description: 'Washington, D.C.<br>line2'
      }
    },
    {
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [-122.414, 37.776]
      },
      properties: {
        title: 'Mapbox',
        description: 'San Francisco, California'
      }
    }]
  };

  // add markers to map
  geojson.features.forEach(function(marker) {

    // create a HTML element for each feature
    var el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el)
      .setLngLat(marker.geometry.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
        .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
      .addTo(map);
  });
}
