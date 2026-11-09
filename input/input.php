<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pertahanan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$toponim   = $_POST['toponim'];
$longitude = $_POST['longitude'];
$latitude  = $_POST['latitude'];
$objectid  = $_POST['objectid'];
$objek     = $_POST['objek'];

$sql = "INSERT INTO pertahanan_keamanan (`toponim`, `longitude`, `latitude`, `objectid`, `objek`) VALUES ('$toponim', $longitude, $latitude, $objectid, '$objek')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>