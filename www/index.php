<?php

$servername = 'db';
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$dbname = $_ENV['MYSQL_DATABASE'];

//print_r("server:$servername username:$username password:$password dbname:$dbname");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT uuid, created FROM task";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["uuid"]. " - time: " . $row["created"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
