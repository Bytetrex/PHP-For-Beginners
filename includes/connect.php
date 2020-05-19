<?php
/* Welcome to the database connection file, here you have to enter
your MySQL database details.

If your username is not 'root' please change it to the corresponding one,
if you have a password replace 'NULL' with your password inside speachmarks,
E.G. "MyPassword"

Make sure to create a database called "main" and upload the sql file either through
PHPMyAdmin, MySQL workbench, etc.

P.S. Please keep 'localhost' as is.
*/

$mysqli = new mysqli("localhost", "root", NULL, "main");
if($mysqli->connect_error) {
    echo "Failed to connect: " . $mysqli->connect_error;
}
?>
