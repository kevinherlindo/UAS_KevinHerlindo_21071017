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

<h2>Laporan >> Laporan Buku Besar </h2> 
<p>&nbsp;</p> 
<fieldset style="border:solid 2px #ccc;">
<legend><strong>PERIODE</strong></legend>

<form action="" method="GET">
<input type="hidden" name='module' value='bukubesar'>

<table width='100%'>
	<tr>
		<?php
		$query_tanggal=mysqli_fetch_array(mysqli_query($koneksi,"select min(TanggalTransaksi) as tanggal_pertama from tabel_akuntansi_transaksi"));
		$tanggal_pertama=$query_tanggal['tanggal_pertama'];
		?>
        <td>Nomor Perkiaan</td>
		<td>
			<input type='text' size="40" name='nomor_perkiraan' value="<?php echo $_GET[nomor_perkiraan] ?>">
		</td>
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
</form>	






<?php 
if(isset($_GET['tampilkan'])){
    $no_prk   =$_GET['nomor_perkiraan'];
	$tanggal1 =$_GET['tanggal1'];
	$tanggal2 =$_GET['tanggal2'];
}else{
	unset($_GET['tampilkan']);
}
?>

<table border="1" id='rounded-corner' width='100%'>
	<tr style="background:purple;color:white">
		<td width="20" align="center">Tanggal</td>
		<td width="40" align="center">No Jurnal</td>
		<td width="100" >Keterangan</td>
		<td width="75" align="center">Kelompok</td>
		<td width="114" ><div align="right">Debet</div></td>
		<td width="93" ><div align="right">Kredit</div></td>
		<td>Saldo</td>	
	</tr>

<tr>
	<td></td>
	<td></td>
	<td>SALDO AWAL</td>
	<td colspan="3"></td>
	<td>
	<?php
	$q_saldo=mysqli_fetch_array(mysqli_query($koneksi, "select awal_debet,awal_kredit from tabel_akuntansi_master where nomor_perkiraan='$no_prk'"));

	if($q_saldo['awal_debet']==0){
		$saldo_awal=$q_saldo['awal_debet'];
		echo number_format($saldo_awal,2,'.',',');
	}else{
		$saldo_awal=$q_saldo['awal_debet'];
		echo number_format($saldo_awal,2,'.',',');
	}
	?>
	</td>
</tr>	      			
	<?php
	
	$query=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi where  nomor_perkiraan='$no_prk' and tanggal_transaksi between '$tanggal1' and '$tanggal2' order by tanggal_transaksi asc"); //tanggal_transaksi between '$tanggal1' and '$tanggal2' and
	$total=mysqli_fetch_array(mysqli_query($koneksi, "select sum(debet) as tot_debet, sum(kredit) as tot_kredit from tabel_akuntansi_transaksi where  nomor_perkiraan='$no_prk' order by nomor_perkiraan asc")); //tanggal_transaksi between '$tanggal1' and '$tanggal2' and

	while($row=mysqli_fetch_array($query)){
		$tanggal_transaksi	=$row['tanggal_transaksi'];
		$kode_jurnal		=$row['kode_jurnal'];
		$tipe				=$row['jenis_transaksi'];
		$no_prk				=$row['nomor_perkiraan'];
		$keterangan			=$row['keterangan_transaksi'];
		$debet				=$row['debet'];
		$kredit				=$row['kredit'];
		$id_user			=$row['id_user'];
		
		$query_prk=mysqli_fetch_array(mysqli_query($koneksi, "select nama_perkiraan, kelompok from tabel_akuntansi_master where nomor_perkiraan='$no_prk'"));
		$nama_prk	=$query_prk['nama_perkiraan'];
		$kelompok	=$query_prk['kelompok'];
		?>
		<tr>
			<td><?php echo substr($tanggal_transaksi,0,10);?></td>
			<td><?php echo $kode_jurnal;?></td>
			<td><?php echo $keterangan;?></td>
			<td><?php echo $kelompok;?></td>
			<td><div align="right"><?php echo number_format($debet,2,'.',','); ?></div></td>
			<td><div align="right"><?php echo number_format($kredit,2,'.',','); ?></div></td>
			<td>
			<?php
			//untuk mengurangi saldo awal dengan transaksi
			if($kelompok=="aktiva" || $kelompok=="biaya"){
				//echo "ini aktiva dan biaya";
				$saldo_awal=$saldo_awal+$debet-$kredit;
				echo number_format($saldo_awal,2,'.',',');
			}else{
				//echo "selain itu";
				$saldo_awal=$saldo_awal+$kredit-$debet;
				echo number_format($saldo_awal,2,'.',',');
			}
			?>
			</td>
		</tr>
		<?php
	}	
	?>			
    <tr>
        <td class='rounded-foot-left'></td>
        <td></td>
        <td colspan="2"><b>TOTAL</b></td>
        <td><div align="right"><b><?php echo number_format( $total['tot_debet'],2,'.',','); ?></b></div></td>
        <td><div align="right"><b><?php echo number_format( $total['tot_kredit'],2,'.',','); ?></b></div></td>
        <td class='rounded-foot-right' width=65></td>
    </tr>
</table>


