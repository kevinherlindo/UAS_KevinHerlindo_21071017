<?php 
error_reporting(0);
include"config/koneksi.php";
if (isset($_POST[simpan])){
	$sqlsimpan=mysqli_query($koneksi, "insert into t_perkiraan
			   (NomorPerkiraan,
				NamaPerkiraan,
				Kelompok,
				Keterangan)
		 values('$_POST[NomorPerkiraan]',
				'$_POST[NamaPerkiraan]',
				'$_POST[Kelompok]',
				'$_POST[Keterangan]')");
	echo"<script>document.location='perkiraan.php'</script>";	 			
}

echo"<h1>Tambah Data Perkiraan</h1>";
echo"<form action='' method='POST'>
<table border='1' >
<tr>
<td>Nomor Perkiraan </td><td><input type='text' name='NomorPerkiraan'></td>
</tr>
<tr>
<td>NamaPerkiraan</td><td><input type='text' name='NamaPerkiraan'></td>
</tr>
<tr>
<td>Kelompok </td><td><input type='text' name='Kelompok'></td>
</tr>
<tr>
<td>Keterangan </td><td><input type='text' name='Keterangan'></td>
</tr>
<tr>
<td><input type='submit' name='simpan' value='Kirim'></td>
</tr>
</table>
</form>";
?>