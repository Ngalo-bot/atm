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
//         $user_id="FU5ZS2AFYD";

    if(isset($_POST['fname']) ) {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        // $comment=$_POST['message'];
        $phon="0899"; //$_POST['phone'];
        $pin=$_POST['pin'];
        $user_id=$_SESSION['account_number'];
        

        $customer=new Customer($db);
        $add=$customer->updateCustomer($fname, $lname,$email, $phone,$pin,$user_id);
        echo $add;

    }
