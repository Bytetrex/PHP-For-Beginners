<?php
// Session Initialisation
session_name('SessionID'); // You can change 'SessionID' to whatever you want the session to be called.
ob_start();
session_start();

// Required Files
include($_SERVER['DOCUMENT_ROOT'] . '/includes/connect.php'); // Database Connection File (MySQLi)
include ($_SERVER['DOCUMENT_ROOT'] . '/includes/Page.php');

// Create Logged In.
if(isset($_SESSION['id'])) {
    $loggedIn = $_SESSION['id'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $loggedIn);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();

// Update Last Seen When User Logs In.
    $stmt = $mysqli->prepare("UPDATE users SET lastSeen = ? WHERE id = ?");
    $userid = $user['id'];
    $lastseen = time();
    $stmt->bind_param("ii", $lastSeen, $userid);
    $stmt->execute();
}
?>
