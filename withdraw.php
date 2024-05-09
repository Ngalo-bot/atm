<?php 
session_start();

if(empty($_SESSION['name'])){
    header('Location: stand.php');

}
include 'header.php'; ?>

<div class="row" style="margin-bottom: 34px;margin-left: 45px;">
    <div class="col-md-3"><span style="font-size: 30px; color: white; font-weight: bold;">Withdraw Cash</span></div>
    <div class="col"></div>
</div>

<div class="row" style="margin-bottom: 40px;margin-top: 70px;">
    <div class="col-6">
        <div class="row " style="margin-left: 45px;">
            <div class="col-3">
                <div class="card " id="one">
                    <div class="card-body">
                        <h3 class="card-title" >1</h3>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card "id="two">
                    <div class="card-body">
                        <h3 class="card-title" >2</h3>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card " id="three">
                    <div class="card-body">
                        <h3 class="card-title" >3</h3>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card " id="four">
                    <div class="card-body">
                        <h3 class="card-title" >4</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top: 9px;margin-left: 45px;">
            <div class="col-3">

                <div class="card " id="five">
                    <div class="card-body">
                        <h3 class="card-title">5</h3>

                    </div>
                </div>
            </div>

            <div class="col-3">

                <div class="card " id="six">
                    <div class="card-body">
                        <h3 class="card-title">6</h3>

                    </div>
                </div>
            </div>
            <div class="col-3">

                <div class="card " id="seven">
                    <div class="card-body">
                        <h3 class="card-title">7</h3>

                    </div>
                </div>
            </div>
            <div class="col-3">

                <div class="card " id="eight">
                    <div class="card-body">
                        <h3 class="card-title">8</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 9px;margin-left: 45px;">
            <div class="col-3">

                <div class="card " id="nine">
                    <div class="card-body">
                        <h3 class="card-title">9</h3>

                    </div>
                </div>
            </div>

            <div class="col-3">

                <div class="card " id="zero">
                    <div class="card-body">
                        <h3 class="card-title">0</h3>

                    </div>
                </div>
            </div>

            <!-- delete button -->
            <div class="col-3">
                <div class="card " id="delete">
                        <div class="card-body">
                            <h3 class="card-title fas fa-arrow-left"></h3>

                        </div>
                    </div>
                </div>

                <!-- Submit button -->
            <div class="col-3">
                <div class="card " id="submit"  >
                        <div class="card-body">
                            <h3 class="card-title fas fa-check" ></h3>

                        </div>
                    </div>
                </div>
                <?php include 'alerts.php'; ?>

            </div>

            <div class="row" style="margin-top: 9px;margin-left: 45px;">
                <div class="col-3">
                    <div class="card " id="quit"  >
                            <div class="card-body">
                                <h3 class="card-title " >Quit</h3>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    

    <!-- TEXT AREA FOR AMOUNT -->

<div class="col-2"></div>

    <div class="col-4" style="margin-top:-30px;background-color:white; border:1px solid white;border-radius:0px 0px 0px 60px;">
        <div class="row" >
            <div class="col-6">
                <div class="card " style="margin-left:35px;height:350px;width:200px;border:1px solid white;border-radius:0px 0px 0px 30px;">
                    <div class="card-body" style=" background-repeat:no-repeat; background-size: contain; background-position: top;">
                        

                        <form style="margin-top:75px;">
                            <div class="form-group">
                                <label for="amount" style="font-weight:bolder; text-align:right;">Amount</label>
                                <input id="amount"
                                    style="font-size:40px;
                                    background:rgba(0,0,0,0.3);
                                    color:white; border-style:none;
                                     font-weight:bolder; margin-left:-4px;  height:60px; width:235px; border-radius: 3%;font-family: 'Arial Rounded MT Bold', Arial, sans-serif;"
                                    type="text" class="form-control"  aria-describedby="amount">
                                <br>
                               
                            </div>
                        </form>
                        <img src="assets/img/amt1.png "/>

                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


<?php include 'alerts.php'; include 'scripts.php'; ?>
</body>

</html>

<script src="assets/js/withdraw.js"></script>