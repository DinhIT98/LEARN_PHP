<?php
$servername="localhost";
$username="root";
$password="Huudinh98@";
$dbname="QuanLyDiemSV";
$MaSV=$_POST['MaSV'];
$HoSV=$_POST['HoSV'];
$TenSV=$_POST['TenSV'];
$Phai=$_POST['gender'];
$NgaySinh=$_POST['NgaySinh'];
$NoiSinh=$_POST['NoiSinh'];
$Khoa=$_POST['Khoa'];
$HocBong=$_POST['HocBong'];
$HocBong_f=floatval($HocBong);
try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connected";
    $sql="INSERT INTO DMSV (MaSV,HoSV,TenSV,Phai,NgaySinh,NoiSinh,MaKhoa,HocBong) values ($MaSV, $HoSV, $TenSV, $Phai,$NgaySinh, $NoiSinh,$Khoa,$HocBong_f)";
    $conn->exec($sql);
    include("insert.html");

}catch(PDOException $e){
    echo $e->getMessage();
}


?>