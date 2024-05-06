<?php 

$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_connect($socket,"localhost",8080);

$message=$_POST['message'];
$user_id=$_POST['id'];
// $message="here";
if(!isset($message) || !isset($user_id)){
    socket_write($socket,"Nothing");
    socket_close($socket);
}
else{
    $msg=$message."-".$user_id;
    socket_write($socket,$msg);
    socket_close($socket);
}

