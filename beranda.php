<?php 
	include('backend/layout/head.php');
	jikabelumlogin();
	
	$sesi = $_SESSION['username'];
	$query = "select * from tbl_akun as ac inner join tbl_pengguna on ac.username = tbl_pengguna.username where ac.username like '$sesi'";
	$sql = mysqli_query($koneksi, $query);
	while ($data = mysqli_fetch_array($sql)) {
		$username = $data['username'];
		$foto_ava = $data['foto_ava'];
		$sqltampil = mysqli_query($koneksi, "select * from tbl_booking_host where username like '$sesi'");
		$tampilorder = mysqli_fetch_array($sqltampil);
		$id_order = $tampilorder['id_order'];

?>
	<main>
		<?php include('backend/layout/menu.php');?>
		<section class="host-user">
			<center>
				<img class="host-user-bulat-kecil" src="user/ava.png">
					<?php //echo $username."/".$foto_ava;?>
				<br>
				<h3 style="margin-top:0px;"><?php echo $username?></h3>
				<img class="host-user-verified" src="backend/asset/img/verified.png">
			</center>
		</section>
		<section class="host-content">
		<div class="content">
			<div class="header-host">
				<h2>Pemesanan anda</h2>
			</div>
			<div class="deskripsi-host">
			<?php if ($id_order == NULL) {
			?>
			<h3>Anda tidak mempunyai pemesanan</h3>
			<?php
			} else {
			?>
			<h3><a style="color:#FBC02D;" href="order.php?id=<?php echo $id_order?>"><?php echo $id_order?></a></h3>
			<?php
			}
			?>
			</div>
		</div>
		</section>
	</main>
<?php 
}
include('backend/layout/footer.php');?>