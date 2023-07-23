

<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
  
        nav {
            background-color: #333;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 5px;
        }

        /* Responsive adjustments */
        @media (min-width: 768px) {
            nav {
                flex-direction: row;
                justify-content: flex-end;
            }
        }

    </style>
    <title>Lokasi Ahlul</title>
</head>
<body>
    <nav>
        <a href="#beranda">Beranda</a>
        <a href="#tentang">Tentang</a>
        <a href="#bantuan">Bantuan</a>
    </nav>
    <h1 style="text-align: center;">Elin cantik..aku disiniiii</h1>
    <button style="display: block; margin: 0 auto;" onclick="goToHomeMarker()">Klik Ini untuk ke Rumah Elin</button>

    <div id="map"></div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBayHgz7p5Mmk0mjHNc4sg6obkiYsNBgRw&callback=initMap" async defer></script>
    <script>
        // ThingSpeak channel and API details
        var channelID = '2223163';
        var readAPIKey = 'KNSUCSYC9IAYXZVM';
        var map;
        var lineCoordinatesPath;
        var marker;
        var latestData;

        function fetchLatestData() {
            var url = 'https://api.thingspeak.com/channels/' + channelID + '/feeds.json?api_key=' + readAPIKey + '&results=1&order=desc';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.feeds.length > 0) {
                        var entry = data.feeds[0].entry_id;
                        var fields = data.feeds[0].field1 + ', ' + data.feeds[0].field2;
                        displayLatestData(entry, fields);
                        updateMap(parseFloat(data.feeds[0].field1), parseFloat(data.feeds[0].field2));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function displayLatestData(entry, fields) {
            // Hapus kode untuk menampilkan data pada tabel
            // jika Anda tidak ingin menampilkannya
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: { lat: 0, lng: 0 }
            });   
        }

        function updateMap(latitude, longitude) {
            if (marker) {
                marker.setMap(null);
            }

            if (lineCoordinatesPath) {
                lineCoordinatesPath.setMap(null);
            }

            var markerPosition = { lat: latitude, lng: longitude };

            marker = new google.maps.Marker({
                position: markerPosition,
                map: map
            });

            lineCoordinatesPath = new google.maps.Polyline({
                path: lineCoordinatesPath ? [...lineCoordinatesPath.getPath().getArray(), new google.maps.LatLng(latitude, longitude)] : [new google.maps.LatLng(latitude, longitude)],
                geodesic: true,
                strokeColor: "#2E10FF",
                map: map
            });

            map.panTo(markerPosition);

            // Membuat InfoWindow untuk menampilkan tooltip
            var tooltipContent = 'Latitude: ' + latitude + '<br>Longitude: ' + longitude +
                                 '<br><a href="javascript:void(0);" onclick="openInGoogleMaps(' + latitude + ',' + longitude + ');">Buka di Google Maps</a>';

            var infoWindow = new google.maps.InfoWindow({
                content: tooltipContent
            });

            // Menampilkan InfoWindow saat penanda di-klik
            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }

        function goToHomeMarker() {
            var homePosition = { lat: -6.147056244896515, lng: 106.71478758376885 };
            map.panTo(homePosition);
            map.setZoom(16);
        }

        function openInGoogleMaps(latitude, longitude) {
            var url = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude;
            window.open(url, "_blank");
        }

        setInterval(fetchLatestData, 4000);
        
        
// Fungsi untuk menghitung jarak dan waktu tempuh dari posisi pengguna ke lokasi tertentu
function calculateDistanceAndTime(destinationLat, destinationLng) {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var origin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      var destination = new google.maps.LatLng(destinationLat, destinationLng);

      var directionsService = new google.maps.DirectionsService();

      var request = {
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING // Anda bisa mengganti dengan WALKING, BICYCLING, atau TRANSIT
      };

      directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          var route = response.routes[0];
          var distance = route.legs[0].distance.text;
          var duration = route.legs[0].duration.text;

          // Menampilkan jarak dan waktu tempuh di dalam sebuah InfoWindow
          var infoWindow = new google.maps.InfoWindow({
            content: 'Jarak: ' + distance + '<br>Waktu Tempuh: ' + duration
          });

          // Menampilkan InfoWindow pada peta
          infoWindow.open(map, marker);
        } else {
          alert('Tidak dapat menghitung rute: ' + status);
        }
      });
    });
  } else {
    alert('Geolocation tidak didukung oleh browser Anda.');
  }
}
    </script>
</body>
</html>


