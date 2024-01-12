<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";

// Bagian Home
if ($_GET['module']=='home'){
	echo "<h2>HALLO GAYS</h2><br><br>
			<p>Hai <b>$_SESSION[username]</b>, selamat datang di halaman Administrator Sistem Informasi Akuntansi STMIK Hang Tuah Pekanbaru.<br> 
			Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola aplikasi. </p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			
			<p align=right>Login : $hari_ini, ";
			echo date("Y m d"); 
			echo " | "; 
			echo date("H:i:s");
			echo " WIB</p>";
}

elseif ($_GET['module']=='perkiraan'){
	include "modul/mod_perkiraan/perkiraan.php";
}
elseif ($_GET['module']=='karyawan'){
	include "modul/mod_karyawan/karyawan.php";
}
elseif ($_GET['module']=='perusahaan'){
	include "modul/mod_perusahaan/perusahaan.php";
}
elseif ($_GET['module']=='user'){
	include "modul/mod_user/user.php";
}
elseif ($_GET['module']=='AddUser'){
	include "modul/mod_user/AddUser.php";
}
elseif ($_GET['module']=='DelUser'){
	include "modul/mod_user/DelUser.php";
}
elseif ($_GET['module']=='AddKaryawan'){
	include "modul/mod_karyawan/AddKaryawan.php";
}
elseif ($_GET['module']=='AddPerkiraan'){
	include "modul/mod_perkiraan/AddPerkiraan.php";
}
elseif ($_GET['module']=='DelPerkiraan'){
	include "modul/mod_perkiraan/DelPerkiraan.php";
}
elseif ($_GET['module']=='DelKaryawan'){
	include "modul/mod_Karyawan/DelKaryawan.php";
}
elseif ($_GET['module']=='periode'){
	include "modul/mod_periode/periode.php";
}
elseif ($_GET['module']=='AddPeriode'){
	include "modul/mod_periode/AddPeriode.php";
}
elseif ($_GET['module']=='editkaryawan'){
	include "modul/mod_karyawan/editkaryawan.php";
}
elseif ($_GET['module']=='jurnal'){
	include "modul/mod_jurnal/jurnal.php";
}
elseif ($_GET['module']=='posting_jurnal'){
	include "modul/mod_jurnal/jurnal-posting.php";
}
elseif ($_GET['module']=='bukubesar'){
	include "modul/laporan/laporan-buku-besar.php";
}
elseif ($_GET['module']=='lapjurnalumum'){
	include "modul/laporan/laporan-jurnal-umum.php";
}
elseif ($_GET['module']=='rugi_laba'){
	include "modul/laporan/laporan-rugi-laba.php";
}

elseif ($_GET['module']=='neraca_lajur'){
	include "modul/laporan/laporan-neraca-lajur.php";
}
elseif ($_GET['module']=='neraca_percobaan'){
	include "modul/laporan/laporan-neraca-percobaan.php";
}
elseif ($_GET['module']=='neraca'){
	include "modul/laporan/laporan-neraca.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
