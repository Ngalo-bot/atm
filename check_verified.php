<?php
include './config/db.php';
function getTextValue($db) {
  
  $sql = "SELECT user_id FROM verification_process ORDER BY Id DESC LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result=$stmt->get_result();


  if (!$result) {
    // $row = $result->fetch_assoc();
    
   
    return "empty";
    
  } else {
    $row=mysqli_fetch_array($result);

    // echo $row[0];
    
    if(!empty($row[0])){
   
    return $row[0];
  }else{
    return "empty";
  }
}

}
$textValue = getTextValue($db);



echo $textValue; // Output the text value for initial update

