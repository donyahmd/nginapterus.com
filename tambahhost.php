<?php 
	include('backend/layout/head.php');
		if ($_SESSION['login'] == false){
		header("location:beranda.php");
		}
	if (isset($_POST['daftar'])) {
	$username = mysqli_escape_string($koneksi, $_POST['username']);
	$password = md5(mysqli_escape_string($koneksi, $_POST['password']));
	$query = "insert into tbl_akun values (NULL,'$username','$password',NOW(),'192.nginapterus',NOW());insert into tbl_pengguna(username) values ('$username');";
	$dwad = mysqli_multi_query($koneksi, $query);
	var_dump($query);
	}
?>
	<main>
		<center>
				<form action="" method="post" accept-charset="utf-8" class="panel-login daftar">
					<h1>Daftar</h1>
					<div class="username">
						<input type="text" name="username" placeholder="Username" required="">
					</div>
					<div class="jarak">
						<input type="password" name="password" placeholder="Password" required="">
					</div>
					<div class="jarak">
						<input type="password" name="konpassword" placeholder="Konfirmasi Password" required="">
					</div>
					<div class="jarak">
						<input type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="daftar">
						<input type="submit" name="daftar" value="DAFTAR">
					</div>
					<div class="belum-punya-akun">
						<div class="text-belum-punya-akun">
							<a href="masuk.php">Sudah punya akun? Login disini.</a>
						</div>
					</div>
				</form>
		</center>
	</main>
<?php 
	include('backend/layout/footer.php');
?>