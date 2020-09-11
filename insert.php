<?php
include("main.php");
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
    $arr=[$MaSV, $HoSV, $TenSV, $Phai,$NgaySinh, $NoiSinh,$Khoa,$HocBong];
    $sql="INSERT INTO DMSV (MaSV,HoSV,TenSV,Phai,NgaySinh,NoiSinh,MaKhoa,HocBong) values (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $conn=null;
    echo "insert success";
    include("index.html");

}catch(PDOException $e){
    echo $e->getMessage();
}

?>