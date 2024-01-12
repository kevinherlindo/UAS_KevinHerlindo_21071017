<?php
include "config/koneksi.php";

$username = $_POST['username'];
$pass     = $_POST['password'];

$login  = mysqli_query($koneksi, "SELECT * FROM t_user WHERE user_name = '$username' AND password = '$pass'");
$ketemu = mysqli_num_rows($login);
$r		= mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
	session_start();
	
	$_SESSION[id_user]		= $r[id_user];
	$_SESSION[user_name]     = $r[user_name];
	$_SESSION[password]		= $r[password];
	$_SESSION[level]		= $r[level];
	
	header('location:admin/hery.php?module=home');
}
else{
	echo "<link href=css/login.css rel=stylesheet type=text/css>";
	echo "<center>LOGIN GAGAL! <br> 
			Username atau Password Anda tidak benar.<br>
			Atau account Anda sedang diblokir.<br>";
			echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>