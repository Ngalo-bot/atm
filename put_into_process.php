<?php 
include 'config/db.php';
// Prepare SQL statements to prevent SQL injection
  $selectStmt = $db->prepare("SELECT name, surname FROM customers WHERE user_id = ?");
  $insertStmt = $db->prepare("INSERT INTO login_process (user_id, name, surname,status) VALUES (?, ?, ?,?)");

  // Execute select statement with user ID
  $selectStmt->execute([$user_id]);
  $res=$selectStmt->get_result();

  // Check if a user with the provided ID exists
  if ($res) {
    $row = mysqli_fetch_array($res);

    // Extract name and surname from retrieved data
    $name = $row["name"];
    $surname = $row["surname"];
    $state='logged_in';

    // Execute insert statement with user ID, name, and surname
    $insertStmt->execute([$user_id, $name, $surname,$state]);

    echo "User data (name: $name, surname: $surname) inserted into login_process successfully!";
  } else {
    echo "Error: No user found with ID: $user_id";
  }

