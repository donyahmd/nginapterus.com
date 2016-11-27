<?php include('backend/layout/head.php');?>
	<main>
		<section class="landing1">
		<div class="landing1-black">
			<div><center><img src="backend/asset/img/logo.png" class="logo-landing"></center></div>
			<div class="pengenalan"><center>Cara mudah temukan <b class="text-kuning">teman</b> dan <b class="text-kuning">petualangan</b> baru!</center></div>
		</div>
		</section>
		<section>
			<center><div class="pengenalan2">Puluhan <b class="text-kuning">Hotel, Homestay,</b> dan <b class="text-kuning">Guest House</b> telah bergabung dengan kami.</div>
			<p style="font-weight:100;font-size:15px;">*Klik marker dibawah untuk melihat detail.</p>
			</center>
			<div id="map-canvas"></div>
		</section>
		<section class="host-landing-browse">
			<center><div class="pengenalan3">Pilih <b class="text-kuning">Hotel, Homestay,</b> dan <b class="text-kuning">Guest House</b> yang ingin anda tinggali.</div>
			<?php 
			$sql = "select nama_host,harga_host,username,verifikasi,foto_ava from tbl_host inner join tbl_pengguna on tbl_host.id_pengguna = tbl_pengguna.id_pengguna INNER join tbl_akun on tbl_pengguna.id_pengguna = tbl_akun.id_akun limit 4";
			$query = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_array($query)) {
					$nama_host = $data['nama_host'];
					$harga_host = $data['harga_host'];
					$username = $data['username'];
					$verifikasi = $data['verifikasi'];
					$foto_ava = $data['foto_ava'];
			?>
			<div class="host-landing-detail">
				<a href="#"><img src="user/donyahmd/1/kost.jpg"></a>
				<div class="host-landing-detail-content">
					<a href="#" class="tebal judul"><?php echo "$nama_host";?></a><img class="bulat-kecil" src="user/<?php echo $username."/".$foto_ava?>">
					<br>
					<a href="#" class="username"><?php echo "$username";?></a>
					<br>
					<div class="tebal harga">IDR<?php echo "$harga_host";?></div>
					<div class="verifikasi">
					<?php
						if ($verifikasi == 1) {
					?>
					<img src="backend/asset/img/verified.png">
					<?php
					}
					?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</section>
		<section>
			
		</section>
	</main>
<?php include('backend/php/googlemaps-api.php'); ?>
<?php include('backend/layout/footer.php');?>