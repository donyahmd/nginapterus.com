<?php 
	include('backend/layout/head.php');
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if (isset($_POST['daftar'])) {
	$query = "insert into tbl_akun values (NULL,'$username','$password',NOW(),'192.nginapterus',NOW())";
			mysqli_query($koneksi, $query);
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