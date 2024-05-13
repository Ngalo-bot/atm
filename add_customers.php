<?php 
session_start();
require_once 'classes/customers.php';
include './config/db.php';

// $fname="Marvin";
//         $lname="ngol";
//         $email="dmaol.com";
//         $comment="message";
//         $phone="483276497";
//         $pin="3637";
//         $account_num="3929010101001";

    if(isset($_POST['fname']) ) {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $comment=$_POST['message'];
        $phone=$_POST['phone'];
        $pin=$_POST['pin'];
        $account_num=$_POST['account_num'];
        

        $customer=new Customer($db);
        $add=$customer->createCustomer($fname, $lname,$email, $phone,$comment,$pin,$account_num);
        echo $add;

    }

    
  
  $customer=new Customer($db);
      $account_number = $customer->generate_account_number();

      
// Assuming you have retrieved the account number from the session
    // $accountNumber = $_SESSION['account_number'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Customers</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-3">
    <h2 class="mb-3">ADD NEW CUSTOMERS</h2>

    <form  id="addnewform">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label  for="firstName" class="form-label">First Name</label>
          <input id="fname" type="text" class="form-control" id="firstName" placeholder="Enter First Name" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input id="lname" type="text" class="form-control" id="lastName" placeholder="Enter Last Name" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input id="email" type="email" class="form-control" id="email" placeholder="Enter Email" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input id="cell" type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Pin Number</label>
          <input id="pin" type="number" class="form-control" id="email" placeholder="Enter Pin" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label">Account Number</label>
          <input id="accnumber" type="text" class="form-control" id="phone" placeholder="Enter Account Number" required>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-6 mb-3">
          <label for="subject" class="form-label">Customer Id</label>
          <input type="text" class="form-control" id="subject" placeholder="Enter Subject">
        </div>-->


        
        <div class="col-md-6 mb-3">
          <label for="message" class="form-label">Comment</label>
          <textarea id="comment" class="form-control" id="message" rows="3" placeholder="Enter Message"></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>
    <button id="enroll" class="btn btn-primary">Enroll</button>
  </div>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'scripts.php'; include 'alerts.php';?>

<?php


    
  ?>

  <script>
    
      // If account number is generated, set it to the text field
      document.getElementById('accnumber').value = "<?php echo $account_number; ?>";
    
  </script>


<script>
    $(document).ready(function() {

        $("#addnewform").submit(function(event) {  
            event.preventDefault(); 
            
            const fname = $("#fname").val(); 
            const lname = $("#lname").val();
            const comment = $("#comment").val();
            const email = $("#email").val(); 
            const phone = $("#cell").val();
            const pin = $("#pin").val(); 
            const account_num = $("#accnumber").val(); 
            
            
            const data = {
                fname: fname,
                lname:lname,
                email: email,
                message: comment,
                phone:phone,
                pin:pin,
                account_num:account_num,

                };

            $.post("add_customers.php", data, function(response) {
                    console.log("Success:", response); 
                    swal({
                        title:"Done",
                        text:"Saved Sucessfully",
                        icon:"success",
                        button:"Ok",
                    })
                })
                .fail(function(error) {
                    console.error("Error:", error);
                });
               
    });


    $("#enroll").click(function() {  
      console.log("showed------")
      $('#enrollfinger').modal('show');
       const id=$('#accnumber').val();
       enroll("enroll",id);
       console.log("showed------"+id)
       
    });

    var intervalId=setInterval(updateText, 1000);

    $("#closeenmodal").click(function() { 
      $('#enrollfinger').modal('hide');
      console.log("hidden------")
      clearInterval(intervalId);
      
    }); 

    
  
    function updateText() {

      fetch('update_modal.php') // Fetch the PHP script to get the latest value
        .then(response => response.text())
        .then(data => {
         
          $('#process').text(data) ;
          const notif=$('#process').text();
          console.log(notif)
          if(notif=='Completed'){
            swal({
                        title:"Completed",
                        text:"Saved Sucessfully",
                        icon:"success",
                        button:"Ok",
                        timer:2000,
                    })
                    
            $('#enrollfinger').modal('hide');
            emptyProcess();
            clearInterval(intervalId);
          }
        })
        .catch(error => {
          console.error('Error fetching data:', error);
          // Handle errors gracefully (e.g., display an error message)
        });
    }
    
   
  const emptyProcess=()=>{
    data={
      completed:1,
    }
    $.post('update_modal.php',data,function(response){
      console.log("DELETED PROCESS")
    })
    .fail(function(error) {
        console.error("Error:", error);
    });
  }

  emptyProcess();
    });
</script>