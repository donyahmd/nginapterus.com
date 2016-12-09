<?php 
	include('backend/layout/head.php');
	$sesi = $_SESSION['username'];
	$query = "select * from tbl_akun inner join tbl_pengguna on tbl_akun.id_akun = tbl_pengguna.id_pengguna where username='$sesi'";
	$sql = mysqli_query($koneksi, $query);
	while ($data = mysqli_fetch_array($sql)) {
		$username = $data['username'];
		$foto_ava = $data['foto_ava'];
?>
	<main>
		<section class="host-user">
			<center>
				<img class="host-user-bulat-kecil" src="user/<?php echo $username."/".$foto_ava;?>">
				<br>
				<p></p>
				<h3 style="margin-top:0px;">Selamat datang <?php echo $username?>!</h3>
				<img class="host-user-verified" src="backend/asset/img/verified.png">
			</center>
		</section>
		<div class="menu">
			<ul>
				<li><a href="#">Profile Saya</a></li>
				<li><a href="#">Host Saya</a></li>
				<li><a href="#">Pengaturan</a></li>
			</ul>
		</div>
	</main>
<?php 
}
include('backend/layout/footer.php');?>