<!DOCTYPE html>
<?php
$server = "120.29.156.20";
$username = "sa";
$password = "Pu5k0m0k3";
$database = "pddikti";
$tanggal=date("Y-m-d H:i:s");
$entries=3;

$koneksi = sqlsrv_connect($server,$username,$password);

if( $koneksi ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>
