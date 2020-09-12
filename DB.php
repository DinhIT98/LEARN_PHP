<?php
define('servername','localhhost');
define('dbname','QuanLyDiemSV');
define('username','root');
define('password','Huudinh98@');
// $servername="localhost";
// $dbname="QuanLyDiemSV";
// $username="root";
// $password="Huudinh98@";
class ConnectDB{
    public $connect;
    public function __construct(){
        try{
            $conn=new PDO("mysql:host=localhost;dbname=QuanLyDiemSV",username,password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connect=$conn;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function select(){
        $sql="SELECT MaSV,TenSV,HoSV,Phai,NgaySinh,NoiSinh,TenKhoa,HocBong FROM DMSV INNER JOIN DMKhoa ON DMSV.MaKhoa=DMKhoa.MaKhoa";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=$stmt->fetchAll();
        return $result;
    }
    public function insert($MaSV,$HoSV,$TenSV,$Phai,$NgaySinh,$NoiSinh,$Khoa,$HocBong){
        $arr=[$MaSV, $HoSV, $TenSV, $Phai,$NgaySinh, $NoiSinh,$Khoa,$HocBong];
        $sql="INSERT INTO DMSV (MaSV,HoSV,TenSV,Phai,NgaySinh,NoiSinh,MaKhoa,HocBong) values (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute($arr);
        return $stmt;
    }
    public function delete($id){
        $sql="DELETE FROM DMSV WHERE MaSV='$id'";
        $stmt=$this->connect->prepare($sql);
        $stmt->execute();
        // echo print_r($stmt);
        return $stmt;
    }
    public function selectById($id){
        $sql="SELECT MaSV,TenSV,HoSV,Phai,NgaySinh,NoiSinh,TenKhoa,HocBong FROM DMSV INNER JOIN DMKhoa ON DMSV.MaKhoa=DMKhoa.MaKhoa WHERE MaSV='$id'";
        $stmt=$this->connect->prepare($sql);
        $stmt->execute();
        $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=$stmt->fetchAll();
        return $result;
    }
    public function update($MaSV,$HoSV,$TenSV,$Phai,$NgaySinh,$NoiSinh,$Khoa,$HocBong){
        $sql="UPDATE DMSV SET HoSV='$HoSV',TenSV='$TenSV',Phai='$Phai',NgaySinh='$NgaySinh',NoiSinh='$NoiSinh',MaKhoa='$Khoa',HocBong='$HocBong' WHERE MaSV='$MaSV' ";
        $stmt=$this->connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
?>