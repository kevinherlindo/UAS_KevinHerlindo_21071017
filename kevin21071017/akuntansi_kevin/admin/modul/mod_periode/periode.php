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
echo"<h1>Informasi Data Periode</h1>";

echo"<a href='?module=AddPeriode'>Tambah Data</a>";
echo"<table border='1' width='100%'>
<tr style=background:purple;color:white>
<td>No</td>
<td>Periode</td>
<td>Tanggal Mulai</td>
<td>Aksi</td>
</tr>";
$sql=mysqli_query($koneksi, "select * from t_periode");
while($data=mysqli_fetch_array($sql)){
$no++;	
	echo"<tr>
	<td>$no</td>
	<td>$data[Periode]</td>
	<td>$data[TanggalMulai]</td>
	<td><a href='?module=DelPeriode&id=$data[Periode]'>Del</a></td>
	</tr>";
}
echo"</table>";
?>