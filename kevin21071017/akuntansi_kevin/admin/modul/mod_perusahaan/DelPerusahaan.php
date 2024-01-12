<?php 
//error_reporting(0);
include"config/koneksi.php";

	$sqldel=mysqli_query($koneksi, "delete from t_perkiraan 
	where NomorPerkiraan='$_GET[id]'");
	echo"<script>document.location='?module=perkiraan'</script>";	 			


?>