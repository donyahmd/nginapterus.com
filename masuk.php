<?php include('backend/layout/head.php');
	if ($_SESSION['login'] == true){
		header("location:beranda.php");
	}
	if(isset($_POST['masuk'])) {
		$username = mysqli_real_escape_string($koneksi, $_POST['username']);
		$password = mysqli_real_escape_string($koneksi, $_POST['password']);
		$passwordmd5 = md5($password);
		$query = "select * from tbl_akun where username='$username' AND password='$passwordmd5'";
		$sql = mysqli_query($koneksi, $query);
		$cek_akun = mysqli_num_rows($sql);
			if($cek_akun > 0) {
				$_SESSION['username'] = $username;
				$_SESSION['login'] = true;
				session_start();
				mysqli_query($koneksi, "update tbl_akun set terakhir_login=now() where username = '$username'");
				//echo "<script>window.open('beranda.php','_self')</script>";
				header("location:beranda.php");
			}
			else {
				echo "<script>alert('Username atau password ada yang salah!')</script>";
			}
		}
?>
	<main>
		<center>
				<form action="" method="POST" accept-charset="utf-8" class="panel-login">
					<h1>LOGIN</h1>
					<div class="username">
						<!--<p style="text-align:left;">Username</p>-->
						<input type="text" name="username" placeholder="Username">
					</div>
					<div class="jarak">
						<!--<p style="text-align:left;">Password</p>-->
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="masuk">
						<input type="submit" value="MASUK" name="masuk">
					</div>
					<div class="belum-punya-akun">
						<div class="text-belum-punya-akun">
							<a href="daftar.php">Belum punya akun? Daftar disini.</a>
						</div>
					</div>
				</form>
		</center>
	</main>
<?php /*include('backend/layout/footer.php');*/?>