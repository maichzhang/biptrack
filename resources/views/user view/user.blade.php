<!DOCTYPE html>
<html>

<head>
    <title>LACAK BIPOL</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>

<body>
    
    <div id="pesan">
        <div class="inner">
      <img src="{{ asset('images/logo.png') }}" alt="Logo bipol" class="logo">
            <h4 id="title">Periksa Jarak Bis Dari Lokasimu </h4>
            <form>
                <div class="form-group">
                    <label>Masukkan Lokasi Anda</label>
                    <input type="text" class="form-control" id="start" placeholder="Jl. Mayjend Ahmad Yani" required>
                </div>

                <div class="form-group">
                    <label>Masukkan Lokasi Tujuan</label>
                    <input type="text" class="form-control" id="end" placeholder="Jl. Semarang" required>
                </div>
                <input type="submit" class="btn btn-light" id="pesan-btn" value="Periksa">
          
            </form>
            <div id="detail">
            <hr>
                <h4>Detail Jarak kamu dengan Bipol</h4>
                <div class="card-custom">
                    <table>
                        <tr>
                            <th>Jarak</th>
                            <th>:</th>
                            <td id="distance"></td>
                        </tr>
                        <tr>
                            <th>Durasi Tunggu</th>
                            <th>:</th>
                            <td id="duration"></td>
                        </tr>
                        <th>Harga</th>
                            <th>:</th>
                            <td id="price"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBayHgz7p5Mmk0mjHNc4sg6obkiYsNBgRw&libraries=places"></script>
    <script src="script.js"></script>
</body>

</html>