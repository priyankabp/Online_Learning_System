<?php
$servername = "localhost";
$username = "root";
$password = "bethowen152007";
$db = new mysqli($servername, $username, $password);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";
?>