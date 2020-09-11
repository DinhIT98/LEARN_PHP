<?php
include_once("DB.php");
$DB=new ConnectDB();
if(isset($_POST['submit'])){

    $MaSV=$_POST['MaSV'];
    $HoSV=$_POST['HoSV'];
    $TenSV=$_POST['TenSV'];
    $Phai=$_POST['gender'];
    $NgaySinh=$_POST['NgaySinh'];
    $NoiSinh=$_POST['NoiSinh'];
    $Khoa=$_POST['Khoa'];
    $HocBong=$_POST['HocBong'];
    $flag=$DB->insert($MaSV,$HoSV,$TenSV,$Phai,$NgaySinh,$NoiSinh,$Khoa,$HocBong);
    if($flag){
        echo "<script>alert('insert success!')</script>";
        $result =$DB->select();
        include ("index.html");
        
    }else{
        echo "<script>alert(insert failure!)</script>";
    }

}
?>