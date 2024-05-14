<?php

session_start();  // Start the session

// Destroy the session
session_destroy();
include 'config/db.php';

$deletStmt=$db->prepare("DELETE FROM login_process");
$deletStmt->execute();

// Redirect the user to the login page or any other desired page
header("Location: stand.php");
exit();
