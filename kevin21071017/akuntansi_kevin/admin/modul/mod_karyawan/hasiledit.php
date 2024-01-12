<?php
include "config/koneksi.php";

$sqledit = mysqli_query($koneksi, "update t_karyawan set nama_karyawan='$_POST[nama]', alamat_karyawan='$_POST[alamat]' , nohp_karyawan='$_POST[hp]' where NIK='$_POST[id]' ");

echo "<script>document.location='karyawan.php'</script>"

?>