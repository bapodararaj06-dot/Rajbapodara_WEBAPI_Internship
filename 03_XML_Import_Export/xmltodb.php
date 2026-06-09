<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "tution";

// Database Connection
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn)
{
    die("Connection Failed : " . mysqli_connect_error());
}

// Load XML File
$xml = simplexml_load_file("products.xml");

if (!$xml)
{
    die("Error Loading XML File");
}

// Insert Data into Database
foreach ($xml->product as $product)
{
    $pid   = $product->pid;
    $pname = $product->pname;
    $price = $product->price;
    $qty   = $product->qty;

    $sql = "INSERT INTO product(pid, pname, price, qty)
            VALUES('$pid', '$pname', '$price', '$qty')";

    if (!mysqli_query($conn, $sql))
    {
        echo "Error: " . mysqli_error($conn) . "<br>";
    }
}

echo "XML Data Imported Successfully";

mysqli_close($conn);

?>
