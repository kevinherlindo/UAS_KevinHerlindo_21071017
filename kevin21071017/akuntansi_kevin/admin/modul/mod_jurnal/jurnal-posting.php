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

<?php session_start();
if(isset($_SESSION['id_user']))
{
	$id_user=$_SESSION['id_user'];
	$username=$_SESSION['username'];
	$nama_lengkap=$_SESSION['nama_lengkap'];
	$tanggal_login=$_SESSION['waktu'];
?>	
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	<body onLoad=document.postform.elements['kode'].focus();>
	<?php
		include "config/koneksi-database.php";
		include "config/setup_gl_perkiraan.php";
		include "config/core-akuntansi.php";
	?>
    
    	<?php
	
	if(isset($_GET['posting'])){
		//echo"dd";
		/////////////////////////HITUNG MUTASI/////////////////////
		$tanggal_posting=$tanggal.$jam;
		
		$query=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi where keterangan_posting=''");
		while($row=mysqli_fetch_array($query)){
			$nomor_prk	=$row['nomor_perkiraan'];
			$debet		=$row['debet'];
			$kredit		=$row['kredit'];
			$query_2=mysqli_query($koneksi, "update tabel_akuntansi_master set mut_debet=mut_debet+$debet, mut_kredit=mut_kredit+$kredit where nomor_perkiraan='$nomor_prk'");
		}
	
		if($query){
		
			$query_hitung_sisa=mysqli_query($koneksi, "select  * from tabel_akuntansi_master");
	
			while($row_hit_sisa=mysqli_fetch_array($query_hitung_sisa)){
				$normal				=$row_hit_sisa['normal'];
				$awal_debet			=$row_hit_sisa['awal_debet'];
				$awal_kredit		=$row_hit_sisa['awal_kredit'];
				$mutasi_debet		=$row_hit_sisa['mut_debet'];
				$mutasi_kredit		=$row_hit_sisa['mut_kredit'];
				$nomor_perkiraan	=$row_hit_sisa['nomor_perkiraan'];
			
				if($normal=="D"){
					$hitung_sisa_debet=($awal_debet+$mutasi_debet)-$mutasi_kredit;
	
					if($hitung_sisa_debet<0){
						$positif_sisa_kredit=abs($hitung_sisa_debet); //abs mengembalikan nilai absolut positif
						$update_mutasi=mysqli_query($koneksi, "update tabel_akuntansi_master set sisa_debet=0, sisa_kredit='$positif_sisa_kredit' where nomor_perkiraan='$nomor_perkiraan'");
					}else{
						$update_mutasi=mysqli_query($koneksi, "update tabel_akuntansi_master set sisa_debet='$hitung_sisa_debet', sisa_kredit='0' where nomor_perkiraan='$nomor_perkiraan'");
					}	
				}
				
				if($normal=="K"){
					$hitung_sisa_kredit=($awal_kredit-$mutasi_debet)+$mutasi_kredit;
					
					if($hitung_sisa_kredit<0){
						$positif_sisa_debet=abs($hitung_sisa_kredit);
						$update_mutasi=mysqli_query($koneksi, "update tabel_akuntansi_master set sisa_debet='$positif_sisa_debet', sisa_kredit='0' where nomor_perkiraan='$nomor_perkiraan'");
					}else{
						$update_mutasi=mysqli_query($koneksi, "update tabel_akuntansi_master set sisa_debet=0, sisa_kredit='$hitung_sisa_kredit' where nomor_perkiraan='$nomor_perkiraan'");
					}	
				}
			}
		}else{
			echo mysql_error();
		}
		
		//////////////////////////UBAH STATUS POSTING//////////////////////////////
		$selesai=mysqli_query($koneksi, "update tabel_akuntansi_transaksi set tanggal_posting='$tanggal_posting', keterangan_posting='Post' where keterangan_posting=''");
		
		if($selesai){
			?><script language="javascript">document.location.href="hery.php?module=posting_jurnal"</script><?php
		}else{
			echo mysql_error();
		}
						
	}else{
		unset($_GET['posting']);
	}
	?>

    
	<fieldset style="border:solid 2px #ccc;">
		<legend><strong>Transaksi</strong></legend>	
		<table id='rounded-corner' border="1">
		<thead>
			<tr>
			  <th width="145" class=rounded-company>Tanggal</th>
              <th width="184" class=hr>Kode Transaksi</th>
              <th width="700" class=hr align="left">Nama Rekening</th>
			  <th width="410" class=hr>Keterangan</th>
			  <th width="70" class=hr><div align="right">Debet</div></th>
			  <th width="70" class=hr><div align="right">Kredit</div></th>
			  <th class="rounded-q4" scope="col">Keterangan Posting</th>
		</tr>
		</thead>
		<tbody>
	  <?php
			$query_transaksi=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi transaksi, tabel_akuntansi_master master where transaksi.nomor_perkiraan=master.nomor_perkiraan order by id_transaksi asc");
			while($row_tran=mysqli_fetch_array($query_transaksi)){
				$NamaPerkiraanx = strtolower($row_tran[nama_perkiraan]); //strtoupper($kalimat);
				$NamaPerkiraan	= ucwords($NamaPerkiraanx);
				$debet=$row_tran['debet'];
				$kredit=$row_tran['kredit'];
				?>
				<tr>
                <td><div align="center"><?php echo $row_tran['tanggal_transaksi'];?></div></td>
                <td><div align="center"><?php echo $row_tran['kode_jurnal'];?></div></td>
                <td><div align="left"><?php echo $NamaPerkiraan;?></div></td>
                <td><?php echo $row_tran['keterangan_transaksi'];?></td>
                <td align="right"><?php echo number_format($debet,2,'.',','); ?></td>
                <td align="right"><?php echo number_format($kredit,2,'.',','); ?></td>
                <td align="center"><?php echo $row_tran['keterangan_posting'];?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='6' class='rounded-foot-left'></td>
				<td class='rounded-foot-right'></td>
		  </tr>
		</tfoot>			  				
		</table>
	</fieldset>
	<p></p>
	<fieldset style="border:solid 2px #ccc;">
		<legend><strong>Posting</strong></legend>
		<table border="0" align="center">
		<tr>
			<td width="72" align="center">
			<!---untuk mengakhiri posting dan memberi tanda posting-->
			<?php 
			$cek=mysqli_query($koneksi, "select * from tabel_akuntansi_transaksi where keterangan_posting=''");
			$cek_posting=mysqli_num_rows($cek);
			if($cek_posting!==0){
				?>
				<form action="" method="GET" name="posting">
				<input type="hidden" name='module' value='posting_jurnal'>
				  <input type="submit" name="posting" onClick="return confirm('Apakah Anda Yakin?')" value="POSTING JURNAL" />
			    </form>
			<?php
			}
			?>		  </td>
		</tr>
		<tr>
			<td width="601" align="center">
			<font face="verdana" color="#0066FF">
			<?php
			echo $page=$_GET['status'];
			?>
			</font>			
            </td>
		</tr>
		</table>
	</fieldset>
	</body>
	</html>	
<?php 
}else{
	echo "Forbidden Access!";
}
?>