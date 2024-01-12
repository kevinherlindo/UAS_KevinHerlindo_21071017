<?php
error_reporting(0);
include"config/koneksi.php";
echo"<h1>Informasi Data Perkiraan</h1>";

echo"<a href='AddPerkiraan.php'>Tambah Data</a>";
echo"<table border='1' width='50%'>
<tr style=background:purple;color:white>
<td>No</td>
<td>Nomor Perkiraan</td>
<td>Nama Perkiraan</td>
<td>Aksi</td>
</tr>";
$sql=mysqli_query($koneksi, "select * from t_perkiraan");
while($data=mysqli_fetch_array($sql)){
$no++;	
	echo"<tr>
	<td>$no</td>
	<td>$data[NomorPerkiraan]</td>
	<td>$data[NamaPerkiraan]</td>
	<td><a href='DelPerkiraan.php?id=$data[NomorPerkiraan]'>Del</a></td>
	</tr>";
}
echo"</table>";
?>