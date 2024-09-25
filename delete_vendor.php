<?php
include 'koneksi.php';

$id_vendor = $_GET['id_vendor'];


$sql = "DELETE FROM vendor WHERE id_vendor='$id_vendor'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();

header("Location: vendor.php");
exit();
?>