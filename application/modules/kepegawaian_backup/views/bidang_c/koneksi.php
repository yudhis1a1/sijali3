<!DOCTYPE html>
<?php
$server = "localhost";
$username = "jafung_user";
$password = "jafung_dikti19#!";
$database = "db_jafung";
$tanggal=date("Y-m-d H:i:s");
$entries=3;

$koneksi = mysqli_connect($server,$username,$password) or die ('Koneksi gagal');

if($koneksi){
mysqli_select_db($koneksi,$database) or die ('Database belum dibuat');	
}
error_reporting(0);

?>