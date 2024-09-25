<?php
include 'koneksi.php'; 

$id_gudang = $_GET['id_gudang'];


$sql = "SELECT * FROM storage_unit WHERE id_gudang='$id_gudang'";
$result = $koneksi->query($sql);

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gudang = $koneksi->real_escape_string($_POST['id_gudang']);
    $nama_gudang = $koneksi->real_escape_string($_POST['nama_gudang']);
    $lokasi_gudang = $koneksi->real_escape_string($_POST['lokasi_gudang']);


    $sql = "UPDATE storage_unit SET id_gudang='$id_gudang', nama_gudang='$nama_gudang', lokasi_gudang='$lokasi_gudang' WHERE id_gudang='$id_gudang'";
    
    if ($koneksi->query($sql) === TRUE) {
        header("Location: storage.php"); 
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
            <h1>Update Storage</h1>
        </header>
        <main>
            <form action="update_stor.php?id_gudang=<?php echo $id_gudang; ?>" method="POST">
            <input type="hidden" name="id_gudang" value="<?php echo $row['id_gudang'];?>";>

                <label for="nama_gudang">nama gudang:</label>
                <input type="text" id="nama_gudang" name="nama_gudang" value="<?php echo $row['nama_gudang']; ?>" required><br><br>

                <label for="lokasi_gudang">Lokasi:</label>
                <input type="text" id="lokasi_gudang" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required><br><br>

                <input type="submit" value="Update Storage">
                <button type="submit" name="kembali">kembali</button>
            </form>
        </main>
    </div>
</body>
</html>
