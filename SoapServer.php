<?php
class Produk {
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "produk";
    var $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
        }
    }

    // Get all products
    public function tampil_data() {
        $hasil = array();
        $data = mysqli_query($this->koneksi, "SELECT * FROM produk");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Add a new product
    public function tambah_data($nama_produk, $harga, $jumlah) {
        $query = "INSERT INTO produk VALUES('', '$nama_produk', '$harga', '$jumlah')";
        return mysqli_query($this->koneksi, $query);
    }

    // Delete a product by ID
    public function delete_data($id) {
        return mysqli_query($this->koneksi, "DELETE FROM produk WHERE id_produk='$id'");
    }

    // Get a product by ID
    public function get_by_id($id) {
        $data = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
        return mysqli_fetch_array($data);
    }

    // Update product by ID
    public function update_data($nama_produk, $harga, $jumlah, $id_produk) {
        $query = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', jumlah='$jumlah' WHERE id_produk='$id_produk'";
        return mysqli_query($this->koneksi, $query);
    }
}

// Create SOAP Server
$options = array('uri' => 'http://localhost/OOP/');
$server = new SoapServer(null, $options);
$server->setClass('Produk');
$server->handle();
?>


<!--
 
class Produk{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "produk";
    var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass,$this->db);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
 
	function tampil_data(){
		$data = mysqli_query($this->koneksi,"select * from produk");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
 
	}
 
	function tambah_data($nama_produk,$harga,$jumlah){
		mysqli_query($this->koneksi,"insert into produk values('','$nama_produk','$harga','$jumlah')");
	}
 
	function delete_data($id){
		mysqli_query($this->koneksi,"delete from produk where id_produk='$id'");
	}
 
	function get_by_id($id){
		$data = mysqli_query($this->koneksi,"select * from produk where id_produk='$id'");
		return $data->fetch_array();
	}
 
	function update_data($nama_produk,$harga,$jumlah,$id_produk){
		mysqli_query($this->koneksi,"update produk set nama_produk='$nama_produk', harga='$harga', jumlah='$jumlah' where id_produk='$id_produk'");
	}
 
} 
?> -->