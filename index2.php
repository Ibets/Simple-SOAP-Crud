<?php
// Create a SOAP client to connect to the SOAP server
$client = new SoapClient(null, array(
    'location' => 'http://localhost/OOP/SoapServer.php',
    'uri' => 'http://localhost/OOP/'
));

$data_produk = $client->tampil_data();  // Fetch all products
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD OOP</title>
</head>

<body>
    <h1>CRUD OOP with SOAP</h1>

    <!-- Form Input Data -->
    <form method="post" action="proses_produk.php?action=add">
        <input type="text" name="nama_produk" placeholder="Nama Produk">
        <input type="number" name="harga" placeholder="Harga">
        <input type="number" name="jumlah" placeholder="Jumlah">
        <input type="submit" name="submit" value="Tambah Data">
    </form><br />

    <!-- Displaying Data from Database -->
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data_produk as $dt) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt['nama_produk'] ?></td>
                <td><?= $dt['harga'] ?></td>
                <td><?= $dt['jumlah'] ?></td>
                <td><a href="update.php?id=<?= $dt['id_produk'] ?>">Ubah</a></td>
                <td><a href="proses_produk.php?action=delete&id=<?= $dt['id_produk'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>

