<?php 
include './config/db.php';
session_start();

$userid=$_POST['user_id'];

if(isset($userid)){
      
  $sql = "SELECT * FROM customers WHERE account_number = '$userid'";
  $result = $db->query($sql);

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc(); 
            
      $_SESSION['name'] = $user['name'];
      $_SESSION['surname'] = $user['surname']; 
      $_SESSION['account_number']=$user['account_number'];
      $_SESSION['pin']=$user['pin'];
      $_SESSION['email']=$user['email'];
      $_SESSION['phone']=$user['phone'];
      
      echo "DONE";
    //   header('Location: dash.php');
      
    
  } else {
    echo "REJECTED";
      $_SESSION['login_error'] = "Invalid username or password";
    //   header('Location: stand.php'); 
      
  }
}

 else {
  echo " REJECTED";
  $_SESSION['login_error'] = "Invalid username or password";
  // header('Location: stand.php'); 
  
}