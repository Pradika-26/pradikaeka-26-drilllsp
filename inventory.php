<?php
include 'koneksi.php';
include 'dashboard.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_barang = $koneksi->real_escape_string($_POST['id_barang']);
    $nama_barang = $koneksi->real_escape_string($_POST['nama_barang']);
    $jenis_barang = $koneksi->real_escape_string($_POST['jenis_barang']);
    $kuantitas_stok = $koneksi->real_escape_string($_POST['kuantitas_stok']);
    $lokasi_gudang   = $koneksi->real_escape_string($_POST['lokasi_gudang']);
    $serial_number = $koneksi->real_escape_string($_POST['serial_number']);


    $sql = "INSERT INTO inventory (id_barang, nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, serial_number) VALUES ('$id_barang', '$nama_barang', '$jenis_barang', '$kuantitas_stok', '$lokasi_gudang', '$serial_number')";
    
    if ($koneksi->query($sql) === TRUE) {
        header("Location: inventory.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM inventory WHERE id_inventory='$id'";
    mysqli_query($conn, $delete_query);
    header("Location: inventory.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <style>
        table {
    width: 50%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
    text-align: center; 
    margin: auto;
}

th, td {
    padding: 7px;
    text-align: left;
    margin: auto;
}

th {
    background-color: #f2f2f2;
}

h1{
    text-align: center;
}

tr:nth-child(even) {
    background-color: white;
}

tr:hover {
    background-color: #6df5ff;
}

form{
    width: 45%;
    margin: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-top: 7%;
}

form input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

form input[type="submit"] {
    padding: 10px 20px;
    border: none;
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"] {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <form method="post" action="">
        <label for="id_barang">id_barang:</label>
        <input type="text" id="id_barang" name="id_barang" required>

        <label for="nama_barang">nama_barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <label for="jenis_barang">jenis_barang:</label>
        <input type="text" id="jenis_barang" name="jenis_barang" required>

        <label for="kuantitas_stok">kuantitas_stok:</label>
        <input type="text" id="kuantitas_stok" name="kuantitas_stok" required>

        <label for="lokasi_gudang">lokasi_gudang:</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" required>
        
        <label for="serial_number">serial_number:</label>
        <input type="text" id="serial_number" name="serial_number" required>

        <input type="submit" value="tambah data"></input>

    </form>
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="dashboard.php"></i> Dashboard</a></li>
            <li><a href="inventory.php"></i> Inventory</a></li>
            <li><a href="storage.php"></i> Storage</a></li>
            <li><a href="vendor.php"></i> Vendor</a></li>
            <li><a href="logout.php"></i> Logout</a></li>   
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Data Inventory</h1>
        </header>
        <table border="1">
            <thead>
                <tr>
                    <th>id barang</th>
                    <th>nama barang</th>
                    <th>jenis barang</th>
                    <th>kuantitas stok</th>
                    <th>lokasi gudang</th>
                    <th>serial number</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM inventory";
                $result = $koneksi->query($sql);

                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_barang"] . "</td>";
                        echo "<td>" . $row["nama_barang"] . "</td>";
                        echo "<td>" . $row["jenis_barang"] . "</td>";
                        echo "<td>" . $row["kuantitas_stok"] . "</td>";
                        echo "<td>" . $row["lokasi_gudang"] . "</td>";
                        echo "<td>" . $row["serial_number"] . "</td>";
                        echo "<td>";
                        echo "<a href='update_inven.php?id_barang=" . $row['id_barang'] . "'>Update</a>|";
                        echo "<a href='delete_inven.php?id_barang=". $row['id_barang'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>";
                        echo "</td>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data inventory ditemukan</td></tr>";
                }

                
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
