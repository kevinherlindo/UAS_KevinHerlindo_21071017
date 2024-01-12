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

<h2>Laporan >> Sisa Hasil Usaha</h2> 
<fieldset style="border:solid 2px #ccc;">
<legend><strong>LAPORAN </strong></legend>
<br />

	<table align="left" border="1">
	<tr>
		<td align="center" colspan="3">
		<table id='rounded-corner' width="100%" border="1">
		<thead>
			<tr>
			  <th width="248" class=rounded-company ><div align="center">Nomor Perkiraan</div></th>
			  <th class=hr width="295" ><div align="center">Uraian</div></th>
			  <th class=hr width="105" ><div align="center">Normal</div></th>
			  <th width="155" class=hr><div align="right">Pengeluaran</div></th>
			  <th class="rounded-q4" width="135" ><div align="right">Pendapatan</div></th>
			</tr>
		</thead>
		<tbody>
				<!----------------------------PENDAPATAN--------------------------------->
				<tr>
					<td><div align="center">6</div></td><td colspan="5">PENDAPATAN</td>			
				</tr>		
				<?php //maksimum sampai nomor perkiraan 413 untuk pendapatan usaha
				$q_dapat=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '60' and '6199'");
				$sum_dapat=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '60' and '6199'"));
				$dapat_debet=$sum_dapat['debet'];
				$dapat_kredit=$sum_dapat['kredit'];
				while($row_dapat=mysqli_fetch_array($q_dapat)){
				$no_prk_dapat=$row_dapat['nomor_perkiraan'];
				$sum_detail_dapat=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_dapat%' and nomor_perkiraan between '60' and '6199'"));
				?>
				<tr>
					<td><div align="center"><?php echo $row_dapat['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_dapat['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_dapat['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_dapat['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_dapat['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td><td><strong>TOTAL PENDAPATAN USAHA</strong></td>
					<td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($dapat_debet,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($dapat_kredit,2,'.',','); ?></strong></td>					
				</tr>
				
				
				<!-----------------------------PENDAPATAN NON USAHA--------------------------------->
				<tr>
					<td><div align="center">61</div></td><td colspan="5">Pendapatan Non Usaha</td>			
				</tr>
				<?php //nomor rekerning 4234 batas pendapatan non  usaha
				$q_dapat_non=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '61' and '6199'");
				$sum_dapat_non=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '61' and '6199'"));
				$dapat_debet_non=$sum_dapat_non['debet'];
				$dapat_kredit_non=$sum_dapat_non['kredit'];
				while($row_dapat_non=mysqli_fetch_array($q_dapat_non)){
				$no_prk_non=$row_dapat_non['nomor_perkiraan'];
				$sum_detail=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_non%' and nomor_perkiraan between '61' and '6199'"));
				?>
				<tr>
					<td><div align="center"><?php echo $row_dapat_non['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_dapat_non['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_dapat_non['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td><td><strong>TOTAL PENDAPATAN NON USAHA</strong></td>
					<td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($dapat_debet_non,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($dapat_kredit_non,2,'.',','); ?></strong></td>					
				</tr>
				<tr>
					<td><div align="right"></div></td><td><span class="style1">TOTAL PENDAPATAN</span></td>
					<td><div align="center"></div></td>
					<td align="right"></td>
					<td align="right"><strong><?php echo number_format($total_pendapatan=$dapat_kredit+$dapat_kredit_non,2,'.',','); ?></strong></td>					
				</tr>
				
				
				
				<!-----------------------------BIAYA--------------------------------->
				<tr>
				  <td>&nbsp;</td>
				  <td colspan="5">&nbsp;</td>
		    </tr>
				<tr>
					<td><div align="center">7</div></td><td colspan="5">BIAYA</td>			
				</tr>
				<?php
				$q_beban=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '70' and '7099'");
				$sum_beban=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '70' and '7099'"));
				$debet_beban=$sum_beban['debet'];
				$kredit_beban=$sum_beban['kredit'];
				while($row_beban=mysqli_fetch_array($q_beban)){
				$no_prk_beban=$row_beban['nomor_perkiraan'];
				$sum_detail_beban=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_beban%' and nomor_perkiraan between '70' and '7099'"));
				?>
				<tr>
					<td><div align="right"><?php echo $row_beban['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_beban['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_beban['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_beban['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_beban['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL BIAYA MODAL</strong></td>
					<td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_beban,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_beban,2,'.',','); ?></strong></td>					
				</tr>
				
				
				
				<!-----------------------------BIAYA--------------------------------->
				<tr>
					<td><div align="center">71</div></td>
					<td colspan="5">organ Organisasi</td>			
				</tr>
				<?php
				$q_organ=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '71' and '7199'");
				$sum_organ=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '71' and '7199'"));
				$debet_organ=$sum_organ['debet'];
				$kredit_organ=$sum_organ['kredit'];
				while($row_organ=mysqli_fetch_array($q_organ)){
				$no_prk_organ=$row_organ['nomor_perkiraan'];
				$sum_detail_organ=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_organ%' and nomor_perkiraan between '71' and '7199'"));
				?>
				<tr>
					<td><div align="right"><?php echo $row_organ['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_organ['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_organ['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_organ['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_organ['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL ORGANISASI</strong></td>
					<td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_organ,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_organ,2,'.',','); ?></strong></td>					
				</tr>                
                
                <tr>
					<td><div align="center">72</div></td>
					<td colspan="5">Biaya Personalia</td>			
				</tr>
				<?php
				$q_person=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '72' and '7299'");
				$sum_person=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '72' and '7299'"));
				$debet_person=$sum_person['debet'];
				$kredit_person=$sum_person['kredit'];
				while($row_person=mysqli_fetch_array($q_person)){
				$no_prk_person=$row_person['nomor_perkiraan'];
				$sum_detail_person=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_person%' and nomor_perkiraan between '72' and '7299'"));
				?>
				<tr>
					<td><div align="right"><?php echo $row_person['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_person['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_person['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_person['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_person['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL PERSONALIA</strong></td>
					<td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_person,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_person,2,'.',','); ?></strong></td>					
				</tr>


				
                <tr>
					<td><div align="center">73</div></td>
					<td colspan="5">Biaya Administrasi & Umum</td>			
				</tr>
				<?php
				$q_admin=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '73' and '7399'");
				$sum_admin=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '73' and '7399'"));
				$debet_admin=$sum_admin['debet'];
				$kredit_admin=$sum_admin['kredit'];
				while($row_admin=mysqli_fetch_array($q_admin)){
				$no_prk_admin=$row_admin['nomor_perkiraan'];
				$sum_detail_admin=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_admin%' and nomor_perkiraan between '73' and '7399'"));
				?>
				<tr>
					<td><div align="right"><?php echo $row_admin['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_admin['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_admin['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_admin['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_admin['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL ADMINISTRASI & UMUM</strong></td>
				  <td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_admin,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_admin,2,'.',','); ?></strong></td>					
				</tr>
                
                
                
                <tr>
					<td><div align="center">74</div></td>
					<td colspan="5">Biaya Penyusutan</td>			
				</tr>
				<?php
				$q_susut=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '74' and '7499'");
				$sum_susut=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '74' and '7499'"));
				$debet_susut=$sum_susut['debet'];
				$kredit_susut=$sum_susut['kredit'];
				while($row_susut=mysqli_fetch_array($q_susut)){
				$no_prk_susut=$row_susut['nomor_perkiraan'];
				$sum_detail_susut=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_susut%' and nomor_perkiraan between '74' and '7499'"));
				?>
				<tr>
					<td><div align="center"><?php echo $row_susut['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_susut['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_susut['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_susut['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_susut['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL Penyusutan</strong></td>
				  <td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_susut,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_susut,2,'.',','); ?></strong></td>					
				</tr>

                
                <tr>
					<td><div align="center">8</div></td><td colspan="5">BEBAN/BIAYA BUKAN USAHA</td>			
				</tr>
				<tr>
					<td><div align="center">80</div></td>
					<td colspan="5">Biaya Bank</td>			
				</tr>
				<?php
				$q_bank=mysqli_query($koneksi, "select * from tabel_akuntansi_master where nomor_perkiraan between '80' and '8099'");
				$sum_bank=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '80' and '8099'"));
				$debet_bank=$sum_bank['debet'];
				$kredit_bank=$sum_bank['kredit'];
				while($row_bank=mysqli_fetch_array($q_bank)){
				$no_prk_bank=$row_bank['nomor_perkiraan'];
				$sum_detail_bank=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as detail_debet, sum(rl_kredit) as detail_kredit from tabel_akuntansi_master where nomor_perkiraan like '$no_prk_bank%' and nomor_perkiraan between '80' and '8099'"));
				?>
				<tr>
					<td><div align="right"><?php echo $row_bank['nomor_perkiraan'];?></div></td>
					<td><?php echo $row_bank['nama_perkiraan'];?></td>
					<td><div align="center"><?php echo $row_bank['tipe'];?></div></td>
					<td align="right"><?php echo number_format($sum_detail_bank['detail_debet'],2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sum_detail_bank['detail_kredit'],2,'.',','); ?></td>				
				</tr>
				<?php
				}
				?>
				<tr>
					<td><div align="right"></div></td>
					<td><strong>TOTAL Bukan Usaha</strong></td>
				  <td><div align="center"></div></td>
					<td align="right"><strong><?php echo number_format($debet_bank,2,'.',','); ?></strong></td>
					<td align="right"><strong><?php echo number_format($kredit_bank,2,'.',','); ?></strong></td>					
				</tr>
                
                <?php
                $sum_beban_biaya=mysqli_fetch_array(mysqli_query($koneksi, "select sum(rl_debet) as debet, sum(rl_kredit) as kredit from tabel_akuntansi_master where nomor_perkiraan between '7' and '899'"));
                $debet_beban_biaya=$sum_beban_biaya['debet'];
				$kredit_beban_biaya=$sum_beban_biaya['kredit'];
				?>
                
				<tr>
					<td><div align="right"></div></td><td><span class="style1">TOTAL BEBAN/BIAYA</span></td>
					<td><div align="center"></div></td>
					<td align="right"></td>
					<td align="right"><strong><?php echo number_format($total_beban_biaya=$debet_beban_biaya,2,'.',','); ?></strong></td>					
				</tr>
				
				<tr>
					<td colspan="5"></td>					
				</tr>
				
				
				<!-----------------------------SISA HASIL USAHA--------------------------------->
				<tr>
					<td><div align="right"></div></td><td><strong>SISA HASIL USAHA</strong></td>
					<td><div align="center"></div></td>
					<td align="right"></td>
					<td align="right"><strong><?php echo number_format($shu=$total_pendapatan-$total_beban_biaya,2,'.',','); ?></strong></td>					
				</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class='rounded-foot-left' colspan="2"><strong>TOTAL BALANCE</strong></td>
				<td></td>
				<td><div align="right"><strong><?php echo number_format($shu+$total_beban_biaya,2,'.',','); ?></strong></div></td>
				<td class='rounded-foot-right'><div align="right"><strong><?php echo number_format($total_pendapatan,2,'.',','); ?></strong></div></td>
			</tr>
		  </table>
		</tfoot>
		</td>
	</tr>
	</table>
	</fieldset>

	<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
	<iframe width=174 height=189 name="gToday:normal:css/calender/agenda.js" id="gToday:normal:css/calender/agenda.js" src="css/calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>

<?php 
}else{
	echo "Forbidden Access!";
}
?>