<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Atm</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
        <div class="container text-primary my-custom-background"
            style="width:70%;height:610px;margin-left: 186px;margin-right: 56px;margin-top: 25px;">
            <div class="row" style="margin-bottom: -6px;margin-left: 97px;"></div>
            <div class="row" style="margin-left: 45px;margin-right: 60px;">
                <div class="col-md-8 col-lg-7"><span style="font-size: large; color: white; font-weight: bold; "
                        width="257" height="49">ATM | VBANK</span></div>
                <div class="col-lg-5">
                    <select class="form-select" aria-label="Default select" style="width:100px;margin-left:190px;" disabled>
                        <option selected><span>Login</span></option>
                        
                    </select>
                    <!-- <button id="logout" class="btn btn-primary langbtn" type="button"><a -->
                            <!-- href="index.php" style="text-decoration:none; color:blue;">Logout</button></a> -->
                </div>
            </div>
            <div class="row" style="margin-bottom: 40px;margin-left: 103px;">
                <div class="col"></div>
            </div>

            <div class="row" style="margin-bottom: 34px;margin-left: 45px;">
                <div class="col-md-3" id="usepwd"><span style="font-size: large; color: white; font-weight: bold;">Use PIN</span>
                </div>
                <div class="col"></div>
            </div>
            
            <!-- Modal -->
            <!-- <div class="row" style="height:100px;">
                
            </div> -->
            <div class="row">
                <div class="col-4"></div>
                <div class="col" > 
                    <img id="putfingerlogin" src="assets/img/fingerp.png" style="height:120px;margin-left:100px;"/>
                    <h1 style="color:white; font-weight:bolder;text-align:center; ">PLACE YOUR </h1>
                    <h3 style="color:red; font-weight:bolder;text-align:center;">FINGER</h3>
                    <h3 style="color:red; font-weight:bolder;text-align:center;"> TO</h3>
                    
                    <?php 
                    session_start();
                    if (!empty($_SESSION['login_error'])){
                        echo "<h3 style='color:red; font-weight:bolder;text-align:center;'>" .$_SESSION['login_error']. "</h3>";
                    }
                    ?>
                    <h3 style="color:red; font-weight:bolder;text-align:center;">LOGIN</h3>
                    <!-- <img src="assets/img/finger.gif" style="height:80%; width:100%" /> -->
                </div>
                <div class="col-4"></div>
            </div>
          
        
    </div>
    <?php include 'alerts.php'; ?>


            <?php include 'scripts.php'; ?>

            <script>
                $(document).ready(function () {

                    $("#usepwd").click(function () {

                        $("#putpwd").modal('show');
                    });

                    $("#cmodal").click(function () {

                        $("#putpwd").modal('hide');
                    });


                    $("#putfingerlogin").click(function () {

                        window.location.href='dash.php';
                        console.log('kkk');
                    });


                    const backspace=()=>{
                        const newvar=$("#pin").val().slice(0,-1);
                        $("#pin").val(newvar);
                        
                    }

                    $("#menter").click(function () {
                        const pin=$('#pin').val();
                        console.log(pin);
                        
                        const data = {
                            pin: pin,
                            
                        }

                        $.post("login.php", data, function(response) {
                            console.log("before");                                                                                         
                            })
                            .done(function(data, status) {
                                $("#cmodal").click(function () {
                                    
                                $("#putpwd").modal('hide');
                                });

                                console.log("Success:"); 
                                console.log("Response data:", data);
                                console.log("Status code:", status);

                                if(data=="DONE"){
                                    console.log("cheng screen"); 
                                    window.location.href="dash.php";
                                }else{
                                    window.location.href="stand.php";
                                }
                            })
                            .fail(function(error) {
                                console.error("Error:", error);
                            });

                        });

            });

            </script>

</body>

</html>

<script src="assets/js/stand.js"></script>