<?php 
	include('backend/layout/head.php');
?>
	<main>
		<section class="host-landing-browse">
			<center><div class="judul-cari">Cari <b class="text-kuning">Hotel, Homestay,</b> dan <b class="text-kuning">Guest House</b> yang ingin anda tinggali.</div>
			<?php 
			$query = "select * from tbl_host inner join tbl_pengguna on tbl_host.username = tbl_pengguna.username INNER join tbl_akun on tbl_pengguna.username = tbl_akun.username inner join tbl_gambar_host on tbl_host.id_host = tbl_gambar_host.id_host order by tbl_host.id_host DESC";
			$sql = mysqli_query($koneksi, $query);
				while ($data = mysqli_fetch_array($sql)) {
					$id_host = $data['id_host'];
					$nama_host = $data['nama_host'];
					$harga_host = $data['harga_host'];
					$username = $data['username'];
					$verifikasi = $data['verifikasi'];
					$foto_ava = $data['foto_ava'];
					$url_gambar_host = $data['url_gambar_host'];
					$gambar_host = $data['gambar_host'];
			?>
			<div class="host-landing-detail">
				<a href="host.php?id=<?php echo "$id_host";?>"><img src="<?php echo $url_gambar_host ."/".$gambar_host ?>"></a>
				<div class="host-landing-detail-content">
					<a href="host.php?id=<?php echo "$id_host";?>" class="tebal judul"><?php echo "$nama_host";?></a><img class="bulat-kecil" src="user/ava.png">
					<?php //echo $username."/".$foto_ava;?>
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
	</main>
<?php 
include('backend/layout/footer.php');?>