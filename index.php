<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pertahanan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h2>Data Persebaran Fasilitas Pertahanan dan Keamanan</h2>";
echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

$sql = "SELECT * FROM pertahanan_keamanan";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1px' cellpadding='8' cellspacing='0'>
    <tr>
        <th>Toponim</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Object ID</th>
        <th>Objek</th>
        <th>Aksi</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["toponim"]."</td>
            <td>".$row["longitude"]."</td>
            <td>".$row["latitude"]."</td>
            <td>".$row["objectid"]."</td>
            <td>".$row["objek"]."</td>
            <td align='center'>
                <a href='edit/edit.php?id=".$row["id"]."'>Edit</a> | 
                <a href='delete.php?id=".$row["id"]."' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>