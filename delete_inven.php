<?php
include 'koneksi.php';

$id_barang = $_GET['id_barang'];


$sql = "DELETE FROM inventory WHERE id_barang='$id_barang'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();

header("Location: inventory.php");
exit();
?>