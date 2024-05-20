<?php 
include 'config/db.php';

$user_id=  'VOCOHTPTX4';
// $_POST['userID'];

    if(isset($user_id)){  
        // Prepare SQL statements to prevent SQL injection
        $selectStmt = $db->prepare("SELECT name, surname FROM customers WHERE account_number = ?");
        $insertStmt = $db->prepare("INSERT INTO verification_process (user_id, name, surname,status) VALUES (?, ?, ?,?)");
        $deletStmt=$db->prepare("DELETE FROM verification_process");

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
            $deletStmt->execute();
            $insertStmt->execute([$user_id, $name, $surname,$state]);
            

            echo "User data (name: $name, surname: $surname) inserted into verification successfully!";
        } else {
            echo "Error: No user found with ID: $user_id";
        }

    }
    else{
        echo "nothinh yet";
    }

