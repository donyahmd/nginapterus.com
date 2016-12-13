<?php 
	include('backend/layout/head.php');
	if ($_SESSION['login'] == false){
		header("location:masuk.php");
	}
	$sesi = $_SESSION['username'];
?>
	<main>
		<?php include('backend/layout/menu.php');?>
		<section class="host-landing-browse">
			<center><div class="judul-cari">Host Saya</div>
			<?php 
			$query = "select * from tbl_host INNER join tbl_pengguna on tbl_host.username = tbl_pengguna.username where tbl_pengguna.username like '$sesi'";
			$sql = mysqli_query($koneksi, $query);
				while ($data = mysqli_fetch_array($sql)) {
					$id_host = $data['id_host'];
					$nama_host = $data['nama_host'];
					$harga_host = $data['harga_host'];
					$username = $data['username'];
					$verifikasi = $data['verifikasi'];
					$foto_ava = $data['foto_ava'];
			?>
			<div class="host-landing-detail" style="margin-bottom:100px;">
				<a href="host.php?id=<?php echo "$id_host";?>"><img src="user/donyahmd/1/kost.jpg"></a>
				<div class="host-landing-detail-content">
					<a href="host.php?id=<?php echo "$id_host";?>" class="tebal judul"><?php echo "$nama_host";?></a><img class="bulat-kecil" src="user/<?php echo $username."/".$foto_ava;?>">
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
						<a href="edit.php?id=<?php echo $id_host?>">
							<div class="edit-host">
								<center><p>Edit</p></center>
							</div></a>
						<a href="delete.php?id=<?php echo $id_host ?>" onclick="return confirm('Apakah anda yakin ingin menghapus host ini?')">
							<div class="hapus-host">
								<center><p>Hapus</p></center>
							</div></a>
					</div>
					<a href="tambahhost.php"><div class="tambah-host"></div></a>
				</div>
			</div>
			<?php
				}
			?>
		</section>
	</main>
<?php 
include('backend/layout/footer.php');?>