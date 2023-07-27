<!DOCTYPE html>
<html>

<head>
    <title>LACAK BIPOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    
    <!-- Favicons -->
    <link href="images/logo.png" rel="icon">

    <link href="assets/css/user.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <div id="pesan">
        <div class="inner">
            <a href="{{ route('user') }}"> <img src="{{ asset('images/logo.png') }}" alt="Logo bipol" class="logo"></a>
            <hr>
         
            <h4 id="title">Periksa Jarak Bis Dari Lokasimu :</h4> 
            
            <div class="mt-20">
                <!-- Sidebar -->
                    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
                        <div class="position-sticky">
                            <div class="list-group list-group-flush mt-4">
                                <div id="detail" class="mt-4 card-custom" style="none;">
                                    <table>
                                        <tr>
                                            <th>Jarak</th>
                                            <th>:</th>
                                            <td id="distance"></td>
                                        </tr>
                                        <tr>
                                            <th>Durasi</th>
                                            <th>:</th>
                                            <td id="duration"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="mt-3">  
                                    {{-- <button onclick="myLocation()" class="list-group-item list-group-item-action py-2 ripple rounded "> 
                                      Lihat Jarak
                                    </button> --}}
                                    <button onclick="myLocation()" class="list-group-item list-group-item-action py-2 ripple rounded text-center">
                                        <img src="{{ asset('images/myloc.png') }}" alt="My Icon" class="myloc"> <!-- Ikon lokal -->
                                        Lihat Jarak
                                      </button>
                                    <div id="errorMessage" class="text-danger" style="display:none;">
                                        <p>Data Sedang Diproses Harap Menunggu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                <!-- Sidebar -->
            </div>    
        </div>
    </div>

    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBayHgz7p5Mmk0mjHNc4sg6obkiYsNBgRw&libraries=places"></script>
    <script >
var map;
let iWindow;
var channelID = '2223163';
var readAPIKey = 'KNSUCSYC9IAYXZVM';
var lineCoordinatesPath;
var marker;
var bipolLoc;


function fetchLatestData() {
    var url = 'https://api.thingspeak.com/channels/' + channelID + '/feeds.json?api_key=' + readAPIKey + '&results=1&order=desc';

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.feeds.length > 0) {
                var latitude = parseFloat(data.feeds[0].field1);
                var longitude = parseFloat(data.feeds[0].field2);
                bipolLoc = {
                    lat: latitude,
                    lng: longitude,
                }
                updateMap(latitude, longitude);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

map = new google.maps.Map(document.getElementById('map'), {
    zoom: 20,
    center: { lat: 0, lng: 0 }

});

iWindow = new google.maps.InfoWindow();

 //MARKER Lap PNJ
 var marker1 = new google.maps.Marker({
        position: {lat:-6.371352, lng:106.823994},
        map: map
    });

    var tooltipContent1 = 'LAPANGAN PNJ' + '<br>Latitude: ' + '-6.371352' + '<br>Longitude: ' + '106.823994'+
                                 '<br><a href="javascript:void(0);" onclick="openInGoogleMaps(' + '-6.371352' + ',' + '106.823994' + ');">Buka di Google Maps</a>';

    var infoWindow1 = new google.maps.InfoWindow({
        content: tooltipContent1
    });

          // Menampilkan InfoWindow saat penanda di-klik
    marker1.addListener('click', function() {
        infoWindow1.open(map, marker1);
    });


//MARKER HALTE FTUI
    var marker2= new google.maps.Marker({
        position: {lat:-6.36110626390264, lng:106.82317342339343},
        map: map
    });

    var tooltipContent2 = 'HALTE FT UI' + '<br>Latitude: ' + '-6.36110626390264' + '<br>Longitude: ' + '106.823136'+
                                 '<br><a href="javascript:void(1);" onclick="openInGoogleMaps(' + '-6.36110626390264' + ',' + '106.823136' + ');">Buka di Google Maps</a>';

    var infoWindow2 = new google.maps.InfoWindow({
        content: tooltipContent2
    });

        // Menampilkan InfoWindow saat penanda di-klik
    marker2.addListener('click', function() {
        infoWindow2.open(map, marker2);
    });
    
//MARKER HALTE FMIPA
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
//MARKER HALTE VOKASI
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE VOKASI' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
//MARKER HALTE PNJ
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE PNJ' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
//MARKER HALTE FIK
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FIK' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
//MARKER HALTE FKM
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE RIK
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE POCIN
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE FH
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER BUNDARAN UI
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE ST UI
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE STASIUN UI' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE FKM
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE GERBATAMA UI
    var marker3= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
function myLocation() {
    var detailContent = document.getElementById("detail");
    if (navigator.geolocation) {
        if (bipolLoc) {
            document.getElementById("errorMessage").style.display = "none";
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                // const pos = {
                //   lat: -6.371366,
                //   lng: 106.824439,
                // };
      
                iWindow.setPosition(pos);
                iWindow.setContent("Location found.");
                iWindow.open(map);
          
              showRouteOnMap(pos.lat, pos.lng, bipolLoc.lat, bipolLoc.lng);
              calculateDistanceAndDuration(pos.lat, pos.lng, bipolLoc.lat, bipolLoc.lng);
      
              detailContent.style.display = "block";
      
              },
              () => {
                handleLocationError(true, iWindow, map.getCenter());
              },
            );
        } else {
            document.getElementById("errorMessage").style.display = "block";
        }
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, iWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation.",
  );
  infoWindow.open(map);
}

