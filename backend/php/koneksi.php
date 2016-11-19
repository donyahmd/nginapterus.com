<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_nginapteruscom';
$koneksi = mysqli_connect($host,$user,$pass,$db);

if(!$koneksi){
	die("Tidak dapat menyambung ke database");
}
?>