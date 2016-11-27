<?php 
	include('backend/layout/head.php');
	$sesi = $_SESSION['username'];
?>
	<main>
		<div class="welcome">
			<h1>Selamat Datang Kembali, <?php echo $sesi?></h1>
		</div>
		<div class="menu">
			<ul>
				<li>Host Saya</li>
				<!--Test Commit-->
			</ul>
		</div>
	</main>
<?php include('backend/layout/footer.php');?>