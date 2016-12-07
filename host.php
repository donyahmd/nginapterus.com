<?php 
include('backend/layout/head.php');
$id = $_GET['id'];
$query = "select * from tbl_host inner join tbl_akun on tbl_host.id_pengguna = tbl_akun.id_akun where id_host=$id";
$sql = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($sql)) {
?>
	<main>
		<section class="host-cover">
				<h1><?php echo $data['nama_host'];?></h1>
				<h3><?php echo $data['username'];?></h3>
				<img src="user/donyahmd/1/1.jpg">
		</section>
		<section class="host-content">
		<div class="content">
			<div class="header-host">
				<h2>IDR<?php echo $data['harga_host'];?> <input type="submit" value="Booking"></h2>
				<h3><?php echo $data['username'];?> <img src="backend/asset/img/verified.png"></h3>	
			</div>
			<div class="alamat-host">
				<div class="alamat-host-kiri">
					<h3>Alamat</h3>
					<p><?php echo $data['alamat_host'];?></p>
				</div>
				<div class="alamat-host-kanan">
					<div id="map-canvas-host"></div>
				</div>
			</div>
			<div class="deskripsi-host">
				<h3>Deskripsi Host</h3>
				<p><?php echo $data['deskripsi_host'];?></p>
			</div>
		</div>
		</section>
	</main>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBglmCLJWoje3Mmcr0I-uMZNZcVjyJIiko&callback=initMap" type="text/javascript"></script>
    <script>
        var marker;   
        <?php
        $lat = $data['lat'];
        $lon = $data['lng'];
        $nama_host = $data['nama_host'];
        ?>
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas-host'), {
                center: {lat: <?php echo "$lat" ?>, lng: <?php echo "$lon"?>},
                zoom: 15,
                streetViewControl: false,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infoWindow = new google.maps.InfoWindow;   

            function bindInfoWindow(marker, map, infoWindow, html) {
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
            }

            function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng);
                var marker = new google.maps.Marker({
                    map: map,
                    position: pt
                });         
                bindInfoWindow(marker, map, infoWindow, info);
            }

        <?php
            echo ("addMarker($lat, $lon, '<a target=_blank class=maps-nama-host href=http://www.google.com/maps/place/$lat,$lon>$nama_host</a>');");
        ?>

        }         
    </script>
<?php 
}
include('backend/layout/footer.php');
?>