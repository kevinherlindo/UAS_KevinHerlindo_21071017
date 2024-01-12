<?php 
error_reporting(0);
include"config/koneksi.php";
if (isset($_POST[simpan])){
	$sqlsimpan=mysqli_query($koneksi, "insert into t_user
			   (user_name,
				password,
				level)
		 values('$_POST[username]',
				'$_POST[password]',
				'$_POST[level]')");
	echo"<script>document.location='?module=user'</script>";	 			
}

echo"<h1>Tambah Data User</h1>";
echo"<form action='' method='POST'>
<table border='0' >
<tr>
<td>Username </td><td><input type='text' name='username'></td>
</tr>
<tr>
<td>Password</td><td><input type='passowrd' name='password'></td>
</tr>
<tr>
<td>Level </td><td><input type='text' name='level'></td>
</tr>

<tr>
<td><input type='submit' name='simpan' value='Kirim'></td>
</tr>
</table>
</form>";
?>