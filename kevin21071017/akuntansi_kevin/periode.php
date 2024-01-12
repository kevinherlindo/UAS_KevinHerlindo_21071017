<?php
error_reporting(0);
include"config/koneksi.php";
echo"<h1>Informasi Data Periode</h1>";
echo"<table border='1' width='50%'>
<tr style=background:purple;color:white>
<td>No</td>
<td>Periode</td>
<td>Tanggal Mulai</td>
<td>Tanggal Selesai</td>
<td>Keterangan</td>
</tr>";
$sql=mysqli_query($koneksi, "select * from t_periode");
while($data=mysqli_fetch_array($sql)){
$no++;	
	echo"<tr>
	<td>$no</td>
	<td>$data[Periode]</td>
	<td>$data[TanggalMulai]</td>
	<td>$data[TanggalSelesai]</td>
	<td>$data[Keterangan]</td>
	</tr>";
}
echo"</table>";
?>