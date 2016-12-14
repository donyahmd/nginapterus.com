<?php 
	include('backend/layout/head.php');
	jikabelumlogin();
	$sesi = $_SESSION['username'];
?>
	<main>
		<?php include('backend/layout/menu.php');?>
		<section class="host-landing-browse">
			<center><div class="judul-cari">Host Saya</div>
			<a href="tambahhost.php"><div class="tambah-host"></div></a>
			<?php 
			$query = "select * from tbl_host INNER join tbl_pengguna on tbl_host.username = tbl_pengguna.username inner join tbl_gambar_host on tbl_host.id_host = tbl_gambar_host.id_host where tbl_pengguna.username like '$sesi'";
			$sql = mysqli_query($koneksi, $query);
			$hitung = mysqli_num_rows($sql);
			if ($hitung == 0) {
				echo "<h2>Anda belum memiliki host, daftarkan host anda dengan men-klik tombol kanan bawah.</h2>";
			} else {
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
			<div class="host-landing-detail" style="margin-bottom:100px;">
				<a href="host.php?id=<?php echo "$id_host";?>">
				<img src="<?php echo $url_gambar_host ."/".$gambar_host ?>"></a>
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
					<div class="aksi-edit-delete">
						<a href="ubah.php?id=<?php echo $id_host?>">
							<div class="edit-host">
								<center><p>Edit</p></center>
							</div></a>
						<a href="hapus.php?id=<?php echo $id_host ?>" onclick="return confirm('Apakah anda yakin ingin menghapus host ini?')">
							<div class="hapus-host">
								<center><p>Hapus</p></center>
							</div></a>
					</div>
					
				</div>
			</div>
			<?php
				}
			}
			?>
		</section>
	</main>
<?php 
include('backend/layout/footer.php');?>