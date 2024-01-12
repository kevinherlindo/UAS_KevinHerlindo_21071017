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
		<h2>Laporan >> Neraca Lajur </h2> 
		<fieldset style="border:solid 2px #ccc;">
			<legend><strong>WORKSHEET </strong></legend>
			<br />
			
		<table border="1">
		<thead>
			<tr>
				<th rowspan="2" align="center">Nomor Perkiraan</th>
				<th rowspan="2" class=hr>Nama Perkiraan</th>
				<th class=hr ><div align="right">Sisa Saldo</div></th>
				<th class=hr ><div align="right">Sisa Saldo</div></th>
				<th class=hr ><div align="right">Rugi/Laba</div></th>
				<th class=hr ><div align="right">Rugi/Laba</div></th>
				<th class=hr ><div align="right">Neraca</div></th>
				<th class="rounded-q4" ><div align="right">Neraca</div></th>
			</tr>
			<tr>
				<th ><div align="right">Debet</div></th>
				<th ><div align="right">Kredit</div></th><th ><div align="right">Debet</div></th><th > <div align="right">Kredit</div></th><th ><div align="right">Debet</div></th><th ><div align="right">Kredit</div></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query_mutasi=mysqli_query($koneksi, "select * from tabel_akuntansi_master order by nomor_perkiraan asc");
			$total=mysqli_fetch_array(mysqli_query($koneksi, "select sum(sisa_debet) as tot_sisa_debet, sum(sisa_kredit) as tot_sisa_kredit, sum(rl_debet) as tot_rl_debet,  sum(rl_kredit) as tot_rl_kredit,
								sum(nrc_debet) as tot_nrc_debet, sum(nrc_kredit) as tot_nrc_kredit from tabel_akuntansi_master order by nomor_perkiraan asc"));
			
			while($row_mut=mysqli_fetch_array($query_mutasi)){
			
				$sisa_debet		=$row_mut['sisa_debet'];
				$sisa_kredit	=$row_mut['sisa_kredit'];
				$rl_debet		=$row_mut['rl_debet'];
				$rl_kredit		=$row_mut['rl_kredit'];
				$nrc_debet		=$row_mut['nrc_debet'];
				$nrc_kredit		=$row_mut['nrc_kredit'];
			
				?>
				<tr>
					<td><div align="center"><?php echo $row_mut['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_mut['nama_perkiraan'];?></td>
					<td align="right"><?php echo number_format($sisa_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sisa_kredit,2,'.',','); ?></td>	
					<td align="right"><?php echo number_format($rl_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($rl_kredit,2,'.',','); ?></td>	
					<td align="right"><?php echo number_format($nrc_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($nrc_kredit,2,'.',','); ?></td>					
				</tr>
				<?php
			}
			?>
		</tbody>
		
		<tfoot>
			<tr>
				<td class='rounded-foot-left' colspan="2"><div align="center"><strong>TOTAL</strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_sisa_debet'],2,'.',','); ?></strong></div></td><td><div align="right"><strong><?php echo number_format($total['tot_sisa_kredit'],2,'.',','); ?></strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_rl_debet'],2,'.',','); ?></strong></div></td><td><div align="right"><strong><?php echo number_format($total['tot_rl_kredit'],2,'.',','); ?></strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_nrc_debet'],2,'.',','); ?></strong></div></td><td class='rounded-foot-right' ><div align="right"><strong><?php echo number_format($total['tot_nrc_kredit'],2,'.',','); ?></strong></div></td>
			</tr>
		</tfoot>
		
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