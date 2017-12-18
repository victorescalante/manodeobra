
/** Google Maps **/

function map_create() { // Create and edit land view
  //console.log("creando");
  var map;
  var marker_land;
  var geocoder = new google.maps.Geocoder();
  var default_lat_lng = { lat: 19.432508, lng: -99.133907 };
  var default_zoom = 5;

  // --- Edit view

  var default_lat = $("*[name='latitude_enterprice']").val();
  var default_lng = $("*[name='longitude_enterprice']").val();

  if(default_lat != "" && default_lng != ""){
    default_lat_lng = { lat: parseFloat(default_lat), lng: parseFloat(default_lng) };
    default_zoom = 16;
  }

  // ---


  function init_map(){

    map = new google.maps.Map(document.getElementById('map'), {
      center: default_lat_lng,
      scrollwheel: false,
      zoom: default_zoom,
      disableDefaultUI: true,
      styles: [
                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 33
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f7f7f7"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#deecdb"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "saturation": "-90"
                        },
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#e0f1f9"
                        }
                    ]
                }
            ]
    });



     marker_land = new google.maps.Marker({
      map: map,
      position: default_lat_lng,
      draggable: true,
      title: 'Empresa'
    });

    google.maps.event.addListener(marker_land, 'dragend', function(event) {
      get_lat = this.getPosition().lat();
      get_lng = this.getPosition().lng();
      get_zoom = map.getZoom();
      marker_position = { lat: get_lat, lng: get_lng };
      set_marker(marker_position, get_zoom, false);
    });

    google.maps.event.addDomListener(window, "resize", function() {
      get_lat = marker_land.getPosition().lat();
      get_lng = marker_land.getPosition().lng();
      marker_position = { lat: get_lat, lng: get_lng };
      map.setCenter(marker_position);
    });

    google.maps.event.addListener(map,'click',function(event) {
      get_lat = event.latLng.lat();
      get_lng = event.latLng.lng();
      get_zoom = map.getZoom();
      marker_position = { lat: get_lat, lng: get_lng };
      set_marker(marker_position, get_zoom, false);
    });

  }

  function set_marker(marker_position, zoom, center){
    marker_land.setPosition(marker_position);
    marker_land.setAnimation(google.maps.Animation.DROP);
    map.setZoom(zoom);

    if(center){
      map.setCenter(marker_position);
    }

    // form ---
    $("input[name='latitude_enterprice']").val(marker_position['lat']);
    $("input[name='longitude_enterprice']").val(marker_position['lng']);
  }

  function get_lat_lng(address) {
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        get_lat = (results[0].geometry.location.lat());
        get_lng = (results[0].geometry.location.lng());
        marker_position = { lat: get_lat, lng: get_lng };
        set_marker(marker_position, 16, true);
      } else {
        $('.errors_map').show();
        setTimeout(function() {
            $(".errors_map").fadeOut(1500);
        },3000);
      }
    });
  }

  function search_address(){
    address = $("input[name='address_enterprice']").val();
    get_lat_lng(address);
  }

  function actions(){

    $('.map-zoom-plus').on('click', function(event){
      event.preventDefault();
      get_zoom = map.getZoom();
      map.setZoom(get_zoom + 1);
    });

    $('.map-zoom-minus').on('click', function(event){
      event.preventDefault();
      get_zoom = map.getZoom();
      map.setZoom(get_zoom - 1);
    });

    $('.map-reload').on('click', function(event){
      event.preventDefault();
      map.setZoom(default_zoom);
      map.setCenter(default_lat_lng);
    });

    $('.map-road').on('click', function(event){
      event.preventDefault();
      map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
    });

    $('.map-terrain').on('click', function(event){
      event.preventDefault();
      map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
    });

  }

  // --- Initialize

  init_map();
  actions();

  // ---

  // --- Events

  $(".manual-submit").on('keypress', function(event) {
    console.log("Estoy en el manual");
    var keyCode = event.keyCode || event.which;
    if (keyCode === 13) {
      event.preventDefault();
      search_address();
    }
  });

  $('.search-address').on('click', function(event){
    event.preventDefault();
    search_address();
  });


}

function generate_map(enterprices) { // Create and edit land view
  enterprices = JSON.parse(enterprices.replace(/&quot;/g,'"'));
  //console.log("creando");
  var map;
  var marker_land;
  var geocoder = new google.maps.Geocoder();
  var default_lat_lng = { lat: 19.432508, lng: -99.133907 };
  var default_zoom = 5;

  // --- Edit view

  // var default_lat = $("*[name='latitude_enterprice']").val();
  // var default_lng = $("*[name='longitude_enterprice']").val();
  //
  // if(default_lat != "" && default_lng != ""){
  //   default_lat_lng = { lat: parseFloat(default_lat), lng: parseFloat(default_lng) };
  //   default_zoom = 16;
  // }

  // ---


  function init_map_g(){

    map = new google.maps.Map(document.getElementById('map_with_markes'), {
      center: default_lat_lng,
      scrollwheel: false,
      zoom: default_zoom,
      styles: [
                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 33
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f7f7f7"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#deecdb"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "saturation": "-90"
                        },
                        {
                            "lightness": "25"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#e0f1f9"
                        }
                    ]
                }
            ]
    });

    var bounds = new google.maps.LatLngBounds();

    $.each(enterprices, function(index,item){

      marker_land = new google.maps.Marker({
       map: map,
       position: {lat: parseFloat(item.latitude), lng: parseFloat(item.longitude)},
       draggable: true,
       title: item.name
     });

    var infoWindow = new google.maps.InfoWindow({
        content: item.name
    });

    marker_land.addListener('click', function () {
        infoWindow.open(map, this );
    });

    bounds.extend(marker_land.getPosition());
    map.fitBounds(bounds);

    });



    google.maps.event.addListener(map,'click',function(event) {
      get_lat = event.latLng.lat();
      get_lng = event.latLng.lng();
      get_zoom = map.getZoom();
      marker_position = { lat: get_lat, lng: get_lng };
      set_marker(marker_position, get_zoom, false);
    });

  }




  // --- Initialize

  init_map_g();


}
