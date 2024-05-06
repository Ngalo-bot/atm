

$(document).ready(function() {

    $("#m1").click(function() {
        
        placepin(1);
      });

      $("#m2").click(function() {

    placepin(2);
    });

    $("#m3").click(function() {

    placepin(3);
    });

    $("#m4").click(function() {

    placepin(4);
    });

    $("#m5").click(function() {

    placepin(5);
    });

    $("#m6").click(function() {

    placepin(6);
    });

    $("#m7").click(function() {

    placepin(7);
    });

    $("#m8").click(function() {

    placepin(8);
    });

    $("#m9").click(function() {

    placepin(9);
    });

    $("#m0").click(function() {

    placepin(0);
    });

   
      

    $("#mdel").click(function() {

        sbackspace();
      });

      $("#menter").click(function(){
        // verify("verify",16);
        

      });

      const sbackspace=()=>{
        const newvar=$("#pin").val().slice(0,-1);
        $("#pin").val(newvar);
        
    }

        });
