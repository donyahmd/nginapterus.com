<?php include('backend/layout/head.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysqli_real_escape_string($koneksi, $_POST['username']);
		$password = mysqli_real_escape_string($koneksi, $_POST['password']);
		$passwordmd5 = md5($password);
		$query = "select * from tbl_akun where username='$username' AND password='$passwordmd5'";
		$sql = mysqli_query($koneksi, $query);
		$cek_akun = mysqli_num_rows($sql);
			if($cek_akun > 0) {
				$_SESSION['username'] = $username;
				echo "<script>window.open('profile.php','_self')</script>";
			}
			else {
				echo "<script>alert('Username atau password ada yang salah!')</script>";
			}
		}
?>
	<main>
		<center>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="panel-login">
					<h1>LOGIN</h1>
					<div class="username">
						<!--<p style="text-align:left;">Username</p>-->
						<input type="text" name="username" placeholder="Username">
					</div>
					<div class="password">
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