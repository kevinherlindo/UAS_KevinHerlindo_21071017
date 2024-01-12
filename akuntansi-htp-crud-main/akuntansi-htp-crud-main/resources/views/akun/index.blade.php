<h1>Master Akun</h1>
<a href="{{ asset('akun/tambah')  }}">Tambah Data</a>
<table border="1" width="75%">
 <tr style="background:black;color:white">
    <td>No</td>
    <td>Nomor Perkiaraan</td>
    <td>Nama Perkiraan</td>
    <td>Kelompok</td>
    <td>Aksi</td>
 </tr>   
<?php 
$no=0;
foreach ($akun as $rows){
$no++;
?>
<tr>
    <td>{{ $no }}</td>
    <td>{{ $rows->nomor_perkiraan }}</td>
    <td>{{ $rows->nama_perkiraan }}</td>
    <td>{{ $rows->kelompok }}</td>
    <td>
        <a href="{{ asset('akun/edit/'.$rows->id ) }}">Edit</a>
        <a href="{{ asset('akun/delete/'.$rows->id ) }}">Del</a>
</td>
</tr>
<?php 
}
?>
</table>