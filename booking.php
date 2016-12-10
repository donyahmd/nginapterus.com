<?php 
include('backend/layout/head.php');
	if ($_SESSION['login'] == false){
		header("location:masuk.php");
	}
$id = $_GET['id'];
$query = "select * from tbl_host inner join tbl_akun on tbl_host.username = tbl_akun.username inner join tbl_pengguna on tbl_akun.username = tbl_pengguna.username where id_host=$id";
$sql = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($sql)) {
	$nama_host = $data['nama_host'];
	$username = $data['username'];
	$foto_ava = $data['foto_ava'];
?>
	<main>
		<section class="host-cover">
				<h1><?php echo $nama_host;?></h1>
				<h3><?php echo $username;?></h3>
				<img src="user/donyahmd/1/1.jpg">
		</section>
		<section class="host-user">
			<center>
				<img class="host-user-bulat-kecil" src="user/<?php echo $username."/".$foto_ava;?>">
				<br>
				<h3 style="margin-top:0px;"><?php echo $username?></h3>
				<img class="host-user-verified" src="backend/asset/img/verified.png">
			</center>
		</section>
		<section class="host-content">
			<div class="content">
			<center><h2>Formulir Pemesanan</h2></center>
				<form action="" method="get">
					<p class="check-in-out-text">Check in</p>
					<input type="date" name="tgl_checkin">
					<p class="check-in-out-text">Check out</p>
					<input type="date" name="tgl_checkin">
				</form>
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