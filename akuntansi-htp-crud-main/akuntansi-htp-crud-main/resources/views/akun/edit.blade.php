<h1>Tambah Data Akun</h1>
<form action="{{ asset('akun/edit_proses') }}" method="POST">
@csrf
<input type="hidden" name="id" value="<?php echo $akun->id ?>">
Nomor Akun <input type="text" name="nomor_perkiraan" value="<?php echo $akun->nomor_perkiraan ?>"><br>
Nama Perkiraan <input type="text" name="nama_perkiraan" value="<?php echo $akun->nama_perkiraan ?>"><br>
Kelompok <input type="text" name="kelompok" value="<?php echo $akun->kelompok ?>"><br>
<input type="submit" value="Simpan">
</form>     