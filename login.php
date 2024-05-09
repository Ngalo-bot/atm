<?php 
  include './config/db.php';
  session_start();

  $pin=$_POST['pin'];

  if(isset($pin)){
      
      $sql = "SELECT * FROM customers WHERE pin = '$pin'";
      $result = $db->query($sql);

      if ($result->num_rows === 1) {
        $user = $result->fetch_assoc(); 
                
          $_SESSION['name'] = $user['name'];
          $_SESSION['surname'] = $user['surname']; 
          echo "DONE";
          
        
      } else {
        echo "REJECTED";
          $_SESSION['login_error'] = "Invalid username or password";
        //   header('Location: stand.php'); 
          
      }
    

  } else {
    echo " REJECTED";
      $_SESSION['login_error'] = "Invalid username or password";
      header('Location: stand.php'); 
      
  }


