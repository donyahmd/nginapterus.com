<?php 
include('backend/layout/head.php');
$id = $_GET['id'];
if ($_SESSION['username'] = NULL) {
	$sesi = isset($_SESSION['username']);
} else {
	$sesi = $_SESSION['username'];
}
$query = "select * from tbl_host inner join tbl_akun on tbl_host.username = tbl_akun.username inner join tbl_pengguna on tbl_akun.username = tbl_pengguna.username inner join tbl_gambar_host on tbl_host.id_host = tbl_gambar_host.id_host where tbl_host.id_host=$id";
$sql = mysqli_query($koneksi,$query);
if (isset($_POST['komentar'])) {
	$isikomentar = $_POST['isikomentar'];
	$queryisikomentar = mysqli_query($koneksi, "insert into tbl_komentar_host values(null,'$sesi',$id,'$isikomentar',now())");
}
while ($data = mysqli_fetch_array($sql)) {
	$nama_host = $data['nama_host'];
	$username = $data['username'];
	$foto_ava = $data['foto_ava'];
	$url_gambar_host = $data['url_gambar_host'];
	$gambar_host = $data['gambar_host'];
?>
	<main>
		<section class="host-cover">
				<h1><?php echo $nama_host;?></h1>
				<h3><?php echo $username;?></h3>
				<img src="<?php echo $url_gambar_host ."/".$gambar_host ?>">
		</section>
		<section class="host-user">
			<center>
				<img class="host-user-bulat-kecil" src="user/ava.png">
					<?php //echo $username."/".$foto_ava;?>
				<br>
				<h3 style="margin-top:0px;"><?php echo $username?></h3>
				<img class="host-user-verified" src="backend/asset/img/verified.png">
			</center>
		</section>
		<section class="host-content">
		<div class="content">
			<div class="header-host">
				<h2>IDR<?php echo $data['harga_host'];?>
				<br>
				<?php if ($username != $sesi) {
				?>
					<a href="booking.php?id=<?php echo $id?>"><input type="submit" name="booking" value="Booking"></a>
				<?php
				} else {
				?>
					<a href="ubah.php?id=<?php echo $id?>"><input type="submit" name="ubah" value="Edit Host"></a>
				<?php
				}

				?>
				</h2>
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
		<?php 
		if (isset($_SESSION['login']) == false) {
			# code...
		} else {
		?>
		<section class="host-content">
		<div class="content">
			<h3>Komentar</h3>
			<form action="" method="post" accept-charset="utf-8">
				<textarea rows="5" name="isikomentar" placeholder="Masukan komentar anda tentang host ini..." required=""></textarea>
				<input type="submit" name="komentar" value="Komentar">
			</form>
		<?php
		$querykomentar = "SELECT * FROM tbl_komentar_host where id_host=$id";
		$sqlkomentar = mysqli_query($koneksi, $querykomentar);
		while ($tampilkankomentar = mysqli_fetch_array($sqlkomentar)) {
		?>
		<h4>#<?php echo $tampilkankomentar['id_komentar']?> - <?php echo $tampilkankomentar['username'];?> - dikomentari pada <?php echo $tampilkankomentar['tgl_dibuat']?></h4>
		<p class="Komentar"><?php echo $tampilkankomentar['isi_komentar'];?></p>
		<hr>
		<?php
		}
		?>
		</div>
		</section>
		<?php
		}
		?>
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