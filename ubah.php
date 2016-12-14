<?php 
	include('backend/layout/head.php');
	jikabelumlogin();

	$id = $_GET['id'];
	if (isset($_POST['ubah'])) {
		$sesi = $_SESSION['username'];
		$namahost = mysqli_escape_string($koneksi, $_POST['namahost']);
		$hargahost = mysqli_escape_string($koneksi, $_POST['hargahost']);
		$deskripsihost = mysqli_escape_string($koneksi, $_POST['deskripsihost']);
		$alamathost = mysqli_escape_string($koneksi, $_POST['alamathost']);
		$lat = $_POST['lati'];
		$lon = $_POST['long'];
		$tipehost = mysqli_escape_string($koneksi, $_POST['tipehost']);
		$foto_host = $_FILES['foto_host']['name'];
		$lokasi = $_FILES['foto_host']['tmp_name'];

		$lokasifoto = "user/$sesi/$id";
		move_uploaded_file($lokasi,$lokasifoto."/".$foto_host);
		$query = "UPDATE tbl_host SET nama_host = '$namahost', harga_host = '$hargahost', tgl_publish_host = now(), deskripsi_host = '$deskripsihost', alamat_host = '$alamathost', lat = '$lat', lng = '$lon', tipe_host = '$tipehost' WHERE id_host = $id and username like '$sesi'; UPDATE tbl_gambar_host SET gambar_host='$foto_host', url_gambar_host = '$lokasifoto' WHERE id_host = $id";
		mysqli_multi_query($koneksi, $query);
		header("location:hostsaya.php");

	}

	$queritampildata = "select * from tbl_host where id_host=$id";
	$sqltampil = mysqli_query($koneksi, $queritampildata);
	while ($data = mysqli_fetch_array($sqltampil)) {
?>
	<main>
		<center>
				<form action="" method="post" accept-charset="utf-8" class="panel-tambah-host" enctype="multipart/form-data">
					<h1>Edit Host</h1>
					<div class="namahost">
						<input type="text" name="namahost" placeholder="Nama Host" required="" value="<?php echo $data['nama_host']?>" required="">
					</div>
					<div class="jarak">
						<input type="number" name="hargahost" step="1" placeholder="Harga" value="<?php echo $data['harga_host']?>" required="">
					</div>
					<div class="jarak">
						<select name="tipehost">
							<option value="guesthouse">Guest House</option>
							<option value="hotel">Hotel</option>
							<option value="homestay">Homestay</option>
							<option value="kost">Kost</option>
						</select>
					</div>
					<div class="jarak">
						<textarea rows="6" name="deskripsihost" placeholder="Deskripsi Host" required=""><?php echo $data['deskripsi_host']?></textarea>
					</div>
					<div class="jarak">
						<textarea rows="4" name="alamathost" placeholder="Alamat Host" required=""><?php echo $data['alamat_host']?></textarea>
					</div>
					<div class="jarak">
						<b style="font-size:20px;">Lokasi Host</b>
						<div id="map-canvas-host-baru" style=""></div>
						<div class="latlon">
							<div class="lat">Latitude: <input type="text" id='lat' name="lati" readonly="readonly" value="<?php echo $data['lat']?>">
							</div>
							<div class="lon">Longitude: <input type="text" id='lon' name="long" readonly="readonly" value="<?php echo $data['lng']?>">
							</div>
						</div>
					</div>
					<div class="jarak" style="margin-top:75px;">
						<b style="font-size:20px;">Foto Host</b>
						<input name="foto_host" type="file" accept="image/*"/>
					</div>
					<div class="daftar">
						<input type="submit" name="ubah" value="Edit Host">
					</div>
				</form>
		</center>
	</main>
	<?php
	}
	?>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBglmCLJWoje3Mmcr0I-uMZNZcVjyJIiko&callback=initMap" type="text/javascript"></script>
    <script>
        var marker;   

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas-host-baru'), {
                center: {lat: -0.4944506, lng: 117.1471207},
                zoom: 15,
                streetViewControl: false,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

			function placeMarker(location) {
				if ( marker ) {
					marker.setPosition(location);
				} else {
					marker = new google.maps.Marker({
					position: location,
					map: map
			    });
			  }
			}

            google.maps.event.addListener(map, "click", function(event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(6);
                document.getElementById("lon").value = clickLon.toFixed(6);


                placeMarker(event.latLng);
            });

        }         
    </script>
<?php 
	include('backend/layout/footer.php');
?>