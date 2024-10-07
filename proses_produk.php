<?php
// Create a SOAP client to connect to the SOAP server
$client = new SoapClient(null, array(
    'location' => 'http://localhost/OOP/SoapServer.php',
    'uri' => 'http://localhost/OOP/'
));

$action = $_GET['action'];
if ($action == "add") {
    $client->tambah_data($_POST['nama_produk'], $_POST['harga'], $_POST['jumlah']);
    header('location:index2.php');
} elseif ($action == "update") {
    $client->update_data($_POST['nama_produk'], $_POST['harga'], $_POST['jumlah'], $_POST['id_produk']);
    header('location:index2.php');
} elseif ($action == "delete") {
    $id_produk = $_GET['id'];
    $client->delete_data($id_produk);
    header('location:index2.php');
}
?>

<!-- include('Produk.php');
$koneksi = new Produk();
 
$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['nama_produk'],$_POST['harga'],$_POST['jumlah']);
	header('location:index2.php');
}
elseif($action=="update")
{
	$koneksi->update_data($_POST['nama_produk'],$_POST['harga'],$_POST['jumlah'],$_POST['id_produk']);
	header('location:index2.php');
}
elseif($action=="delete")
{
	$id_produk = $_GET['id'];
	$koneksi->delete_data($id_produk);
	header('location:index2.php');
} -->
