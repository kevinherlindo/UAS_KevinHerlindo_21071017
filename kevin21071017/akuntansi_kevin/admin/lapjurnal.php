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
include "../config/koneksi.php";

echo"<center><h1>Laporan Jurnal Umum</h1></center>";


echo"<table border='1' width='75%' align='center'>
<tr>
<th style='text-align:center'>No</th>
<th style='text-align:center;widht:5%'>No Perkiraan</th>
<th style='text-align:center;widht:60%'>Nama Perkiraan</th>
<th style='text-align:right'>Debet</th>
<th style='text-align:right'>Kredit</th>
</tr>";
$tampil =mysqli_query($koneksi, "select * from hjurnal");
while($data=mysqli_fetch_array($tampil)){

echo"<tr style='background:purple;color:white'>
<td colspan='7'>$data[JurnalKode] - $data[TanggalSelesai]</td>
</tr>";
   $sql =mysqli_query($koneksi, "select * from djurnal where JurnalKode='$data[JurnalKode]'");
   while($r=mysqli_fetch_array($sql)){
    $namaakun =mysqli_fetch_array(mysqli_query($koneksi, "select * from perkiraan where NomorPerkiraan='$r[NomorPerkiraan]'"));
    $no++;
    echo"<tr>
    <td style='text-align:center'>$no</td>
    <td style='text-align:center'>$r[NomorPerkiraan]</td>
    <td>$namaakun[NamaPerkiraan]</td>
    <td style='text-align:right'>".number_format($r[debet])."</td>
    <td style='text-align:right'>".number_format($r[kredit])."</td>
    </tr>";

}
}
echo"</table>";


?>

<script>
		window.print();
	</script>