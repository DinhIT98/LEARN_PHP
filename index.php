<?php
session_start();
include_once("DB.php");
$DB=new ConnectDB();
$result =$DB->select();
$now=time();
if($_SESSION && $now<$_SESSION['expire']){
    if($result){
        include("index.html");
    }else{
        echo "<script>alert('No data to show')</script>";
    }
}else{
    session_destroy();
    include("sign_in.html");
}
?>