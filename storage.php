<?php
include 'koneksi.php';
include 'dashboard.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gudang = $koneksi->real_escape_string($_POST['id_gudang']);
    $nama_gudang = $koneksi->real_escape_string($_POST['nama_gudang']);
    $lokasi_gudang = $koneksi->real_escape_string($_POST['lokasi_gudang']);

    $sql = "INSERT INTO storage_unit (id_gudang, nama_gudang, lokasi_gudang) VALUES ('$id_gudang', '$nama_gudang', '$lokasi_gudang')";
    
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
}

th {
    background-color: #f2f2f2;
}

h1{
    text-align: center;
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
        <label for="id_gudang">id_gudang:</label>
        <input type="text" id="id_gudang" name="id_gudang" required>

        <label for="nama_gudang">nama:</label>
        <input type="text" id="nama_gudang" name="nama_gudang" required>

        <label for="lokasi_gudang">lokasi_gudang:</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" required>

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
            <h1>Data Storage</h1>
        </header>
        <table border="1">
            <thead>
                <tr>
                    <th>id gudang</th>
                    <th>nama gudang</th>
                    <th>lokasi gudang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM storage_unit";
                $result = $koneksi->query($sql);

                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_gudang"] . "</td>";
                        echo "<td>" . $row["nama_gudang"] . "</td>";
                        echo "<td>" . $row["lokasi_gudang"] . "</td>";
                        echo "</tr>";
                        echo "<td>";
                        echo "<a href='update_stor.php?id_gudang=" . $row['id_gudang'] . "'>Update</a>|";
                        echo "<a href='delete_stor.php?id_gudang=". $row['id_gudang'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>";
                        echo "</td>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data storage ditemukan</td></tr>";
                }

                
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
