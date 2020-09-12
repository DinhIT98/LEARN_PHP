<?php
include_once("DB.php");
$DB=new ConnectDB();
$id=$_GET['id'];
$result =$DB->selectById($_GET['id']);
if($result){
   foreach($result as $key => $val)
   {
       include("update.html");
   }
}

?>