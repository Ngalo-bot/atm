<?php 

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

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Customers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
          <input id="accnumber" type="number" class="form-control" id="phone" placeholder="Enter Account Number" required>
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
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'scripts.php' ?>
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


       



    });
</script>