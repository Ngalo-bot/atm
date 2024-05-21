<?php 
session_start();

if(empty($_SESSION['name'])){
    header('Location: stand.php');

}
include 'header.php'; 
include './config/db.php';
$user_id=$_SESSION['account_number'];

?>

            <div class="row" style="margin-left:100px;margin-top:100px" >
                <div class="col-2"></div>
                <div class="col" > 
                    <h1  style="text-align: center;height:120px;margin-right:350px;color:white;">Your<br>BALANCE<h1/>                                                            
                    <h3 id="balancetxt" style="text-align: center;border:2px solid white;
                    height:70px;width:50%;color:white; background-color:rgba(0,0,1,0.6);font-weight:bold;font-size:40px;">$

            <?php 
                $stmt = $db->prepare("SELECT balance FROM account_balance WHERE account_number = ?");
                $stmt->bind_param("s",$user_id);
                $stmt->execute();
                $stmt->bind_result($balance);
                $stmt->fetch();
                $stmt->close();

                echo $balance."</h3> ";
            ?>
                   
                </div>
                <div class="col-8"></div>
            </div>
            <div class="row" style="margin-top:100px"></div>
            <div class="row" style="margin-top:20px"></div>
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="btn btn-primary" id="back" style="width:80px; height:40px;" >Back</div>
                </div>
            </div>
          
        
    </di>
    <?php include 'alerts.php';include 'scripts.php'; ?>


    <script>
$(document).ready(function() {
        
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

            $("#back").click(function(){
                window.location.href="dash.php";
            })

})
    </script>

</body>

</html>

