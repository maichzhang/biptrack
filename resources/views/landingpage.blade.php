<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
     body{
        background:#f2f2ee;
     }

    </style>
</head>

<body>

    
<div id="map" style="height: 500px; width: 50%;"></div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBayHgz7p5Mmk0mjHNc4sg6obkiYsNBgRw&callback=initMap" async defer></script>
    <script>

  function initMap() {
    // Koordinat untuk batas wilayah
    var southWest = new google.maps.LatLng(-6.360223889596034, 106.82727514888026); // Contoh koordinat sudut barat daya
    var northEast = new google.maps.LatLng(-6.360223889596034, 106.82727514888026); // Contoh koordinat sudut timur laut
    var bounds = new google.maps.LatLngBounds(southWest, northEast);

    // Opsi peta
    var mapOptions = {
      center: new google.maps.LatLng(-6.360223889596034, 106.82727514888026), // Contoh koordinat pusat peta
      zoom: 15, // Tingkat zoom peta
      restriction: {
        latLngBounds: bounds, // Menggunakan batas wilayah
        strictBounds: false // Jika true, pengguna tidak dapat menavigasi di luar batas
      }
    };

    // Membuat peta di elemen dengan ID "map"
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }
</script>

</body>
</html>