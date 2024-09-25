<?php
include 'koneksi.php';

$id_gudang = $_GET['id_gudang'];


$sql = "DELETE FROM storage_unit WHERE id_gudang='$id_gudang'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();

header("Location: storage.php");
exit();
?>