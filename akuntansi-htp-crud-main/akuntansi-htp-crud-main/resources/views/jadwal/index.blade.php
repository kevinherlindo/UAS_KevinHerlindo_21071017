<h1>Jadwal Kuliah</h1>
<table border="1" width="75%">
<tr>
    <td>No</td>
    <td>Nama Dosen</td>
    <td>Nama Matakulaih</td>
</tr>
<?php
$no=0; 
foreach ($jadwal as $rows){
$no++;
?>
<tr>
    <td>{{ $no }}</td>
    <td>{{ $rows->nama_dosen }}</td>
    <td>{{ $rows->nama_mk }}</td>
</tr>

<?php
}

?>

</table>