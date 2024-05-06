<?php 
include 'header.php';
// $_POST['logged']="logged";


    if (isset($_POST['logged'])){

        $log=$_POST['logged'];

        if ($log=="logged"){
            include 'dash.php' ;
            
        }
        else{
            // include 'stand.php';
            header("Location:stand.php");
            
        }

    }
    else{
        // include 'stand.php';
        header('Location:stand.php');
        // echo "Nthing";
    }



//   include 'scripts.php';
?>

    </body>

</html>