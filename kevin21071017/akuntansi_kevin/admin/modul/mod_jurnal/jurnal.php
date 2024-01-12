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
if ($_GET[act]==''){
echo"<b style='color:purple;font-size:30px'>Jurnal Umum</b>";
echo"<h3><a href='hery.php?module=jurnal&act=tambahdata'>Tambah Data</a></h3>";
echo"<table border='1' id='example1' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
<thead>
<tr style='background-color:purple;color:white'>
<td style='text-align:center'>No</td>
<td style='text-align:center'>Jurnal Kode</td>
<td style='text-align:center'>Nomor Jurnal</td>
<td style='text-align:center'>Tanggal Selesai</td>
<td style='text-align:center'>Aksi</td>
</tr>
</thead>
<tbody>
";
$tampil=mysqli_query($koneksi, "select * from tabel_akuntansi_jurnal_umum");
while($data=mysqli_fetch_array($tampil)){
	$no++;
	echo"<tr>
	<td style='text-align:center'>$no</td>
	<td style='text-align:center'>$data[kode_jurnal]</td>
	<td style='text-align:center'>$data[nomor_jurnal]</td>	
	<td style='text-align:center'>".date('d-m-Y', strtotime($data[tanggal_selesai]))."</td>
	<td style='text-align:center'>
	<a href='hery.php?module=jurnal&act=editdata&NomorJurnal=$data[nomor_jurnal]'>Edit</a> |
		<a href='hery.php?module=jurnal&act=lihatdata&JurnalKode=$data[kode_jurnal]'>Lihat Data</a> |
	<a href='hery.php?module=jurnal&hapus=$data[NomorJurnal]'>Del</a> | 
	</td>
	</tr>";
}
echo"</table>";

if ($_GET[hapus]){
		mysqli_query($koneksi, "delete from tabel_akuntansi_jurnal_umum where nomor_jurnal='$_GET[hapus]'");	
    echo"<script>document.location='hery.php?module=jurnal'</script>";
}
}

