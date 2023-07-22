<?php
if(isset($_POST['signup-submit'])){
    require 'db.php';
  
     $email=$_POST['mail'];
    $mobile=$_POST['phone'];
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $password1=$_POST['psw1'];
    if(empty($username)||empty($mobile)||empty($password)||empty($password1)||empty($email)){
        header("Location:../signup.php?error=emptydata");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL )&&!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location:../signup.php?error=validateemailorpassword");
        exit();
    }
    
    else if($password!==$password1){
        header("Location:../signup.php?error=validateemailorpassword");
        exit();
    }
    else{
        $sql="select cusername from customers where cusername=?";
        $stmt =mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../signup.php?error=somethingwentwrongs");
        exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result=mysqli_stmt_num_rows($stmt);
            if($result>0){
                header("Location:../signup.php?error=usertaken&mail".$email);
        exit();
            }
            else{
              
                
                $sql="insert into customers (cmob,cusername, email, cpassword) values ( ?, ?, ?, ?)";
                $stmt=mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:../signup.php?error=somethingwentwrong");
                exit();
                }
                else{
                    $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ssss",$mobile,$username,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                  
                    header("Location:../index.php?registeredsuccessfully");
                    exit();
            }
        }
    }
                }
                mysqli_stmt_close($stmt);
    mysqli_close($con);
}
if(isset($_POST['signup-submitcheckout'])){
    require 'db.php';
  
     $email=$_POST['mail'];
    $mobile=$_POST['phone'];
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $password1=$_POST['psw1'];
    if(empty($username)||empty($mobile)||empty($password)||empty($password1)||empty($email)){
        header("Location:../signup.php?error=emptydata");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL )&&!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location:../signup.php?error=validateemailorpassword");
        exit();
    }
    
    else if($password!==$password1){
        header("Location:../signup.php?error=validateemailorpassword");
        exit();
    }
    else{
        $sql="select cusername from customers where cusername=?";
        $stmt =mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../signup.php?error=somethingwentwrongs");
        exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result=mysqli_stmt_num_rows($stmt);
            if($result>0){
                header("Location:../signup.php?error=usertaken&mail".$email);
        exit();
            }
            else{
              
                
                $sql="insert into customers (cmob,cusername, email, cpassword) values ( ?, ?, ?, ?)";
                $stmt=mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:../signup.php?error=somethingwentwrong");
                exit();
                }
                else{
                    $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ssss",$mobile,$username,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                  
                    header("Location:../checkout.php");
                    exit();
            }
        }
    }
                }
                mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    header("Location:../signup.php");
}