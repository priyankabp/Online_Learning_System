<?php
$servername = "localhost";
$username = "root";
$password = "bethowen152007";
$db = mysqli_connect($servername, $username, $password,'registration');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>