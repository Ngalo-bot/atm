<?php
include "config/db.php";

$user_id = $_POST['user_id'];
$state = $_POST['state'];
$temp_num = $_POST['msg'];

// Prepare SQL statements (prevents SQL injection)
$check_sql = $db->prepare("SELECT * FROM process WHERE user_id = ?");
$update_sql = $db->prepare("UPDATE process SET state = ?, temp_num = ? WHERE user_id = ?");
$insert_sql = $db->prepare("INSERT INTO process (user_id, state, temp_num) VALUES (?, ?, ?)");

// Bind parameters for prepared statements
$check_sql->bind_param("s", $user_id);
$update_sql->bind_param("sss", $state, $temp_num, $user_id);
$insert_sql->bind_param("sss", $user_id, $state, $temp_num);

// Check if user ID exists
$check_sql->execute();
$result = $check_sql->get_result();

if ($result->num_rows > 0) {
  // Update existing record
  $update_sql->execute();
  echo "Data updated successfully!";
} else {
  // Insert new data
  $insert_sql->execute();
  echo "Data inserted successfully!";
}

// Close statements and connection
$check_sql->close();
$update_sql->close();
$insert_sql->close();
$db->close();


