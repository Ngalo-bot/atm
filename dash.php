<?php 
session_start();

if(empty($_SESSION['name'])){
    header('Location: stand.php');

}
include 'header.php'; ?>

<div class="row" style="margin-bottom: 34px;margin-left: 45px;">
            <div class="col-md-3"><span style="font-size: larger; color: white; font-weight: bold;">Select Service</span></div>
            <div class="col"></div>
        </div>


        <div class="row" style="margin-left: 45px;">
            <div class="col-lg-6">
                <div class="row ">
                    <div class="col-md-4" >
                        <div class="card card1" >
                            <div class="card-body" style="margin-bottom: -16px;">
                                <h4 class="card-title"></h4>
                                <div class="row" style="margin-bottom: 40px;"></div>
                                <div class="row">
                                    <div class="col-md-11"><img style="font-size: 65px;margin-left: 13px;" src="assets/img/withdraw.png"/></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="text-center" style="margin-left: 25px;font-weight:bolder;width: 100%; font-size: large; text-align: center;">Cash</span>
                                        <span class="text-center" style="font-weight:bolder;width: 100%; font-size: 16px; text-align: center;"> Withdrawal</span>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 54px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card2">
                            <div class="card-body" style="margin-bottom: -13px;margin-top: -30px">
                                <h4 class="card-title"></h4>
                                <div class="row" style="margin-bottom: 43px;"></div>
                                <div class="row">
                                    <div class="col-md-11"><i  style="font-size: 65px;margin-left: 10px;"><img src="assets/img/cashdepo.png"/></i></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="text-center" style="margin-left: 25px;font-weight:bolder;width: 100%; font-size: large; text-align: center;">Cash</span>
                                        <span class="text-center" style="margin-left: 15px;font-weight:bolder;width: 100%; font-size: 16px; text-align: center;"> Deposit</span>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 51px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card3">
                            <div class="card-body" style="margin-bottom: 10px;">
                                <h4 class="card-title"></h4>
                                <div class="row" style="margin-bottom: 43px;"></div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-9"><img style="font-size: 65px;margin-left: 13px;" src="assets/img/pay.png"/></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="labels" style="font-weight:bolder;font-size:16px;margin-left: 14px;">SEND <br> FOR HELP!!</span>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 32px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 9px;">
                    <div class="col-md-4">
                        <div class="card card4">
                            <div class="card-body" style="margin-bottom: 10px;">
                                <h4 class="card-title"></h4>
                                <div class="row">
                                    <div class="col-md-11"><img style="margin-left: 13px; height: 45px;" src="assets/img/state.png"/></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="text-center" style="margin-left: 15px;font-weight:bolder;width: 100%; font-size: large; text-align: center;">Bank</span>
                                        <span class="text-center" style="margin-left: 0px;font-weight:bolder;width: 100%; font-size: 16px; text-align: center;">Statements</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-md-4">
                        <div class="card card5">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <div class="row">
                                    <div class="col-md-11"><img style="font-size: 65px;margin-left: 13px;" src="assets/img/aset.png"/></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="text-center" style="margin-left: 13px;font-weight:bolder;width: 100%; font-size: large; text-align: center;">Account</span>
                                        <span class="text-center" style="margin-left: 15px;font-weight:bolder;width: 100%; font-size: 16px; text-align: center;"> Settings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card6">
                            <div class="card-body" style="margin-bottom: 20px;">
                                <h4 class="card-title"></h4>
                                <div class="row">
                                    <div class="col-md-11"><i class="far fa-star" style="font-size: 62px;margin-left: 13px;"></i></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-lg-12">
                                        <span class="text-center" style="margin-left: 20px;font-weight:bolder;width: 100%; font-size: 16px; text-align: center;">Balance</span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col" style="margin-left: 120px;width:300px; border-radius: 20%;">
                <div class="carousel slide" data-bs-ride="false" id="carousel-1" style="width:200px;">
                    <div class="carousel-inner" style="width:200px">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/preview-page2.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/preview-page0.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/preview-page23.jpg" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <br>
                    <br>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php  include 'scripts.php'; ?>
</body>

</html>

<script>
    $(document).ready(function() {
        
        $(".card1").click(function(){
            switchTab('withdraw.php');
        });

        $(".card2").click(function(){
            switchTab('deposit.php');
        });

        $(".card3").click(function(){
            // switchTab('payments.php');
            swal({
                        title:"PROMPT SENT",
                        text:"SENT",
                        icon:"success",
                        button:"Ok",
                    })
        });

        $(".card4").click(function(){
            switchTab('bank_statements.php');
        });
        
        $(".card5").click(function(){
            switchTab('acc_settings.php');
        });

        $(".card6").click(function(){
            switchTab('balance.php');
        });

        const switchTab=(path)=>{
            window.location.href = path;
        }
        $("#goadmin").click(function () {
            window.location.href = "add_customers.php";
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

    });
</script>