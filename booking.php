<?php 
include('backend/layout/head.php');
	if ($_SESSION['login'] == false){
		header("location:masuk.php");
	}
$id = $_GET['id'];
$query = "select * from tbl_host inner join tbl_akun on tbl_host.username = tbl_akun.username inner join tbl_pengguna on tbl_akun.username = tbl_pengguna.username where id_host=$id";
$sql = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($sql)) {
	$nama_host = $data['nama_host'];
	$username = $data['username'];
	$foto_ava = $data['foto_ava'];
	if (isset($_POST['booking'])) {
		$tgl_checkin = $_POST['tgl_checkin'];
		$tgl_checkout = $_POST['tgl_checkout'];
		$pembayaran = $_POST['cod'];
		$query2 = "insert into tbl_booking_host values(null,'". $_SESSION['username'] ."','$id','$tgl_checkin','$tgl_checkout','$pembayaran')";
		$sql2 = mysqli_query($koneksi,$query2);
		$tampil = mysqli_query($koneksi,"select id_order from tbl_booking_host where username like '". $_SESSION['username'] ."' order by id_order desc limit 1");
		$tampilkan = mysqli_fetch_array($tampil);
		header("location:sukses.php?id=" . $tampilkan['id_order'] . "");
	}
?>
	<main>
		<section class="host-cover">
				<h1><?php echo $nama_host;?></h1>
				<h3><?php echo $username;?></h3>
				<img src="user/donyahmd/1/1.jpg">
		</section>
		<section class="host-user">
			<center>
				<img class="host-user-bulat-kecil" src="user/<?php echo $username."/".$foto_ava;?>">
				<br>
				<h3 style="margin-top:0px;"><?php echo $username?></h3>
				<img class="host-user-verified" src="backend/asset/img/verified.png">
			</center>
		</section>
		<section class="host-content">
			<div class="content">
			<center><h2>Formulir Pemesanan</h2>
				<form action="" method="post" class="form-booking">
					<p class="check-in-out-text">Check in</p>
					<input type="date" name="tgl_checkin" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
					<p class="check-in-out-text">Check out</p>
					<input type="date" name="tgl_checkout" value="<?php echo date('Y-m-d'); ?>">
					<p class="check-in-out-text">Metode Pembayaran</p>
					<p><input type="radio" name="cod" value="COD" checked>Bayar ditempat</p>
					<br><input type="submit" name="booking" value="Booking">
				</form>
				</center>
			</div>
		</section>
	</main>
<?php 
}
include('backend/layout/footer.php');
?>