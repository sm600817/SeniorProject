<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nfl_picks";

// Create connection_aborted(oid)	
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>