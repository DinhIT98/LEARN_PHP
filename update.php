<?php
include("DB.php");
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
    $flag=$DB->update($MaSV,$HoSV,$TenSV,$Phai,$NgaySinh,$NoiSinh,$Khoa,$HocBong);
    if($flag){
        echo "<script>alert('update success!')</script>";
        $result =$DB->select();
        include ("index.html");
        
    }else{
        echo "<script>alert(update failure!)</script>";
    }

}

?>