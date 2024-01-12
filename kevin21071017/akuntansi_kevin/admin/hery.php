<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
	echo "<script language='javascript'>alert('Login terlebih dahulu untuk melakukan konten manajemen');
					window.location = '../login.php'</script>";
}
else{
	//include "../fungsi/fungsi_rupiah.php";
	//include"../config/fungsi_indotgl.php";
?>
<html>
<head>
	<title> Sistem informasi Akuntansi</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link type="text/css" href="../js/development-bundle/themes/base/ui.all.css" rel="stylesheet" />   

    <script type="text/javascript" src="../js/development-bundle/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.datepicker.js"></script>   
    <script type="text/javascript" src="../js/development-bundle/ui/i18n/ui.datepicker-id.js"></script>
    
    <link rel="stylesheet" type="text/css" media="all" href="../js/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="../js/jsDatePick.min.1.3.js"></script>
    
</head>
<body>
<div id="page">
	<div id="page-in">
		<div id="header">
			<div id="header-info">
				<h1><b style="font-family:Calibri">HTP </b><b style="font-family:Calibri;color:purple">ACCOUNTING </b><b style="font-family:Calibri;color:yellow">SYSTEM </b></h1>
				<div class="description">Administrator System</div>
			</div>
		</div>
<br>
		<div id="main">
			<div class="sidebar">
				
				<div class="sidebar-box">
				
				<h3>Menu Utama</h3>
				<ul>
					<li><a href="?module=home"><b style="color:yellow"><i>DATA MASTER</i></b></a></li>
					<?php
					if ($_SESSION['level'] == '1'){
					?>                
				   <li><a href="?module=user">Data User</a></li>
				   <li><a href="?module=perusahaan">Data Perusahaan</a></li>
				   
				   <li><a href="?module=periode">Data Periode</a></li>
				   <li><a href="?module=perkiraan">Data Perkiraan</a></li>
				   <li><a href="?module=karyawan">Data Karyawan</a></li>
				   <li><a href="?module=home"><b style="color:yellow"><i>DATA TRANSAKSI</i></b></a></li>
				   <li><a href="?module=jurnal">Jurnal Umum</a></li>
				   <li><a href="?module=posting_jurnal">Posting Jurnal</a></li>
				   <li><a href="?module=home"><b style="color:yellow"><i>LAPORAN</i></b></a></li>
				   <li><a href="?module=lapjurnalumum">Jurnal Umum</a></li>
				   <li><a href="?module=bukubesar">Buku Besar</a></li>
				   <li><a href="?module=neraca_percobaan">Neraca Percobaan</a></li>
				   <li><a href="?module=neraca_lajur">Neraca Lajur</a></li>
				   <li><a href="?module=rugi_laba">Rugi Laba </a></li>
				   <li><a href="?module=neraca">Neraca </a></li>
					<?php
					}
					else{
					?>
					
					<?php
					}
					?>
					<!--<li><a href="?module=laporan">Laporan</a></li>-->
					<li><a href="../logout.php">Logout</a></li>
				</ul>
				
			</div>
</div>

<div id="heryContent">
	<div class="post">
		<div class="post-title">
			<br>
			<?php include "hery_isi.php"; ?>			
		</div>
	</div>
</div>
</div>
</div>

<div id="footer"> Copyright &copy; <?php echo"".date('Y')."";?><br>
Sistem Informasi Akuntansi
</div>
</div>
</div>
</body>
</html>
<?php
}
?>