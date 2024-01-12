<?php



//koneksi untuk php 7
$db['host']="localhost";
$db['user']="root";
$db['pass']="";
$db['dbname']="akuntansi_kevin";
$koneksi =mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);


function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;		 
}	

?>