<?php include('backend/layout/head.php');?>
	<main>
		<center>
				<form action="backend/php/daftar.php" method="post" accept-charset="utf-8" class="panel-login">
					<h1>Daftar</h1>
					<div class="username">
						<p style="text-align:left;">Username</p>
						<input type="text" name="username">
					</div>
					<div class="password">
						<p style="text-align:left;">Password</p>
						<input type="password" name="password">
					</div>
					<div class="password">
						<p style="text-align:left;">Konfirmasi Password</p>
						<input type="password" name="konpassword">
					</div>

					<div class="login">
						<input type="submit" value="DAFTAR">
					</div>
					<div class="belum-punya-akun">
						<div class="text-belum-punya-akun">
							<a href="masuk.php">Sudah punya akun? Login disini.</a>
						</div>
					</div>
				</form>
		</center>
	</main>
<?php include('backend/layout/footer.php');?>