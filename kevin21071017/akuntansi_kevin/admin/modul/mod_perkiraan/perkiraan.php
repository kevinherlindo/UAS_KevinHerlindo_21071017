<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
<style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    </style>
  </head>

<?php
error_reporting(0);
include"config/koneksi.php";
echo"<h1><b style='color:purple'>Informasi Data Perkiraan</b></h1><br>";

echo"<h3><a href='?module=AddPerkiraan'>Tambah Data</a></h3>";

echo"<table border='1' width='100%'>
<tr style=background:purple;color:white>
<td style='width:2%;text-align:center;font-weight:bold'>No</td>
<td style='width:8%;text-align:center;font-weight:bold'>No<br>Akun</td>
<td style='font-weight:bold'>Nama Perkiraan</td>
<td style='font-weight:bold'>Tipe</td>
<td style='font-weight:bold'>Induk</td>
<td style='font-weight:bold'>Level</td>
<td style='font-weight:bold;text-align:center;'>Kelompok</td>
<td style='font-weight:bold;text-align:center;'>Awal Debet</td>
<td style='font-weight:bold;text-align:center;'>Awal Kredit</td>
<td style='font-weight:bold'>Normal</td>

<td style='font-weight:bold'>Aksi</td>
</tr>";
$sql=mysqli_query($koneksi, "select * from tabel_akuntansi_master");
while($data=mysqli_fetch_array($sql)){
  $NamaPerkiraanx = strtolower($data[nama_perkiraan]); //strtoupper($kalimat);
  $NamaPerkiraan	= ucwords($NamaPerkiraanx);
$no++;	
	echo"<tr>
	<td style='text-align:center'>$no</td>
	<td style='text-align:center'>$data[nomor_perkiraan]</td>
	<td>$NamaPerkiraan</td>
  <td>$data[tipe]</td>
  <td style='text-align:center'>$data[induk]</td>
  <td style='text-align:center'>$data[level]</td>
  <td style='text-align:center'>$data[kelompok]</td>
  <td style='text-align:right'>".number_format($data[awal_debet],2,'.',',')." </td>
  <td style='text-align:right'>".number_format($data[awal_kredit])."</td>
  <td style='text-align:center'>$data[normal]</td>
	<td><a href='?module=DelPerkiraan&id=$data[nomor_perkiraan]'>Del</a></td>
	</tr>";
}
echo"</table>";
?>