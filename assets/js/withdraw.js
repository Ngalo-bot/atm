// import {placeAmt} from 'index.js'


$(document).ready(function() {

    $("#one").click(function() {
        
        placeAmt(1);
      });

      $("#two").click(function() {

    placeAmt(2);
    });

    $("#three").click(function() {

    placeAmt(3);
    });

    $("#four").click(function() {

    placeAmt(4);
    });

    $("#five").click(function() {

    placeAmt(5);
    });

    $("#six").click(function() {

    placeAmt(6);
    });

    $("#seven").click(function() {

    placeAmt(7);
    });

    $("#eight").click(function() {

    placeAmt(8);
    });

    $("#nine").click(function() {

    placeAmt(9);
    });

    $("#zero").click(function() {

    placeAmt(0);
    });

    $("#quit").click(function(){
        
        window.location.href="./dash.php";
      });
      

    $("#delete").click(function() {

        backspace();
      });

      // $("#submit").click(function(){
      //   const id="<?php echo $userId; ?>";
      //   console.log("--");
      //   console.log(id);
      //   // verify("verify",id);
      //   $('#putfinger').modal('show');

      // });

        });
