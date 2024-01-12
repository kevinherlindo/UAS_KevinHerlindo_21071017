<?php 
error_reporting(0);
include"config/koneksi.php";
if (isset($_POST[simpan])){
	$sqlsimpan=mysqli_query($koneksi, "insert into t_periode
			   (Periode,
				TanggalMulai)
		 values('$_POST[Periode]',
				'$_POST[TanggalMulai]')");
	echo"<script>document.location='?module=periode'</script>";	 			
}

echo"<h1>Tambah Data Periode</h1>";
echo"<form action='' method='POST'>
<table border='0' >
<tr>
<td>Periode </td><td><input type='text' name='Periode'></td>
</tr>
<tr>
<td>Tanggal Mulai</td><td><input type='text' name='TanggalMulai'></td>
</tr>
<tr>
<td>Tanggal Selesai </td><td><input type='text' name='TanggalSelesai'></td>
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