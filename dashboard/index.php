<?php
require("../includes/config.php");
if($loggedIn == false) {
    header("Location: ../register/");
}
?>
