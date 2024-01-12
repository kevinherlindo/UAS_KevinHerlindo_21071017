<?php 
//error_reporting(0);
include"config/koneksi.php";

	$sqldel=mysqli_query($koneksi, "delete from t_user 
	where id_user='$_GET[id]'");
	echo"<script>document.location='?module=user'</script>";	 			


?>