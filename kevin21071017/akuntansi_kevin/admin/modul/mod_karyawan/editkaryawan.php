<?php
include "config/koneksi.php";

if ($_POST[submit]){
    
    mysqli_query($koneksi, "update t_karyawan set nama='$_POST[nama]', alamat='$_POST[alamat]' , telepon='$_POST[telepon]' where NIK='$_POST[NIK]' ");

    echo "<script>document.location='?module=karyawan'</script>";

}

echo "<h1>Halaman Edit Data Karyawan</h1>";

$data = mysqli_fetch_array(mysqli_query($koneksi, "select * from t_karyawan where NIK='$_GET[id]' "));

echo "<form action='' method='post'>

<table>
<tr>
<td>NIK</td> <td><input type='text' name='NIK' value='$data[NIK]'></td>
</tr>

<tr>
<td>Nama Karyawan</td> <td> <input type='text' name='nama' value='$data[nama]'></td>
</tr>
 
<tr>
<td>Alamat Karyawan</td> <td> <input type='text' name='alamat' value='$data[alamat]'></td>
</tr>

<tr>
<td>NoHP Karyawan</td> <td> <input type='text' name='telepon' value='$data[telepon]'></td>
</tr>


<tr>
<td><input type='submit' name='submit' value='Simpan'></td>
</tr>

</form>
</table>
";

?>