<br>
    <fieldset style="border:solid 2px #ccc;">
	<legend><strong>LAPORAN PERBULAN : </strong></legend>
	<br />
	
	<font color="#0066FF"><center><?php echo $_GET['status'];?></center></font>
	<?php 
	if(isset($_POST['tampilkan'])){
		$no_prk=$_POST['nomor_perkiraan'];
		$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		
		
		if(empty($no_prk)){
			?><script language="javascript">document.location.href="trust.php?pg=content/laporan/x-laporan-buku-besar.html&status=No Perkiraan belum disini"</script><?php
		}else{
			?>
			<table width="377" id='rounded-corner'>

				<tr>
					<td width="141" class=rounded-company>Bulan</td>
				  <td width="107" class=hr><div align="right">Debet</div></td>
				  <td width="113" scope="col" class="rounded-q4"><div align="right">Kredit</div></td>
      </tr>

			<?php
			$query_tanggal_bulan=mysqli_query($koneksi, "select distinct(bulan_transaksi) from tabel_akuntansi_transaksi where tanggal_transaksi between '$tanggal1' and '$tanggal2' order by tanggal_transaksi asc");
			$total_bulan=mysqli_fetch_array(mysqli_query($koneksi, "select sum(debet) as tot_debet, sum(kredit) as tot_kredit from tabel_akuntansi_transaksi where tanggal_transaksi='$tanggal_buku_besar' and nomor_perkiraan='$no_prk' order by tanggal_transaksi asc"));

			while($row_query=mysqli_fetch_array($query_tanggal_bulan)){
				$bulan_transaksi=$row_query['bulan_transaksi'];
				
				$query_per_bulan=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi where bulan_transaksi='$bulan_transaksi' and nomor_perkiraan='$no_prk' order by tanggal_transaksi asc");
				$total_per_bulan=mysqli_fetch_array(mysqli_query($koneksi, "select sum(debet) as tot_debet, sum(kredit) as tot_kredit from tabel_akuntansi_transaksi where bulan_transaksi='$bulan_transaksi' and nomor_perkiraan='$no_prk'"));
	
				while($row_bulan=mysqli_fetch_array($query_per_bulan)){
				
					$tanggal_transaksi_bulan=$row_bulan['tanggal_transaksi'];
					$kode_jurnal_bulan=$row_bulan['kode_jurnal'];
					$tipe_bulan=$row_bulan['jenis_transaksi'];
					$no_prk_bulan=$row_bulan['nomor_perkiraan'];
					$keterangan_bulan=$row_bulan['keterangan_transaksi'];
					$debet_bulan=$row_bulan['debet'];
					$kredit_bulan=$row_bulan['kredit'];
					$id_user_bulan=$row_bulan['id_user'];
					
					$query_prk_bulan=mysqli_fetch_array(mysqli_query($koneksi, "select nama_perkiraan, kelompok from tabel_akuntansi_master where nomor_perkiraan='$no_prk'"));
						$nama_prk_bulan=$query_prk_bulan['nama_perkiraan'];
						$kelompok_bulan=$query_prk_bulan['kelompok'];
					/*
					?>
					<tr>
						<td><?php echo substr($tanggal_transaksi_bulan,0,10);?></td>
						<td><?php echo $kode_jurnal_bulan;?></td>
						<td><?php echo $keterangan_bulan;?></td>
						<td><?php echo $kelompok_bulan;?></td>
						<td><div align="right"><?php echo number_format($debet_bulan,2,'.',','); ?></div></td>
						<td><div align="right"><?php echo number_format($kredit_bulan,2,'.',','); ?></div></td>
					</tr>
					<?php
					*/
				}
				?>
                <tr>
					<td class='rounded-foot-left' width="141">    
                    
                    BULAN 
                    
                    <?php
					$str_tanggal=$tanggal_transaksi_bulan;
					$bulan=substr($str_tanggal,5,2);
					
					switch($bulan){
						case "01";
							$bulan="Januari";
							break;
							
						case "02";
							$bulan="Februari";
							break;
							
						case "03";
							$bulan="Maret";
							break;
							
						case "04";
							$bulan="April";
							break;
							
						case "05";
							$bulan="Mei";
							break;
							
						case "06";
							$bulan="Juni";
							break;
							
						case "07";
							$bulan="Juli";
							break;
							
						case "08";
							$bulan="Agustus";
							break;
							
						case "09";
							$bulan="September";
							break;
							
						case "10";
							$bulan="Oktober";
							break;
							
						case "11";
							$bulan="November";
							break;
							
						case "12";
							$bulan="Desember";
							break;
					}	
					
					echo strtoupper($bulan);
					
					?>
                  </td>
				  <td><div align="right"><?php echo number_format( $total_per_bulan['tot_debet'],2,'.',','); ?></div></td>
				  <td class='rounded-foot-right'><div align="right"><?php echo number_format( $total_per_bulan['tot_kredit'],2,'.',','); ?></div></td>
			  </tr>
                <?php
			}

			
			?>
			
				<tr>
					<td class='rounded-foot-left'><b>TOTAL</b></td>
					<td><div align="right"><b><?php echo number_format( $total['tot_debet'],2,'.',','); ?></b></div></td>
					<td class='rounded-foot-right' width=113><div align="right"><b><?php echo number_format( $total['tot_kredit'],2,'.',','); ?></b></div></td>
			  </tr>

			</table>
			
	<?php
		} //penutup if	
		
	}else{
		unset($_POST['tampilkan']);
	}
	?>
	</fieldset>
    
    
	
	<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
	<iframe width=174 height=189 name="gToday:normal:css/calender/agenda.js" id="gToday:normal:css/calender/agenda.js" src="css/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
<?php 

?>

<?php include "footer.php"; ?>