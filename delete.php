<?php
include('backend/php/koneksi.php');
session_start();
$id = $_GET['id'];
$sesi = $_SESSION['username'];
$query = "delete FROM tbl_host where id_host=$id and username like '$sesi'";
$sql = ($koneksi,$query);
header("location:hostsaya.php");
?>