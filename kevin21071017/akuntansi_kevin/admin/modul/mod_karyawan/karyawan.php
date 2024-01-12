<?php
include "config/koneksi.php";

echo "<h1>Informasi Data Karyawan</h1>";
echo"<h3><a href='?module=AddKaryawan'>Tambah Data</a></h3>";
echo"<table border='1' width='100%'>
<tr style=background:purple;color:white>
<td style='width:2%;text-align:center;font-weight:bold'>No</td>
<td style='text-align:center;font-weight:bold'>NIK</td>
<td style='text-align:center;font-weight:bold'>Nama Karyawan</td>
<td style='text-align:center;font-weight:bold'>Alamat Karyawan</td>
<td style='text-align:center;font-weight:bold'>HP Karyawan</td>
<td style='text-align:center;font-weight:bold'>Aksi</td>
</tr>";

$sql=mysqli_query($koneksi, "select * from t_karyawan");
while($data=mysqli_fetch_array($sql)){
$no++;	

echo"<tr>
<td>$no</td>
<td>$data[NIK]</td>
<td>$data[nama]</td>
<td>$data[alamat]</td>
<td>$data[telepon]</td>
<td>
<a href='?module=editkaryawan&id=$data[NIK]'>Edit</a> |
<a href='?module=DelKaryawan&id=$data[NIK]'>Del</a>
</td>
</td>
</tr>
";

}


echo "</table>"

?>