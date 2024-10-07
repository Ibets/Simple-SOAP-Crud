<?php
// Create a SOAP client to connect to the SOAP server
$client = new SoapClient(null, array(
    'location' => 'http://localhost/OOP/SoapServer.php',
    'uri' => 'http://localhost/OOP/'
));

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_produk = $client->get_by_id($id);
?>
    <h1>CRUD OOP with SOAP</h1>
    <h2>Halaman Ubah Data</h2>
    <form action="proses_produk.php?action=update" method="post">
        <input type="hidden" name="id_produk" value="<?= $data_produk['id_produk'] ?>">
        <input type="text" name="nama_produk" value="<?= $data_produk['nama_produk'] ?>">
        <input type="number" name="harga" value="<?= $data_produk['harga'] ?>">
        <input type="number" name="jumlah" value="<?= $data_produk['jumlah'] ?>">
        <input type="submit" name="submit" value="Ubah Data">
    </form>
<?php
} else {
    header('location:index2.php');
}
?>

<!-- 
require_once 'Produk.php';
$db = new Produk();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data_produk = $db->get_by_id($id);

?>
  <h1>CRUD OOP</h1>
  <h2>Halaman Ubah Data</h2>
  <form action="proses_produk.php?action=update" method="post">
    <input type="hidden" name="id_produk" value="<?= $data_produk['id_produk'] ?>">
    <input type="text" name="nama_produk" value="<?= $data_produk['nama_produk'] ?>">
    <input type="number" name="harga" value="<?= $data_produk['harga'] ?>">
    <input type="number" name="jumlah" value="<?= $data_produk['jumlah'] ?>">
    <input type="submit" name="submit" value="Ubah Data">
  </form>
-->
