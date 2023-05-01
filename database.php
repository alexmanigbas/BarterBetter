<?php
$host = "localhost";
$dbname = "barterbetter";
$username = "root";
$password = "";


// Create connection
$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);


if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

echo "Connection Successful" . $mysqli->connect_error;

return $mysqli->connect_errno;


?>