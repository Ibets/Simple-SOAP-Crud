<?php
// Create a SOAP client to consume the Produk class from soapServer.php
$client = new SoapClient(null, array(
    'location' => 'http://localhost/OOP/SoapServer.php', // The URL of the SOAP server
    'uri'      => 'http://localhost/OOP/',
    'trace'    => 1 // Enables tracing of request/response (useful for debugging)
));

// Example: Fetch all products
try {
    $result = $client->__soapCall('tampil_data', array());
    print_r($result); // Display the list of products
} catch (SoapFault $e) {
    echo "SOAP Error: " . $e->getMessage();
}

// Example: Add a product
try {
    $result = $client->__soapCall('tambah_data', array('Produk Baru', 10000, 50));
    echo "Result of adding product: " . $result;
} catch (SoapFault $e) {
    echo "SOAP Error: " . $e->getMessage();
}

// Example: Delete a product by ID
try {
    $result = $client->__soapCall('delete_data', array(1)); // where 1 is the product ID
    echo "Result of deleting product: " . $result;
} catch (SoapFault $e) {
    echo "SOAP Error: " . $e->getMessage();
}
?>
