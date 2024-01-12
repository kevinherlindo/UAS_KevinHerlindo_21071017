<?php
include"config/koneksi.php";
if (isset($_POST[simpan])){
	$sqlsimpan=mysqli_query($koneksi, "insert into t_karyawan
			   (NIK,
				nama,
				alamat,
				telepon)
                values('$_POST[NIK]',
				'$_POST[nama]',
				'$_POST[alamat]',
				'$_POST[telepon]')");
	echo"<script>document.location='?module=karyawan'</script>";	 			
}

echo"<h1>Tambah Data Karyawan</h1>";
echo"<form action='' method='POST'>
<table border='0' >
<tr>
<td>NIK</td><td><input type='text' name='NIK'></td>
</tr>
<tr>
<td>Nama Karyawan </td><td><input type='text' name='nama'></td>
</tr>
<tr>
<td>Alamat Karyawan</td><td><input type='text' name='alamat'></td>
</tr>
<tr>
<td>NoHp Karyawan </td><td><input type='text' name='Telepon'></td>
</tr>

<tr>
<td><input type='submit' name='simpan' value='Kirim'></td>
</tr>
</table>
</form>";

?>