elseif($_GET[act]=='tambahdata'){
if (isset($_POST[simpan])){
	$JurnalKode				=$_POST['JurnalKode'];
	$TanggalTransaksi		=$_POST['TanggalTransaksi'];
	$Keterangan				=ucwords($_POST['Keterangan']);
	$NomorPerkiraan			=$_POST['NomorPerkiraan'];
		
	if($_POST['posisi']=="d"){
		$debet=$_POST['jumlah'];
	}else if($_POST['posisi']=="k"){
		$kredit=$_POST['jumlah'];
	}
		
	if(!empty($debet) && !empty($kredit)){
		echo"<script>document.location='hery.php?module=jurnal'</script>";
	}else{		
	    $sql=mysqli_query($koneksi, "insert into tabel_akuntansi_transaksi
									(kode_jurnal,
									nomor_perkiraan,
									tanggal_transaksi, 
									bulan_transaksi, 
									jenis_transaksi, 
									keterangan_transaksi,
									debet, 
									kredit)
									 values('$JurnalKode',
											'$NomorPerkiraan',
											'$TanggalTransaksi',
											'$bulan',
											'Jurnal Umum',
											'$Keterangan',
											'$debet',
											'$kredit')");		
	}

}else{
	unset($_POST['simpan']);
}

if($_GET['modulee']=='cancel'){
	$id_cancel=$_GET['id'];
	mysqli_query($koneksi, "DELETE FROM tabel_akuntansi_transaksi WHERE id_transaksi='$id_cancel'");
	echo"<script>document.location='hery.php?module=jurnal&act=tambahdata'</script>";
}


if(isset($_POST['selesai'])){	
	$JurnalKode		=$_POST['JurnalKode'];
	$NomorJurnal	=$_POST['NomorJurnal'];
	$TanggalSelesai	=$_POST['TanggalSelesai'];
	$tot_debet		=$_POST['tot_debet'];
	$tot_kredit		=$_POST['tot_kredit'];
	
	if($tot_debet==$tot_kredit){
		$qjurnal=mysqli_query($koneksi, "insert into tabel_akuntansi_jurnal_umum(nomor_jurnal,
												  kode_jurnal,
												  tanggal_selesai) 
										   values('$NomorJurnal',
												  '$JurnalKode',
												  '$TanggalSelesai')");
	    echo"<script>document.location='hery.php?module=jurnal'</script>";
	}else{
	    echo"<script>document.location='hery.php?module=jurnal'</script>";	
	}	

}else{
	unset($_POST['selesai']);
}
//echo"<script>document.location='hery.php?module=jurnal'</script>";				


$jurnal_umum	=mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(nomor_jurnal) 
										FROM tabel_akuntansi_jurnal_umum ORDER BY tanggal_selesai DESC"));
$NomorJurnal	=$jurnal_umum[0]+1;
$JurnalKode		="JU/".$NomorJurnal;
$tanggal		=date('Y-m-d');		
$Keterangan	    =$_POST['Keterangan'];	
$jumlah 		=$_POST['jumlah'];

echo"<form action='' method='POST'>
<b style='color:purple;font-size:30px'>Jurnal Umum</b>
<p></p> 
<table align='left'>
<tr>
<td valign='top' width=500>
<table  cellspacing='0' width='100%'>
<tr>
<td width=180px>Tanggal</td>
<td>
<input type='text' name='TanggalTransaksi'  value='$tanggal'>
</td>
</tr>

<tr>
<td>No. Jurnal</td>
<td>
<input type='text' name='JurnalKode' value='$JurnalKode'>
</td>
</tr>

<tr>
<td>Perkiraan</td>
<td>
<select name='NomorPerkiraan'>";
	$sql=mysqli_query($koneksi, "select * from tabel_akuntansi_master order by kelompok asc");
	while($data=mysqli_fetch_array($sql)){
		$NamaPerkiraanx = strtolower($data[nama_perkiraan]); //strtoupper($kalimat);
		$NamaPerkiraan	= ucwords($NamaPerkiraanx);
		$Kelompokx = strtolower($data[kelompok]); //strtoupper($kalimat);
		$Kelompok	= ucwords($Kelompokx);
		echo"<option value='$data[nomor_perkiraan]'> $NamaPerkiraan - $data[nomor_perkiraan]  ($Kelompok)</option>";	
	}
echo"</select>
</td>
</tr>

<tr>
<td>Keterangan</td>
<td><textarea name='Keterangan' cols='50' value='$Keterangan'>$Keterangan</textarea></td>
</tr>

<tr>
<td>Jumlah</td>
<td ><input type='text' style='text-align:right' name='jumlah' value='$jumlah' required></td>
</tr>";

	if($_POST['posisi']=="d"){ 
		$posisi="k";
	}

	if($_POST['posisi']=="k"){ 
		$posisi="d";
	}

echo"<tr>
<td>D/K</td>
<td>
<input type='text' name='posisi' size='1' value='$posisi' required>
</td>
</tr>

<tr>
<td><input type='submit' value='Simpan' name='simpan'></td>
</tr>

</table>
<br>	
</td>

</tr>
</table>
<font color='#FF0000'>".ucwords($_GET['status'])."<blink></blink></font>
        
        
<table border='1' id='example1' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
<thead>
<tr style='background-color:purple;color:white'>
<th style='width:100px'>No Perkiraan</th>
<th style='width:150px'>Nama Perkiraan</th>
<th style='width:100px'>Keterangan</th>
<th style='text-align:right'>Debet</th>
<th style='text-align:right'>Kredit</th>
<th style='text-align:center'>Action</th>
</tr>
</thead>
<tbody>";

$query=mysqli_query($koneksi, "SELECT * FROM tabel_akuntansi_transaksi 	
					WHERE kode_jurnal='$JurnalKode' 
					ORDER BY tanggal_transaksi asc"); //WHERE JurnalKode='$JurnalKode'  
while($row=mysqli_fetch_array($query)){					
$ak=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama_perkiraan FROM tabel_akuntansi_master WHERE nomor_perkiraan='$row[nomor_perkiraan]'"));						

echo"<tr>
<td>$row[nomor_perkiraan]</td>
<td>$ak[nama_perkiraan]</td>
<td>$row[keterangan_transaksi]</td>
<td align='right'>".number_format($row[debet],2,'.',',')."</td>
<td align='right'>".number_format($row[kredit],2,'.',',')."</td>	
<td align='center'><a href='hery.php?module=jurnal&act=tambahdata&modulee=cancel&id=$row[id_transaksi]'> Del </a></td>
</tr>";
}

echo"</tbody>		  				
</table 
</form>	
<table id='example1' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
<tr><td><p></p></td></tr>
<tr>
<td width=308>";


echo"Kas <input type='text' style='text-align:right' value='$tampil_kas (Kas)' disabled='disabled' size='30'>
</td><td width='416'  align='right' >Jml Debet - Kredit</td>";

$total=mysqli_fetch_array(mysqli_query($koneksi, "SELECT sum(debet) as tot_debet, sum(kredit) as tot_kredit 
									FROM tabel_akuntansi_transaksi 
									WHERE kode_jurnal='$JurnalKode'"));
$tot_debet	=$total['tot_debet'];
$tot_kredit	=$total['tot_kredit'];

//selisih
$selisih=$tot_debet-$tot_kredit;

if($tot_debet == $tot_kredit){
	$status="<font color=blue>Balance</font>";
}else{
	$status="<font color=red><blink>Not Balance. Selisih : ".number_format($selisih,0,',','.')."</blink></font>";
}


echo"<td width='485'><input type='text' disabled='disabled' style='text-align:right' size='12' value='".number_format($tot_debet,0,',','.')."'/>&nbsp;
<input type='text' size='12' disabled='disabled' style='text-align:right' value='".number_format($tot_kredit,0,',','.')."' /></td>
</tr>
<tr><td><p></p></td></tr>
<tr>
<td>
<form action='' method='post'>
	<input type='hidden' name='TanggalSelesai' value='$tanggal'>
	<input type='hidden' name='JurnalKode' value='$JurnalKode'>
	<input type='hidden' name='NomorJurnal' value='$NomorJurnal'>
	<input type='hidden' name='tot_debet' value='$tot_debet'>
	<input type='hidden' name='tot_kredit' value='$tot_kredit'>
	<input type='submit' value='Selesai' onClick='return confirm('Apakah Anda yakin ?')' name='selesai'>
</form>
</td>
<td align='left'>
$status
</td>
</tr>
</table>";	
}

elseif($_GET[act]=='lihatdata'){
echo"<b style='color:purple;font-size:30px'>Jurnal Umum</b>";
echo"<table border='1' id='example1' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
<thead>
<tr style='background-color:purple;color:white'>
<td style='text-align:right;width:5%'>No</td>
<td style='text-align:center;width:15%'>Nomor Perkiraan</td>
<td>Nama Perkiraan</td>
<td style='text-align:right'>Debet</td>
<td style='text-align:right'>Kredit</td>
</tr>
</thead>
<tbody>";

$sqp=mysqli_query($koneksi, "select * from tabel_akuntansi_jurnal_umum where kode_jurnal='$_GET[JurnalKode]'");
while($h=mysqli_fetch_array($sqp)){
echo"<tr style='text-align:left;font-size:14px;color:#FFFFFF;font-weight:reguler;background-color:#FF7213;'>
<td colspan='5'>Jurnal Kode: $h[kode_jurnal] - $h[tanggal_selesai]</td>
</tr>";

$no=0;
$tampil=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi where kode_jurnal='$h[kode_jurnal]'");
while($data=mysqli_fetch_array($tampil)){
    $p=mysqli_fetch_array(mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan='$data[nomor_perkiraan]'"));
	$no++;
	echo"<tr> 
	<td style='text-align:center'>$no</td>
	<td style='text-align:center'>$data[nomor_perkiraan]</td>	
	<td>$p[nama_perkiraan]</td>
	<td style='text-align:right'>".number_format($data[debet])."</td>		
	<td style='text-align:right'>".number_format($data[kredit])."</td>	
	</tr>";
}
}
echo"</table>";

}
?>