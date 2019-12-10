<?php
ob_start();
session_start();
include("connect.php");
include("../classes/Page.php");

if(isset($_SESSION['id'])) {
    $loggedIn = $_SESSION['id'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $loggedIn);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();

    $stmt = $mysqli->prepare("UPDATE users SET lastseen = ? WHERE id = ?");
    $userid = $user['id'];
    $lastseen = time();
    $stmt->bind_param("ii", $lastseen, $userid);
    $stmt->execute();
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../includes/styles.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
<?php include("header.php"); ?>
</body>

</html>