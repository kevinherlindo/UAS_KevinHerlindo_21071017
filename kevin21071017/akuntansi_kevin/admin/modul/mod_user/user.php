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
echo"<h1>Informasi Data User</h1><br>";

echo"<h3><a href='?module=AddUser'>Tambah Data</a></h3>";

echo"<table border='1' width='100%'>
<tr style=background:purple;color:white>
<td>No</td>
<td>Usernama</td>
<td>Level</td>
<td>Aksi</td>
</tr>";
$sql=mysqli_query($koneksi, "select * from t_user");
while($data=mysqli_fetch_array($sql)){
$no++;	
	echo"<tr>
	<td>$no</td>
	<td>$data[user_name]</td>
	<td>$data[level]</td>
	<td><a href='?module=DelUser&id=$data[id_user]'>Del</a></td>
	</tr>";
}
echo"</table>";
?>