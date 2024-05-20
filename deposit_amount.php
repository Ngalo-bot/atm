<?php 
include 'config/db.php';
// 'VOCOHTPTX4';
$user_id= $_POST['user_id'];
$amt=$_POST['amt'];

    if(isset($user_id)){  
        // Prepare SQL statements to prevent SQL injection
        $selectStmt = $db->prepare("SELECT balance FROM account_balance WHERE account_number = ?");
        $insertStmt = $db->prepare("UPDATE account_balance SET balance= ? WHERE account_number = ?");
        $deletStmt=$db->prepare("DELETE FROM verification_process");
        $insertBankStatement=$db->prepare("INSERT INTO bank_statement (user_id, transaction, amount) VALUES (?, ?, ?)");

        // Execute select statement with user ID
        $selectStmt->execute([$user_id]);
        $res=$selectStmt->get_result();

        // Check if a user with the provided ID exists
        if ($res) {
            $row = mysqli_fetch_array($res);

            // Extract balance from retrieved data
            $balance = intval($row["balance"]);   
            $balance=$balance+intval($amt);         

            // Execute insert statement with user ID, name, and surname
            // $deletStmt->execute();
            $insertStmt->execute([$balance,$user_id]);
            $deletStmt->execute();
            

            echo "DONE";
        } else {
            echo "Error: No user found with ID: $user_id";
            // INSERT INTO `account_balance`(`account_number`, `balance`) VALUES ('VOCOHTPTX4','1')
        }

    }
    else{
        echo "nothinh yet";
    }

