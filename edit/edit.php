<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pertahanan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM pertahanan_keamanan WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Data Fasilitas</title>
    </head>
    <body>
        <h2>Form Edit Data Fasilitas Pertahanan</h2>
        <form action="../update.php" onsubmit="return validateForm()" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label for="toponim">Toponim:</label><br>
            <input type="text" id="toponim" name="toponim" value="<?php echo $row['toponim']; ?>" required><br><br>

            <label for="long">Longitude:</label><br>
            <input type="text" id="long" name="longitude" value="<?php echo $row['longitude']; ?>" required><br><br>

            <label for="lat">Latitude:</label><br>
            <input type="text" id="lat" name="latitude" value="<?php echo $row['latitude']; ?>" required><br><br>

            <label for="objectid">Object ID:</label><br>
            <input type="text" id="objectid" name="objectid" value="<?php echo $row['objectid']; ?>" required><br><br>

            <label for="objek">Objek:</label><br>
            <input type="text" id="objek" name="objek" value="<?php echo $row['objek']; ?>" required><br><br>

            <input type="submit" value="Update Data">
            <a href="../index.php">Batal</a>
        </form>
        <p id="informasi"></p>

        <script>
        function validateForm() {
            let objectid = document.getElementById("objectid").value;
            let text = "";
            
            if (isNaN(objectid) || objectid < 1) {
                text = "Object ID harus berupa angka positif dan tidak boleh kurang dari 1";
                event.preventDefault();
            }
            document.getElementById("informasi").innerHTML = text;
        }
        </script>
    </body>
    </html>
    <?php
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
?>