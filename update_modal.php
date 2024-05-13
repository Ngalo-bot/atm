<?php
include './config/db.php';
function getTextValue($db) {
  
  $sql = "SELECT temp_num FROM process ORDER BY Id DESC LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result=$stmt->get_result();


  if (!$result) {
    // $row = $result->fetch_assoc();
    
    echo "nothing";
    return null;
    
  } else {
    $row=mysqli_fetch_array($result);

    // echo $row[0];
    if(!empty($row)>0)
   
    return $row[0];
  }
}

$textValue = getTextValue($db);



echo $textValue; // Output the text value for initial update

// $_POST['completed']=1;
if(isset($_POST['completed'])){
  echo $_POST['completed'];
  $stmt=$db->prepare("DELETE FROM process");
  $stmt->execute();
}
else{
  // echo "not comple";
}