<?php
include 'koneksi.php'; 

$id_barang = $_GET['id_barang'];


$sql = "SELECT * FROM inventory WHERE id_barang='$id_barang'";
$result = $koneksi->query($sql);

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_barang = $koneksi->real_escape_string($_POST['id_barang']);
    $nama_barang = $koneksi->real_escape_string($_POST['nama_barang']);
    $jenis_barang = $koneksi->real_escape_string($_POST['jenis_barang']);
    $kuantitas_stok = $koneksi->real_escape_string($_POST['kuantitas_stok']);
    $lokasi_gudang = $koneksi->real_escape_string($_POST['lokasi_gudang']);
    $serial_number = $koneksi->real_escape_string($_POST['serial_number']);


    $sql = "UPDATE inventory SET id_barang='$id_barang', nama_barang='$nama_barang', jenis_barang='$jenis_barang', kuantitas_stok='$kuantitas_stok', lokasi_gudang='$lokasi_gudang' WHERE id_barang='$id_barang'";
    
    if ($koneksi->query($sql) === TRUE) {
        header("Location: inventory.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventaris</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .main-content{
            width: 90%;
            margin:auto;
        }

        input{
            text-align:left;
        }
        </style>
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Update Inventory</h1>
        </header>
        <main>
            <form action="update_inven.php?id_barang=<?php echo $id_barang; ?>" method="POST">
            <input type="hidden" name="id_barang" value="<?php echo $row['id_barang'];?>";>

                <label for="nama_barang">nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br><br>

                <label for="jenis_barang">Jenis Barang:</label>
                <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" required><br><br>

                <label for="kuantitas_stok">Kuantitas Stok:</label>
                <input type="number" id="kuantitas_stok" name="kuantitas_stok" value="<?php echo $row['kuantitas_stok']; ?>" required><br><br>

                <label for="lokasi_gudang">Lokasi:</label>
                <input type="text" id="lokasi_gudang" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required><br><br>

                <label for="serial_number">Serial Number:</label>
                <input type="text" id="serial_number" name="serial_number" value="<?php echo $row['serial_number']; ?>" required><br><br>

                <input type="submit" value="Update Inventaris">
                <button type="submit" name="kembali">kembali</button>
            </form>
        </main>
    </div>
</body>
</html>
