<?php
include_once("DB.php");
$DB=new ConnectDB();
$flag=$DB->delete($_GET['id']);
if($flag){
    echo "<script>alert('delete success!')</script>";
    $result =$DB->select();
    include ("index.html");
}else{
    echo "<script>alert('delete failure!')</script>";
}

?>
