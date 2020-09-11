<?php
include_once("DB.php");
$DB=new ConnectDB();
$result =$DB->select();
if($result){
    include("index.html");
}else{
    echo "<script>alert('No data to show')</script>";
}
?>