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
	<h2>Laporan >> Neraca Percobaan </h2> 
	<fieldset style="border:solid 2px #ccc;">
	<legend><strong>FORM 1</strong></legend>
	<br />	
	
	<!----------------------------AKTIVA--------------------------------->
    
	<table align="left" width="100%" border="1">
	<tr>
		<td align="center" colspan="3">
		<table id='rounded-corner' width="100%" border="1">
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
				<td><div align="center">1</div></td>
				<td colspan="4">AKTIVA</td>			
			</tr>		
			<!----------------------------ASET LANCAR-------------------------------->
			<?php 
			$q_lancar		=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '10' and '399' order by nomor_perkiraan asc");
			$sum_lancar		=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '10' and '399'"));
			$lancar_debet	=$sum_lancar['debet'];
			$lancar_kredit	=$sum_lancar['kredit'];
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
				<td><div align="right"></div></td><td><strong>TOTAL AKTIVA</strong></td>
				<td align="right"><strong><?php 
				// jika tidak berubah posisi tapi ada nilai min, mana total lancar cukup dengan sum lancar debet
				echo number_format($total_aktiva=$lancar_debet-$lancar_kredit,2,'.',','); ?></strong></td>
				<td align="right"><strong></strong></td>					
			</tr>
			

            
            <tr>
				<td><div align="center">4</div></td>
				<td colspan="4">HUTANG</td>			
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
				<td><div align="right"></div></td><td><strong>TOTAL HUTANG</strong></td>
				<td align="right"><strong></strong></td>
				<td align="right"><strong><?php echo number_format($total_hutang=$wjb_lancar_kredit-$wjb_lancar_debet,2,'.',','); ?></strong></td>					
			</tr>
			

			<tr>
				<td><div align="center">5</div></td>
				<td colspan="4">MODAL</td>			
			</tr>		
			<?php //maksimum sampai nomor perkiraan 413 untuk penlancaran usaha
			$q_modal=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '50' and '599' and nomor_perkiraan<>$tampil_shu order by nomor_perkiraan asc");
			$sum_modal=mysqli_fetch_array(mysqli_query($koneksi, "select sum(nrc_debet) as debet, sum(nrc_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '50' and '599' and nomor_perkiraan<>$tampil_shu"));
			$modal_debet=$sum_modal['debet'];
			$modal_kredit=$sum_modal['kredit'];
			while($row_modal=mysqli_fetch_array($q_modal)){
			?>
			<tr>
				<td><div align="right"><?php echo $row_modal['nomor_perkiraan'];?></div></td>
				<td><?php echo $row_modal['nama_perkiraan'];?></td>
				<td align="right"><?php echo number_format($row_modal['nrc_debet'],2,'.',','); ?></td>
				<td align="right"><?php echo number_format($row_modal['nrc_kredit'],2,'.',','); ?></td>				
			</tr>
			<?php
			}
			?>
			<tr>
				<td><div align="right"></div></td><td><strong>TOTAL MODAL</strong></td>
				<td align="right"><strong></strong></td>
				<td align="right"><strong><?php echo number_format($total_modal=$modal_kredit-$modal_debet,2,'.',','); ?></strong></td>					
			</tr>
            <tr>
				<td><div align="right"></div></td><td><strong>TOTAL PASIVA</strong></td>
				<td align="right"><strong></strong></td>
				<td align="right"><strong><?php echo number_format($total_pasiva=$total_hutang+$total_modal,2,'.',','); ?></strong></td>					
			</tr>
            
           
            
            
            
            <!----------------------------PENDAPATAN--------------------------------->
				<tr>
					<td><div align="center">6</div></td><td colspan="3">PENDAPATAN</td>			
				</tr>		
				<?php //maksimum sampai nomor perkiraan 413 untuk pendapatan usaha
				$q_dapat=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '60' and '699' order by nomor_perkiraan asc");
				$sum_dapat=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '60' and '699'"));
				$dapat_debet=$sum_dapat['debet'];
				$dapat_kredit=$sum_dapat['kredit'];
				while($row_dapat=mysqli_fetch_array($q_dapat)){
				//$no_prk_dapat=$row_dapat['nomor_perkiraan'];
				//$sum_detail_dapat=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_dapat%' and nomor_perkiraan between '60' and '699'"));
				?>
				<tr>
					<td><div align="center"><?php echo $row_dapat['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_dapat['nama_perkiraan'];?></td>
					<td align="right"><?php echo number_format($row_dapat['rl_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($row_dapat['rl_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td><td><strong>TOTAL PENDAPATAN</strong></td>
					<td align="right"></td>
                    <td align="right"><strong><?php echo number_format($total_pendapatan=$dapat_kredit-$dapat_debet,2,'.',','); ?></strong></td>					
				</tr>
				
				
               
            
                
                				
				<!-----------------------------BEBAN--------------------------------->
				<tr>
					<td><div align="center">7</div></td><td colspan="3">BIAYA</td>			
				</tr>
				<?php
				$q_beban=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '7' and '899'");
				$sum_beban=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '7' and '899'"));
				$debet_beban=$sum_beban['debet'];
				$kredit_beban=$sum_beban['kredit'];
				while($row_beban=mysqli_fetch_array($q_beban)){
				//$no_prk_beban=$row_beban['nomor_perkiraan'];
				//$sum_detail_beban=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_beban%' and nomor_perkiraan between '5101' and '5199'"));
				?>
				<tr>
					<td><div align="center"><?php echo $row_beban['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_beban['nama_perkiraan'];?></td>
					<td align="right"><?php echo number_format($row_beban['rl_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($row_beban['rl_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td><td><strong>TOTAL BEBAN USAHA</strong></td>
					<td align="right"><strong><?php echo number_format($total_beban_biaya=$debet_beban,2,'.',','); ?></strong></td>
					<td align="right"><strong></strong></td>					
				</tr>
		</tbody>
		<tfoot>
			
            <tr>
				<td></td><td class='rounded-foot-left'><strong>TOTAL BALANCE</strong></td>
				<td><div align="right"><strong><?php echo number_format($total_aktiva+$total_beban_biaya,2,'.',','); ?></strong></div></td>
				<td class='rounded-foot-right'><div align="right"><strong><?php echo number_format($total_pasiva+$total_pendapatan,2,'.',','); ?></strong></div></td>
			</tr>
		</tfoot>
        </table>
		</td>
	</tr>
  	
    </table>  
	</fieldset>
	</div>
	<br />

<?php 
}else{
	echo "Forbidden Access!";
}
?>
