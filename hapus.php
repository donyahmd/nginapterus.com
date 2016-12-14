<?php
include('backend/php/koneksi.php');
session_start();
jikabelumlogin();
$id = $_GET['id'];
$sesi = $_SESSION['username'];
$query = "delete FROM tbl_host where id_host=$id and username like '$sesi'";
$sql = mysqli_query($koneksi,$query);
header("location:hostsaya.php");
?>