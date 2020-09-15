<?php
include_once("DB.php");
//if not post
//redirect qua  singin.html
//return
if (!$_POST){
    // include("sign_in.html");
    header("Location: http://localhost:81/LEARN_PHP/demo/sign_in.html");
}else{

    $DB=new ConnectDB();
    $check_user=$DB->selectByEmail($_POST['email']);
    if($check_user){
        foreach($check_user as $key=>$val){
            if ($val['PASS_WORD']===$_POST['pass']){
                session_start();
                $_SESSION["email"]=$_POST['email'];
                $_SESSION["pass"]=$_POST["pass"];
                $_SESSION['start']=time();
                $_SESSION['expire']=$_SESSION['start']+(1*60);
                echo "<script>alert('Sign in success!')</script>";
                // $result =$DB->select();
                // include ("index.html");
                header("Location: http://localhost:81/LEARN_PHP/demo/index.php");
                
            }else{
                echo "<script>alert('sign in failure!')</script>";
                // include("sign_in.html");
                header("Location: http://localhost:81/LEARN_PHP/demo/sign_in.html");
            }
    
        }
    
    }
}
?>