function updateMap(latitude, longitude) {
    if (marker) {
        marker.setMap(null);
    }

    if (lineCoordinatesPath) {
                lineCoordinatesPath.setMap(null);
            }
    //MARKER BIS
    var markerPosition = { lat: latitude, lng: longitude };

    marker = new google.maps.Marker({
        position: markerPosition,
        map: map,
        icon: {
        url: '{{ asset('images/bus.png') }}',
        scaledSize: new google.maps.Size(50, 50) // class CSS .icon-marker
  }
    });

    lineCoordinatesPath = new google.maps.Polyline({
                path: lineCoordinatesPath ? [...lineCoordinatesPath.getPath().getArray(), new google.maps.LatLng(latitude, longitude)] : [new google.maps.LatLng(latitude, longitude)],
                geodesic: true,
                strokeColor: "#2E10FF",
                map: map
            });
    // map.panTo(markerPosition);
    var tooltipContent = '<b>BIS POLITEKNIK</b>' + '<br>Latitude: ' + latitude + '<br>Longitude: ' + longitude +
                                 '<br><a href="javascript:void(0);" onclick="openInGoogleMaps(' + latitude + ',' + longitude + ');">Buka di Google Maps</a>';

    var infoWindow = new google.maps.InfoWindow({
        content: tooltipContent
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
    
   
    map.panTo(markerPosition);
  
}

function openInGoogleMaps(latitude, longitude) {
            var url = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude;
            window.open(url, "_blank");
}

// Fungsi untuk menghitung jarak dan durasi tempuh menggunakan Google Maps Distance Matrix API
function calculateDistanceAndDuration(startLat, startLon, endLat, endLon) {
  const service = new google.maps.DistanceMatrixService();

  // Koordinat awal (lokasi pengguna)
  const start = new google.maps.LatLng(startLat, startLon);

  // Koordinat akhir (lokasi bus)
  const end = new google.maps.LatLng(endLat, endLon);

  const request = {
    origins: [start],
    destinations: [end],
    travelMode: google.maps.TravelMode.DRIVING // Anda dapat mengganti dengan WALKING, BICYCLING, atau TRANSIT
  };

  service.getDistanceMatrix(request, function(response, status) {
    if (status === google.maps.DistanceMatrixStatus.OK) {
      const distance = response.rows[0].elements[0].distance.text;
      const duration = response.rows[0].elements[0].duration.text;

      // Menampilkan hasil jarak dan durasi tempuh
      const distanceResultElement = document.getElementById("distance");
      const durationResultElement = document.getElementById("duration");
      distanceResultElement.innerHTML = distance;
      durationResultElement.innerHTML = duration;
    } else {
      alert("Gagal menghitung jarak dan durasi tempuh. Coba lagi nanti.");
    }
  });
}

// Fungsi untuk menampilkan rute pada peta antara dua titik koordinat
function showRouteOnMap(startLat, startLon, endLat, endLon) {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();

  // Koordinat awal (lokasi pengguna)
  const start = new google.maps.LatLng(startLat, startLon);

  // Koordinat akhir (lokasi bus)
  const end = new google.maps.LatLng(endLat, endLon);

  const mapOptions = {
    center: start,
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  directionsRenderer.setMap(map);

  const request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING // Anda dapat mengganti dengan WALKING, BICYCLING, atau TRANSIT
  };

  directionsService.route(request, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsRenderer.setDirections(response);
    } else {
      alert("Gagal menampilkan rute. Coba lagi nanti.");
    }
  });
}


setInterval(fetchLatestData, 4000);


    </script>
</body>
{{-- <a href="https://www.flaticon.com/free-icons/bus-stop" title="bus stop icons">Bus stop icons created by André Luiz Gollo - Flaticon</a> --}}

</html>