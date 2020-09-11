<?php
$servername="localhost";
$username="root";
$password="Huudinh98@";
$dbname="QuanLyDiemSV";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT MaSV,TenSV,HoSV,Phai,NgaySinh,NoiSinh,TenKhoa,HocBong FROM DMSV INNER JOIN DMKhoa ON DMSV.MaKhoa=DMKhoa.MaKhoa";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // set the resulting array to associative
    // $test= $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $test=$stmt->fetchAll();
    // echo print_r($test, true);
    $conn=null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
include("index.html");
?>



