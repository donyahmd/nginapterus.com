<?php 
	include('backend/php/koneksi.php');
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>NginapTerus</title>
	<link rel="icon" type="image/png" href="backend/asset/img/logo-circle.png">
	<link rel="stylesheet" href="backend/asset/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div class="container">
 	<div class="navbar">
 		<a href="/nginapterus"><img class="logo" src="backend/asset/img/logo.png" alt="Official Logo"></a>
 		<ul>
 			<li><a href="cari.php">CARI</a></li>
 			<li><a href="tentang.php">TENTANG</a></li>
 			<?php
 				if(isset($_SESSION['username'])) { ?>
 				<li><a href="beranda.php" class="nav-user"><?php echo $_SESSION['username'];?></a>
 					<ul>
 						<li><a href="backend/php/logout.php">Logout</a></li>
 					</ul>
 				</li>
			<?php
 				}
 				else { ?>
 				 <li><a href="masuk.php">MASUK</a></li>
 				<li><a href="daftar.php">DAFTAR</a></li>
 			<?php		
 				}
 			?>
 		</ul>
 	</div>
