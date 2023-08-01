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
        <a href="{{ route('user view.landingpage.store') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="dropdown">
            <button class="dropdown-toggle" onclick="toggleDropdown('dropdown-menu-1')">BIS (B 7013 EPA)</button>
            <div class="dropdown-menu" id="dropdown-menu-1">
              <a href="{{ route('user') }}">BIS (B 7006 EPA)</a>
              <a href="{{ route('userbis2') }}">BIS (B 7005 EPA)</a>
              <a href="{{ route('userbis3') }}">BIS (B 7013 EPA)</a>
            </div>
          </div>
        <div class="inner">
            <a href="{{ route('userbis3') }}"> <img src="{{ asset('images/logo.png') }}" alt="Logo bipol" class="logo"></a>
            <hr>
         
            <h4 id="title">Periksa Jarak Bus Dari Lokasimu :</h4> 
            
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
    zoom: 16,
    center: { lat: 0, lng: 0 }

});

iWindow = new google.maps.InfoWindow();

 //MARKER Lap PNJ
 var marker1 = new google.maps.Marker({
        position: {lat:-6.371381, lng:106.823999},
        map: map
    });

    var tooltipContent1 = 'LAPANGAN PNJ' + '<br>Latitude: ' + '-6.371381' + '<br>Longitude: ' + '106.823999'+
                                 '<br><a href="javascript:void(0);" onclick="openInGoogleMaps(' + '-6.371381' + ',' + '106.823999' + ');">Buka di Google Maps</a>';

    var infoWindow1 = new google.maps.InfoWindow({
        content: tooltipContent1
    });

          // Menampilkan InfoWindow saat penanda di-klik
    marker1.addListener('click', function() {
        infoWindow1.open(map, marker1);
    });


//MARKER HALTE FTUI
    var marker2= new google.maps.Marker({
        position: {lat:-6.361089395506725, lng:106.82332291534571},
        map: map
    });

    var tooltipContent2 = 'HALTE FT UI' + '<br>Latitude: ' + '-6.361089395506725' + '<br>Longitude: ' + '106.82332291534571'+
                                 '<br><a href="javascript:void(1);" onclick="openInGoogleMaps(' + '-6.361089395506725' + ',' + '106.82332291534571' + ');">Buka di Google Maps</a>';

    var infoWindow2 = new google.maps.InfoWindow({
        content: tooltipContent2
    });

        // Menampilkan InfoWindow saat penanda di-klik
    marker2.addListener('click', function() {
        infoWindow2.open(map, marker2);
    });

//MARKER ATM MANDIRI/BNI PNJ
    var marker3= new google.maps.Marker({
        position: {lat:-6.371366, lng:106.824439},
        map: map
    });

    var tooltipContent3 = 'ATM BNI PNJ' + '<br>Latitude: ' + '-6.371366' + '<br>Longitude: ' + '106.824439'+
                                 '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.371366' + ',' + '106.824439' + ');">Buka di Google Maps</a>';

    var infoWindow3 = new google.maps.InfoWindow({
        content: tooltipContent3
    });

        // Menampilkan InfoWindow saat penanda di-klik
    marker3.addListener('click', function() {
        infoWindow3.open(map, marker3);
    });
    
