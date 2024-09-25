<?php
include 'koneksi.php';
include 'dashboard.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_vendor = $koneksi->real_escape_string($_POST['id_vendor']);
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $kontak = $koneksi->real_escape_string($_POST['kontak']);
    $nama_barang = $koneksi->real_escape_string($_POST['nama_barang']);

    $sql = "INSERT INTO vendor (id_vendor, nama, kontak, nama_barang) VALUES ('$id_vendor', '$nama', '$kontak', '$nama_barang')";
    
    if ($koneksi->query($sql) === TRUE) {
        header("Location: vendor.php"); 
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
        <label for="id_vendor">id_vendor:</label>
        <input type="text" id="id_vendor" name="id_vendor" required>

        <label for="nama">nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="kontak">kontak:</label>
        <input type="text" id="kontak" name="kontak" required>

        <label for="nama_barang">nama_barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

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
            <h1>Data Vendor</h1>
        </header>
        <table border="1">
            <thead>
                <tr>
                    <th>id vendor</th>
                    <th>nama</th>
                    <th>kontak</th>
                    <th>nama barang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM vendor";
                $result = $koneksi->query($sql);

                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_vendor"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["kontak"] . "</td>";
                        echo "<td>" . $row["nama_barang"] . "</td>";
                        echo "</tr>";
                        echo "<td>";
                        echo "<a href='update_vendor.php?id_vendor=" . $row['id_vendor'] . "'>Update</a>|";
                        echo "<a href='delete_vendor.php?id_vendor=". $row['id_vendor'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>";
                        echo "</td>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data vendor ditemukan</td></tr>";
                }

                
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
