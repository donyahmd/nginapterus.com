<?php
	function jikabelumlogin() {
		if ($_SESSION['login'] == false){
			header("location:masuk.php");
		}
	}
	function jikasudahlogin(){
		if (isset($_SESSION['login']) == true){
			header("location:beranda.php");
		}
	}
?>