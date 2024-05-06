<?php 
$server="localhost";
$user="root";
$pwd="";
$dbname="atmdb";

$db=new mysqli($server,$user,$pwd,$dbname);

if($db->connect_error){
    die("connection failed ".$db->connect_error);
}else{
    echo "Connection Successful";
}
