<?php 
session_start();
require_once 'classes/customers.php';
include './config/db.php';


if(isset($_POST['fname']) ) {
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  // $comment=$_POST['message'];
  $phone=$_POST['phone'];
  $pin=$_POST['pin'];
  $user_id=$_SESSION['account_number'];
  
  $customer=new Customer($db);
  $add=$customer->updateCustomer($fname, $lname,$email, $phone,$pin,$user_id);
  echo $add;

}


    $name=$_SESSION['name'];
    $surname=$_SESSION['surname'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];  
    $pin=$_SESSION['pin'];

include 'header.php';
 ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Details</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body> -->
  <div class="container mt-3">
    <h2 class="mb-3" style="color:white;">ACCOUNT DETAILS</h2>
<br>
<br>
    <form  id="addnewform">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label  for="firstName" class="form-label" style="color:white;">First Name</label>
         <?php echo "<input id='fname' type='text' class='form-control' id='firstName' placeholder=" ."'".$name."' "." required>"; ?>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName" class="form-label" style="color:white;">Last Name</label>
          <?php echo "<input id='lname' type='text' class='form-control' id='firstName' placeholder=" ."'".$surname."' "." required>"; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label" style="color:white;">Email Address</label>
          <?php echo "<input id='email' type='text' class='form-control' id='firstName' placeholder=" ."'".$email."' "." required>"; ?>
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label" style="color:white;">Phone Number</label>
          <?php echo "<input id='phone' type='text' class='form-control' id='firstName' placeholder=" ."'".$phone."' "." required>"; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label" style="color:white;">Pin Number</label>
          <?php echo "<input id='pin' type='text' class='form-control' id='firstName' placeholder=" ."'".$pin."' "." required>"; ?>
        </div>
       
      </div>
      <div class="row">
        <!-- <div class="col-md-6 mb-3">
          <label for="subject" class="form-label">Customer Id</label>
          <input type="text" class="form-control" id="subject" placeholder="Enter Subject">
        </div>-->

      </div>
      <br>
<br>
      <div class="row">
        <div class="col-2">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-2">
        <button id="back" class="btn btn-primary">Back</button>
        </div>
      </div>
     
      
    </form>
   
  </div>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'scripts.php';?>


<script>
    $(document).ready(function() {

        $("#addnewform").submit(function(event) {  
            event.preventDefault(); 
            
            const fname = $("#fname").val(); 
            const lname = $("#lname").val();
            // const comment = $("#comment").val();
            const email = $("#email").val(); 
            const phone = $("#phone").val();
            const pin = $("#pin").val(); 
           
            
            
            const data = {
                fname: fname,
                lname:lname,
                email: email,               
                phone:phone,
                pin:pin,
                

                };

            $.post("acc_settings.php", data, function(response) {
                    // console.log("Success:", response); 
                    
                })
                .done(function(data){
                  
                   if(data){
                    swal({
                        title:"Done",
                        text:"Updated Sucessfully",
                        icon:"success",
                        button:"Ok",
                    })
                   }
                   else{
                    swal({
                        title:"ERROR",
                        text:"FAILED",
                        icon:"error",
                        button:"Ok",
                    })
                   }
                })
                .fail(function(error) {
                    console.error("Error:", error);
                });
               
    });

    $('#back').click(function(){
      window.location.href="dash.php";
    })

    
    $("#logout").click(function(){
            fetch('logout.php', {
                    method: 'POST',
                    credentials: 'same-origin' // Ensure that the request sends cookies
                })
                .then(response => {
                    if (response.ok) {
                    // Redirect the user to the desired page after logout
                    window.location.href = 'stand.php'; // Replace with the appropriate URL
                    } else {
                    // Handle error if logout fails
                    console.error('Logout failed.');
                    }
                })
                .catch(error => {
                    // Handle error if there is a network issue
                    console.error('Network error:', error);
                });
        })

})
</script>
