<?php
$dbhost="localhost";
$username="root";
$password="";
$dbname="db_stok";

$koneksi = mysqli_connect ("localhost","root","","db_stok");
if(!$koneksi){
    die("koneksi gagal".mysqli_connect.errno().
    mysqli_connect_errno());
}
?>