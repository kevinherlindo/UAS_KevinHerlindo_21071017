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

	<div>
	<h2>Laporan >> Neraca </h2> 
	<fieldset style="border:solid 2px #ccc;">
	<legend><strong>AKTIVA </strong></legend>
	<br />	
	
	<!----------------------------AKTIVA--------------------------------->
	<table align="left" width="100%" border="1">
	<tr>
		<td align="center" colspan="3">
		<table  width="100%" border="1">
		<thead>
			<tr>
				<th width="100" class=rounded-company ><div align="center">Nomor Perkiraan</div></th>
				<th class=hr width="250" ><div align="center">Nama Perkiraan</div></th>
				<th width="100" class=hr><div align="right">DEBET</div></th>
				<th class="rounded-q4" width="100" ><div align="right">KREDIT</div></th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td><div align="center"><strong>1</strong></div></td>
				<td colspan="4"><strong>AKTIVA LANCAR</strong></td>			
			</tr>		
			<!----------------------------ASET LANCAR-------------------------------->
			<?php 
			$q_lancar=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '10' and '199' order by nomor_perkiraan asc");
			$sum_lancar=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '10' and '199'"));
			$lancar_debet=$sum_lancar['debet'];
			$lancar_kredit=$sum_lancar['kredit'];
			while($row_lancar=mysqli_fetch_array($q_lancar)){
			?>
			<tr>
				<td><div align="center"><?php echo $row_lancar['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_lancar['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_lancar['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_lancar['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td><td><strong>TOTAL AKTIVA LANCAR</strong></td>
				<td align="right"><strong><?php echo number_format($tot_lancar=$lancar_debet-$lancar_kredit,2,'.',','); ?></strong></td>
				<td align="right"><strong></strong></td>					
			</tr>
			
			
			<!----------------------------ASET TIDAK LANCAR-------------------------------->
			<tr>
				<td><div align="center"><strong>2</strong></div></td>
				<td colspan="4"><strong>PENYERTAAN & IVEST. JK PJG</strong></td>			
			</tr>
			<?php //maksimum sampai nomor perkiraan 413 untuk penlancaran usaha
			$q_tdk_lancar=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '20' and '299' order by nomor_perkiraan asc");
			$sum_tdk_lancar=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '20' and '299'"));
			$tdk_lancar_debet=$sum_tdk_lancar['debet'];
			$tdk_lancar_kredit=$sum_tdk_lancar['kredit'];
			while($row_tdk_lancar=mysqli_fetch_array($q_tdk_lancar)){
			?>
			<tr>
				<td><div align="center"><?php echo $row_tdk_lancar['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_tdk_lancar['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_tdk_lancar['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_tdk_lancar['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td><td><strong>PENYERTAAN & IVEST. JK PJG</strong></td>
				<td align="right"><strong><?php echo number_format($tot_tdk_lancar=$tdk_lancar_debet-$tdk_lancar_kredit,2,'.',','); ?></strong></td>
				<td align="right"><strong></strong></td>					
			</tr>
            
            
            
            <tr>
				<td><div align="center"><strong>3</strong></div></td>
				<td colspan="4"><strong>AKTIVA TETAP</strong></td>			
			</tr>
			<?php //maksimum sampai nomor perkiraan 413 untuk pentetapan usaha
			$q_tdk_tetap=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '30' and '399' order by nomor_perkiraan asc");
			$sum_tdk_tetap=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '30' and '399'"));
			$tdk_tetap_debet=$sum_tdk_tetap['debet'];
			$tdk_tetap_kredit=$sum_tdk_tetap['kredit'];
			while($row_tdk_tetap=mysqli_fetch_array($q_tdk_tetap)){
			?>
			<tr>
				<td><div align="center"><?php echo $row_tdk_tetap['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_tdk_tetap['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_tdk_tetap['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_tdk_tetap['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td><td><strong>AKTIVA TETAP</strong></td>
				<td align="right"><strong><?php echo number_format($tot_tdk_tetap=$tdk_tetap_debet-$tdk_tetap_kredit,2,'.',','); ?></strong></td>
				<td align="right"><strong></strong></td>					
			</tr>
            
			<?php
            $sum_aktiva=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet from tabel_akuntansi_master where nomor_perkiraan between '1' and '399'"));
            $debet_aktiva=$sum_aktiva['debet'];
            ?>
        
		</tbody>
		<tfoot>
			<tr>
				<td class='rounded-foot-left' colspan="2"><strong>TOTAL AKTIVA</strong></td>   
				<td><div align="right"><strong><?php echo number_format($total_aktiva=$debet_aktiva,2,'.',','); ?></strong></div></td>
				<td class='rounded-foot-right'><div align="right"><strong></strong></div></td>
			</tr>
		  </table>
		</tfoot>
		</td>
	</tr>
	</table>
	</fieldset>
	</div>
	<br />
	
	
	

	<div>
	<fieldset style="border:solid 2px #ccc;">
	<legend><strong>PASIVA</strong></legend>
	<br />
	<!----------------------------PASIVA--------------------------------->
	<table align="left" width="100%" border="1">
	<tr>
		<td align="center" colspan="3">
		<table  width="100%" border="1">
		<thead>
			<tr>
				<th width="100" class=rounded-company ><div align="center">Nomor Perkiraan</div></th>
				<th class=hr width="250" ><div align="center">Nama Perkiraan</div></th>
				<th width="100" class=hr><div align="right">DEBET</div></th>
				<th class="rounded-q4" width="100" ><div align="right">KREDIT</div></th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td><div align="center"><strong>4</strong></div></td>
				<td colspan="4"><strong>HUTANG</strong></td>			
			</tr>		
			<!----------------------------KEWAJIBAN-------------------------------->
			<?php //maksimum sampai nomor perkiraan 413 untuk penlancaran usaha
			$q_wjb_lancar=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '40' and '499' order by nomor_perkiraan asc");
			$sum_wjb_lancar=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '40' and '499'"));
			$wjb_lancar_debet=$sum_wjb_lancar['debet'];
			$wjb_lancar_kredit=$sum_wjb_lancar['kredit'];
			while($row_wjb_lancar=mysqli_fetch_array($q_wjb_lancar)){
			?>
			<tr>
				<td><div align="center"><?php echo $row_wjb_lancar['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_wjb_lancar['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_wjb_lancar['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_wjb_lancar['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td>
				<td><strong>TOTAL HUTANG</strong></td>
				<td align="right"><strong></strong></td>
				<td align="right"><strong><?php echo number_format($tot_wjb_lancar=$wjb_lancar_kredit-$wjb_lancar_debet,2,'.',','); ?></strong></td>					
			</tr>
            
            <tr>
				<td><div align="center"><strong>5</strong></div></td>
				<td colspan="4"><strong>MODAL</strong></td>			
			</tr>		
			<!----------------------------KEWAJIBAN-------------------------------->
			<?php //maksimum sampai nomor perkiraan 413 untuk penkekayaanan usaha
			$q_wjb_kekayaan=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '50' and '599' order by nomor_perkiraan asc");
			$sum_wjb_kekayaan=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '50' and '599'"));
			$wjb_kekayaan_debet=$sum_wjb_kekayaan['debet'];
			$wjb_kekayaan_kredit=$sum_wjb_kekayaan['kredit'];
			while($row_wjb_kekayaan=mysqli_fetch_array($q_wjb_kekayaan)){
			?>
			<tr>
				<td><div align="center"><?php echo $row_wjb_kekayaan['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_wjb_kekayaan['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_wjb_kekayaan['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_wjb_kekayaan['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td>
				<td><strong>TOTAL MODAL</strong></td>
				<td align="right"><strong></strong></td>
				<td align="right"><strong><?php echo number_format($tot_wjb_kekayaan=$wjb_kekayaan_kredit-$wjb_kekayaan_debet,2,'.',','); ?></strong></td>					
			</tr>
			
			
            <?php
            $sum_pasiva=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '4' and '599'"));
            $kredit_pasiva=$sum_pasiva['kredit'];
            ?>
        
			
						
		</tbody>
		<tfoot>
			<tr>
				<td class='rounded-foot-left' colspan="2"><strong>TOTAL PASIVA</strong></td>
				<td><div align="right"><strong></strong></div></td>
				<td class='rounded-foot-right'><div align="right"><strong><?php echo number_format($total_pasiva=$kredit_pasiva,2,'.',','); ?></strong></div></td>
			</tr>
		  </table>
		</tfoot>
		</td>
	</tr>
	</table>
			
	</fieldset>
	</div>
	
	<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
	<iframe width=174 height=189 name="gToday:normal:css/calender/agenda.js" id="gToday:normal:css/calender/agenda.js" src="css/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>

<?php 
}else{
	echo "Forbidden Access!";
}
?>