<h1>Tambah Data Akun</h1>
<form action="{{ asset('akun/tambah_proses') }}" method="POST">
@csrf
Nomor Akun <input type="text" name="nomor_perkiraan"><br>
Nama Perkiraan <input type="text" name="nama_perkiraan"><br>
Kelompok <input type="text" name="kelompok"><br>
<input type="submit" value="Simpan">
</form>     