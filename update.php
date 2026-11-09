<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pertahanan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id        = $_POST['id'];
$toponim   = $_POST['toponim'];
$longitude = $_POST['longitude'];
$latitude  = $_POST['latitude'];
$objectid  = $_POST['objectid'];
$objek     = $_POST['objek'];

$sql = "UPDATE pertahanan_keamanan SET toponim='$toponim', longitude=$longitude, latitude=$latitude, objectid=$objectid, objek='$objek' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>