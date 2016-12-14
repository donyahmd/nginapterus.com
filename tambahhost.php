<?php 
	include('backend/layout/head.php');
		jikabelumlogin();
		if (isset($_POST['tambah'])) {
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
			

			$query = "insert into tbl_host values (NULL,'$sesi','$namahost',$hargahost,now(),'$deskripsihost','','$alamathost',$lat,$lon,'$tipehost','INDONESIA',1)";
			mysqli_query($koneksi, $query);

			$queri = "SELECT * FROM tbl_host ORDER BY id_host DESC limit 1";
			$jalankan = mysqli_query($koneksi,$queri);
			$ngambil = mysqli_fetch_array($jalankan);
			$newhost = $ngambil['id_host'];
			$lokasifoto = "user/$sesi/$newhost";
			mkdir($lokasifoto);
			move_uploaded_file($lokasi,$lokasifoto."/".$foto_host);

			$query2 = "insert into tbl_gambar_host values (null,$newhost,'$foto_host','$lokasifoto','Gambar Cover')";
			mysqli_query($koneksi, $query2);

		}
?>
	<main>
		<center>
				<form action="" method="post" accept-charset="utf-8" class="panel-tambah-host" enctype="multipart/form-data">
					<h1>Tambah Host Baru</h1>
					<div class="namahost">
						<input type="text" name="namahost" placeholder="Nama Host" required="">
					</div>
					<div class="jarak">
						<input type="number" name="hargahost" step="1" placeholder="Harga" required="">
					</div>
					<div class="jarak">
						<select name="tipehost">
							<option value="guesthouse" selected="">Guest House</option>
							<option value="hotel">Hotel</option>
							<option value="homestay">Homestay</option>
							<option value="kost">Kost</option>
						</select>
					</div>
					<div class="jarak">
						<textarea rows="6" name="deskripsihost" placeholder="Deskripsi Host" required=""></textarea>
					</div>
					<div class="jarak">
						<textarea rows="4" name="alamathost" placeholder="Alamat Host" required=""></textarea>
					</div>
					<div class="jarak">
						<b style="font-size:20px;">Lokasi Host</b>
						<div id="map-canvas-host-baru" style=""></div>
						<div class="latlon">
							<div class="lat">Latitude: <input type="text" id='lat' name="lati" readonly="readonly">
							</div>
							<div class="lon">Longitude: <input type="text" id='lon' name="long" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="jarak" style="margin-top:75px;">
						<b style="font-size:20px;">Foto Host</b>
						<input name="foto_host" type="file" accept="image/*"/>
					</div>
					<div class="daftar">
						<input type="submit" name="tambah" value="DAFTAR">
					</div>
				</form>
		</center>
	</main>
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