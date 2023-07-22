<?php session_start();
include "db.php";
if(isset($_POST['checkotp'])){
$otp=$_POST['otp'];
if($_SESSION['otp']==$otp){
    $user=$_SESSION['username'];
   
    $_SESSION['verified']="hello";
   $update="update customers set verified=1 where cusername='$user'";
   mysqli_query($con,$update);
    echo json_encode(array("statusCode"=>200));
}
else{
    echo json_encode(array("statusCode"=>205));
}
}



if(isset($_POST['checkotpc'])){
    $otp=$_POST['otp'];
    if($_SESSION['otps']==$otp){
      
      
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>205));
    }
    }
    if(isset($_POST['changepass'])){
        $p=$_POST['pass'];
        $p1=$_POST['pass2'];
      $email=$_SESSION['emailc'];
        $sql="update customers set cpassword=? where email=?";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:changepass.php?error=somethingwentwrong");
        exit();
        }
        else{
            $hashedpwd = password_hash($p,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ss",$hashedpwd,$email);
            mysqli_stmt_execute($stmt);
            header("Location:../index.php");
            exit();
    }
    }











?>