//MARKER HALTE FMIPA
    var marker4= new google.maps.Marker({
        position: {lat:-6.369677055395625, lng:106.8259305965351},
        map: map
    });

    var tooltipContent4 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
                                 '<br><a href="javascript:void(3);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

    var infoWindow4 = new google.maps.InfoWindow({
        content: tooltipContent4
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker4.addListener('click', function() {
        infoWindow4.open(map, marker4);
    });


//MARKER HALTE VOKASI
    var marker5= new google.maps.Marker({
        position: {lat:-6.366110596506668, lng:106.82176364071468},
        map: map
    });

    var tooltipContent5 = 'HALTE VOKASI' + '<br>Latitude: ' + '-6.366110596506668' + '<br>Longitude: ' + '106.82176364071468'+
                                 '<br><a href="javascript:void(4);" onclick="openInGoogleMaps(' + '-6.366110596506668' + ',' + '106.82176364071468' + ');">Buka di Google Maps</a>';

    var infoWindow5 = new google.maps.InfoWindow({
        content: tooltipContent5
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker5.addListener('click', function() {
        infoWindow5.open(map, marker5);
    });

//MARKER HALTE PNJ
    var marker6= new google.maps.Marker({
        position: {lat:-6.366734065681174, lng:106.82429163886312},
        map: map
    });

    var tooltipContent6 = 'HALTE PNJ' + '<br>Latitude: ' + '-6.366734065681174' + '<br>Longitude: ' + '106.82429163886312'+
                                 '<br><a href="javascript:void(5);" onclick="openInGoogleMaps(' + '-6.366734065681174' + ',' + '106.82429163886312' + ');">Buka di Google Maps</a>';

    var infoWindow6 = new google.maps.InfoWindow({
        content: tooltipContent6
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker6.addListener('click', function() {
        infoWindow6.open(map, marker6);
    });

//MARKER HALTE FIK
    var marker7= new google.maps.Marker({
        position: {lat:-6.370911447884132, lng:106.82716583066073},
        map: map
    });

    var tooltipContent7 = 'HALTE FIK' + '<br>Latitude: ' + '-6.370911447884132' + '<br>Longitude: ' + '106.82716583066073'+
                                 '<br><a href="javascript:void(6);" onclick="openInGoogleMaps(' + '-6.370911447884132' + ',' + '106.82716583066073' + ');">Buka di Google Maps</a>';

    var infoWindow7 = new google.maps.InfoWindow({
        content: tooltipContent7
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker7.addListener('click', function() {
        infoWindow7.open(map, marker7);
    });

//MARKER HALTE FKM
    var marker8= new google.maps.Marker({
        position: {lat:-6.371424092042778, lng:106.82945291177761},
        map: map
    });

    var tooltipContent8 = 'HALTE FKM' + '<br>Latitude: ' + '-6.371424092042778' + '<br>Longitude: ' + '106.82945291177761'+
                                 '<br><a href="javascript:void(7);" onclick="openInGoogleMaps(' + '-6.371424092042778' + ',' + '106.82945291177761' + ');">Buka di Google Maps</a>';

    var infoWindow8 = new google.maps.InfoWindow({
        content: tooltipContent8
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker8.addListener('click', function() {
        infoWindow8.open(map, marker8);
    });
    
//MARKER HALTE RIK
    var marker9= new google.maps.Marker({
        position: {lat:-6.370124229078082, lng:106.83083538465847},
        map: map
    });

    var tooltipContent9 = 'HALTE RIK' + '<br>Latitude: ' + '-6.370124229078082' + '<br>Longitude: ' + '106.83083538465847'+
                                 '<br><a href="javascript:void(8);" onclick="openInGoogleMaps(' + '-6.370124229078082' + ',' + '106.83083538465847' + ');">Buka di Google Maps</a>';

    var infoWindow9 = new google.maps.InfoWindow({
        content: tooltipContent9
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker9.addListener('click', function() {
        infoWindow9.open(map, marker9);
    });
    
//MARKER HALTE POCIN
    var marker10= new google.maps.Marker({
        position: {lat:-6.367888708761262, lng:106.83168078279931},
        map: map
    });

    var tooltipContent10 = 'HALTE BALAIRUNG/POCIN' + '<br>Latitude: ' + '-6.367888708761262' + '<br>Longitude: ' + '106.83168078279931'+
                                 '<br><a href="javascript:void(9);" onclick="openInGoogleMaps(' + '-6.367888708761262' + ',' + '106.83168078279931' + ');">Buka di Google Maps</a>';

    var infoWindow10 = new google.maps.InfoWindow({
        content: tooltipContent10
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker10.addListener('click', function() {
        infoWindow10.open(map, marker10);
    });
    
//MARKER HALTE FH
    var marker11= new google.maps.Marker({
        position: {lat:-6.364648064903639, lng:106.83213635244496},
        map: map
    });

    var tooltipContent11 = 'HALTE FH' + '<br>Latitude: ' + '-6.364648064903639' + '<br>Longitude: ' + '106.83213635244496'+
                                 '<br><a href="javascript:void(10);" onclick="openInGoogleMaps(' + '-6.364648064903639' + ',' + '106.83213635244496' + ');">Buka di Google Maps</a>';

    var infoWindow11 = new google.maps.InfoWindow({
        content: tooltipContent11
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker11.addListener('click', function() {
        infoWindow11.open(map, marker11);
    });
    
//MARKER BUNDARAN UI
    var marker12= new google.maps.Marker({
        position: {lat:-6.362928903791111, lng:106.83177871825517},
        map: map
    });

    var tooltipContent12 = 'TUGU MAKARA UI' + '<br>Latitude: ' + '-6.362928903791111' + '<br>Longitude: ' + '106.83177871825517'+
                                 '<br><a href="javascript:void(11);" onclick="openInGoogleMaps(' + '-6.362928903791111' + ',' + '106.83177871825517' + ');">Buka di Google Maps</a>';

    var infoWindow12 = new google.maps.InfoWindow({
        content: tooltipContent12
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker12.addListener('click', function() {
        infoWindow12.open(map, marker12);
    });
    
//MARKER HALTE ST UI
    var marker13= new google.maps.Marker({
        position: {lat:-6.360994097218867, lng:106.83162854805896},
        map: map
    });

    var tooltipContent13 = 'HALTE STASIUN UI' + '<br>Latitude: ' + '-6.360994097218867' + '<br>Longitude: ' + '106.83162854805896'+
                                 '<br><a href="javascript:void(12);" onclick="openInGoogleMaps(' + '-6.360994097218867' + ',' + '106.83162854805896' + ');">Buka di Google Maps</a>';

    var infoWindow13 = new google.maps.InfoWindow({
        content: tooltipContent13
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker13.addListener('click', function() {
        infoWindow13.open(map, marker13);
    });
    
//MARKER GERBATAMA UI
    var marker14= new google.maps.Marker({
        position: {lat:-6.353507, lng:106.831953},
        map: map
    });

    var tooltipContent14 = 'HALTE GERBATAMA UI' + '<br>Latitude: ' + '-6.353507' + '<br>Longitude: ' + '106.831953'+
                                 '<br><a href="javascript:void(13);" onclick="openInGoogleMaps(' + '-6.353507' + ',' + '106.831953' + ');">Buka di Google Maps</a>';

    var infoWindow14 = new google.maps.InfoWindow({
        content: tooltipContent14
    });

    // Menampilkan InfoWindow saat penanda di-klik
    marker14.addListener('click', function() {
        infoWindow14.open(map, marker14);
    });
    
    var polygonCoords = [
      
   
      { lat: -6.360994097218867, lng: 106.83162854805896 },//HALTE STASIUN UI
      { lat: -6.362928903791111, lng: 106.83177871825517 },//TUGU MAKARA UI
      { lat: -6.364648064903639, lng: 106.83213635244496 },//HALTE FH
      { lat: -6.367888708761262, lng: 106.83168078279931 },//HALTE POCIN/BALAIRUNG
      { lat: -6.370124229078082, lng: 106.83083538465847 },//HALTE RIK
     
      { lat: -6.371424092042778, lng: 106.82945291177761 },//HALTE fkm
      { lat: -6.370911447884132, lng: 106.82716583066073 },//HALTE FIK
      { lat: -6.369677055395625, lng: 106.8259305965351 },//HALTE FMIPA 
      { lat: -6.366734065681174, lng: 106.82429163886312}, //HALTE PNJ
      { lat: -6.371366, lng: 106.824439 }, //ATM MANDIRI/BNI PNJ
      { lat: -6.371381, lng: 106.823999 }, //LAPANGAN PNJ
      { lat: -6.366110596506668, lng: 106.82176364071468},//HALTE VOKASI
      { lat: -6.361089395506725, lng: 106.82332291534571 },//HALTE FTUI
      { lat: -6.347892910895731, lng: 106.82904815355566 },//Wisma MAKARA UI
      { lat: -6.350536129652532, lng:  106.83148462650082 },//FELFEST UI
      { lat:  -6.353507, lng: 106.831953}, //gerbatama UI
    ];

    // Membuat poligon pada peta
    var polygon = new google.maps.Polygon({
      paths: polygonCoords,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: 'yellow',
      // fillOpacity: 0.35
    });

    polygon.setMap(map);
// //MARKER HALTE GERBATAMA UI
//     var marker3= new google.maps.Marker({
//         position: {lat:-6.369677055395625, lng:106.8259305965351},
//         map: map
//     });

//     var tooltipContent3 = 'HALTE FMIPA' + '<br>Latitude: ' + '-6.369677055395625' + '<br>Longitude: ' + '106.8259305965351'+
//                                  '<br><a href="javascript:void(2);" onclick="openInGoogleMaps(' + '-6.369677055395625' + ',' + '106.8259305965351' + ');">Buka di Google Maps</a>';

//     var infoWindow3 = new google.maps.InfoWindow({
//         content: tooltipContent3
//     });

//     // Menampilkan InfoWindow saat penanda di-klik
//     marker3.addListener('click', function() {
//         infoWindow3.open(map, marker3);
//     });
    
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
                iWindow.setContent("Lokasi Kamu");
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


//button dropdown bus poltek
function toggleDropdown(menuId) {
    var dropdownMenu = document.getElementById(menuId);
    dropdownMenu.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.getElementsByClassName("dropdown-menu");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
// samapai sini
    </script>
</body>
{{-- <a href="https://www.flaticon.com/free-icons/bus-stop" title="bus stop icons">Bus stop icons created by André Luiz Gollo - Flaticon</a> --}}

</html>