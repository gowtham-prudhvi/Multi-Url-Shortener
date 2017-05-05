<html>
<body>

<form action="index.php" method="post">
URL To Shorten(including http:// and www): <input type="text" name="url"><br>
<input type="submit">
</form>

</body>

<?php

$servername = "localhost";
$username = "root";
$password = "1996";

$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

if ($_POST["url"]) {
// 	echo "this";
// 	$sql = "CREATE DATABASE IF NOT EXISTS mainDB";
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }
$sql = "CREATE TABLE IF NOT EXISTS url_token (
url VARCHAR(256) NOT NULL UNIQUE,
token INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$url=$_POST["url"];
$sql = "INSERT INTO url_token (url)
VALUES ('$url')";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT token FROM url_token WHERE url='$url'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "url:localhost/dec.php?token=" . $row["token"]. "<br>";
    }
} else {
    echo "0 results";
}



}




echo $_POST["url"];


?>


</html>

   
