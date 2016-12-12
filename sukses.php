<?php include('backend/layout/head.php'); 
	if ($_SESSION['login'] == false){
		header("location:masuk.php");
	}
$id = $_GET['id'];
$query = "select * from tbl_booking_host inner join tbl_pengguna on tbl_booking_host.username = tbl_pengguna.username inner join tbl_host on tbl_booking_host.id_host = tbl_host.id_host where id_order=$id ";
$sql = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($sql)) {
	$id_order = $data['id_order'];
	$nama_host = $data['nama_host'];
	$username = $data['username'];
	$harga = $data['harga_host'];
	$tgl_checkin = $data['tgl_checkin'];
	$tgl_checkout = $data['tgl_checkout'];
	$pemesan = $_SESSION['username'];
?>
	<main>
		<center><h1 class="judul-sukses"><h1>Pemesanan Sukses!</h1></center>
		<p class="konten-sukses">
			Pemesanan anda sukses dengan nomor order <b><i><?php echo $id?></i></b>.<br>Silahkan simpan/<i>Screenshot</i> rincian pembayaran ini sebagai bukti telah memesan sebuah host.<br>
			berikut rincian pemesanan anda:
			<center>
			<table class="rincian-order">
					<tr>
						<td>Nomor Order</td>
						<td><?php echo $id_order ?></td>
					</tr>
					<tr>
						<td>Nama Host</td>
						<td><?php echo $nama_host ?></td>
					</tr>
					<tr>
						<td>Pemilik Host</td>
						<td><?php echo $username ?></td>
					</tr>
					<tr>
						<td>Harga (per-malam)</td>
						<td>IDR<?php echo $harga ?></td>
					</tr>
					<tr>
						<td>Tanggal Check in</td>
						<td><?php echo $tgl_checkin ?></td>
					</tr>
					<tr>
						<td>Tanggal Check out</td>
						<td><?php echo $tgl_checkout ?></td>
					</tr>
					<tr>
						<td>Pemesan</td>
						<td><?php echo $pemesan ?></td>
					</tr>
			</table>
			</center>
		</p>
	</main>
<?php 
}
include('backend/layout/footer.php'); ?>