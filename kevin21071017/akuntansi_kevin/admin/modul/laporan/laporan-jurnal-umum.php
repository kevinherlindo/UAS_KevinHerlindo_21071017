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
//error_reporting(0);
include"config/koneksi.php";
?>

<h2>Laporan >> Laporan Jurnal Umum </h2> 
<p>&nbsp;</p>
<fieldset style="border:solid 2px #ccc;">
<legend><strong>PERIODE : </strong></legend>

<form action="" method="GET">
<input type="hidden" name='module' value='lapjurnalumum'>
<table width='50%' align="right">
	<tr style="background:purple;color:white">
		<?php
		$query_tanggal=mysqli_fetch_array(mysqli_query($koneksi,"select min(TanggalTransaksi) as tanggal_pertama from tabel_akuntansi_transaksi"));
		$tanggal_pertama=$query_tanggal['tanggal_pertama'];
		?>

		<td>Periode</td>
		<td>
			<input type='text' size="10" name="tanggal1" value="<?php echo $_GET[tanggal1] ?>">
		</td>
	
		<td>s/d</td>
		<td>
			<input type='text' size="10" name="tanggal2" value="<?php echo $_GET[tanggal2] ?>">
		</td>

		<td colspan="4">
			<input type="submit" name="tampilkan" value="Lihat"/>
		</td>
	</tr>
</table>
<br>
</form>	






<?php 
if(isset($_GET['tampilkan'])){
	$tanggal1=$_GET['tanggal1'];
	$tanggal2=$_GET['tanggal2'];

	$query=mysqli_query($koneksi,"select * from tabel_akuntansi_transaksi where  jenis_transaksi='Jurnal Umum'  order by tanggal_transaksi asc");//and TanggalTransaksi between '$tanggal1' and '$tanggal2' order by TanggalTransaksi asc
	$total=mysqli_fetch_array(mysqli_query($koneksi,"select sum(debet) as tot_debet, sum(kredit) as tot_kredit from tabel_akuntansi_transaksi where ".$q_user." jenis_transaksi='Jurnal Umum' and tanggal_transaksi between '$tanggal1' and '$tanggal2' order by nomor_perkiraan asc")); //and TanggalTransaksi between '$tanggal1' and '$tanggal2'

}else{
	unset($_GET['tampilkan']);
	
	$query=mysqli_query($koneksi,"select * from tabel_akuntansi_transaksi where jenis_transaksi='Jurnal Umum' order by tanggal_transaksi asc");
	$total=mysqli_fetch_array(mysqli_query($koneksi,"select sum(debet) as tot_debet, sum(kredit) as tot_kredit from tabel_akuntansi_transaksi where jenis_transaksi='Jurnal Umum' order by nomor_perkiraan asc"));
}
?>

<table border="1" id='rounded-corner' width="100%">
	<tr style="background:purple;color:white;">
		<td width="20" align="center">Tgl<br>Transaksi</td>
		<td width="40" align="center">No<br>Jurnal</th>
		<td width="100" align="center">Tipe</th>
		<td width="75" align="center">No<br>Perkiraan</th>
		<td width="182" >Nama Perkiraan</th>
	
		<td width="114" ><div align="right">Debet</div></th>
		<td width="93" ><div align="right">Kredit</div></th>
		<td align="center">Aksi</td>
	
	</tr>

<?php
while($row=mysqli_fetch_array($query)){
	$tanggal_transaksi=$row['tanggal_transaksi'];
	$kode_jurnal=$row['kode_jurnal'];
	$tipe=$row['jenis_transaksi'];
	$no_prk=$row['nomor_perkiraan'];
	$keterangan=$row['keterangan_transaksi'];
	$debet=$row['debet'];
	$kredit=$row['kredit'];

	
	$query_prk=mysqli_fetch_array(mysqli_query($koneksi,"select nama_perkiraan from tabel_akuntansi_master where nomor_perkiraan='$no_prk'"));
	$nama_prk=$query_prk['nama_perkiraan'];
	

	//$tgl = tgl_indo($TanggalTransaksi);
	?>
	
	<tr>
		<td><?php echo $TanggalTransaksi?></td>
		<td><?php echo $JurnalKode;?></td>
		<td><?php echo $tipe;?></td>
		<td><?php echo $no_prk;?></td>
		<td><?php echo $nama_prk;?></td>
		
		<td><div align="right"><?php echo number_format($debet,2,'.',','); ?></div></td>
		<td><div align="right"><?php echo number_format($kredit,2,'.',','); ?></div></td>

		<td align="center"><a href='lapjurnal.php' target=_BLANK>Cetak</a></td>
		
	</tr>
	<?php
}	
?>

				
	<tr>
		<td class='rounded-foot-left'></td>
		<td colspan="4"><b>TOTAL</b></td>
		<td><div align="right"><strong><?php echo number_format($total['tot_debet'],2,'.',','); ?></strong></div></td>
		<td><div align="right"><strong><?php echo number_format($total['tot_kredit'],2,'.',','); ?></strong></div></td>
		<td class='rounded-foot-right' width=103></td>
	</tr>

</table>


<?php include "footer.php"; ?>