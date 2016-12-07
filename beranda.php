<?php 
	include('backend/layout/head.php');
	$sesi = $_SESSION['username'];
	$query = "select * from tbl_akun where username='$sesi' inner join tbl_pengguna on tbl_host.id_pengguna = tbl_pengguna.id_pengguna INNER join tbl_akun on tbl_pengguna.id_pengguna = tbl_akun.id_akun";
	$sql = mysqli_query($koneksi, $query);
?>
	<main>
		<div class="welcome">
			<p>Selamat Datang Kembali, <b><?php echo $sesi?></b></p>
			<img src="user/<?php echo $username."/".$foto_ava?>">
		</div>
		<div class="menu">
			<ul>
				<li><a href="#">Profile Saya</a></li>
				<li><a href="#">Host Saya</a></li>
				<li><a href="#">Pengaturan</a></li>
			</ul>
		</div>
	</main>
<?php include('backend/layout/footer.php');?>