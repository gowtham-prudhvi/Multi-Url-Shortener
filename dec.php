<html>
<body>

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
echo $_GET["token"];
if ($_GET["token"]) {
$token=$_GET["token"];
$sql = "SELECT url FROM url_token WHERE token='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $url=$row["url"];
        echo $url;
        header("Location: $url"); /* Redirect browser */
        // exit();
    }
} else {
    echo "0 results";
}



}




echo $_POST["url"];


?>


</html>

   
