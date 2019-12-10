<?php
$mysqli = new mysqli("localhost", "root", NULL, "Sandbox");
if($mysqli->connect_error) {
    echo "Failed to connect: " . $mysqli->connect_error;
}
?>