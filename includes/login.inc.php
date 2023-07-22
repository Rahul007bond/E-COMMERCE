<?php
if(isset($_POST['login-submit'])){
    require 'db.php';
    require 'functions.php';
    $username=$_POST['uname'];
    $password=$_POST['psw'];

    $time=time()-300;
    $ip=getIpAddr();
   
     if(empty($username)||empty($password)){
        header("Location:../signup.php?error=emptydata");
        exit();
    }
    else {
         $sql="select * from customers where cusername=? or cmob=?";
         $stmt=mysqli_stmt_init($con);
         if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../signup.php?error=somethingwentwrong");
        exit();
        }
        else{ 
            mysqli_stmt_bind_param($stmt,"ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
             if($row=mysqli_fetch_assoc($result)){
              
               $verify=$row['verified'];
               $pwdcheck= password_verify($password,$row['cpassword']);

            if($pwdcheck==false){
                
                $try_time=time();
            
                  header("Location:../index.php?toomattempts");
                   
        mysqli_query($con,"insert into loginlogs(IpAddress,TryTime) values('$ip','$try_time')");
                header("Location:../index.php?wrongpassword");
                exit();
               }
               else if($pwdcheck==true) {
                mysqli_query($con,"delete from loginlogs where IpAddress='$ip'");
                session_start();
                $_SESSION['username']=$row['cusername'];
                $_SESSION['mail']=$row['email'];
                if($verify==1){
                    $_SESSION['verified']="hello";
                }
                
                header("Location:../index.php?success");
                exit();
               }
               else{
                header("Location:../index.php");
                exit();
               }

        
            }
            else{
                header("Location:../index.php?error=invalidusernameorpassword");
                exit();
            }
       
        
 }
    }
}
if(isset($_POST['loginsubmitcheckout'])){
    require 'db.php';
    require 'functions.php';
    $username=$_POST['uname'];
    $password=$_POST['psw'];

    $time=time()-300;
    $ip=getIpAddr();
   
     if(empty($username)||empty($password)){
        header("Location:../signup.php?error=emptydata");
        exit();
    }
  
    else {

         $sql="select * from customers where cusername=? or cmob=?";
         $stmt=mysqli_stmt_init($con);
         if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../signup.php?error=somethingwentwrong");
        exit();
        }
        else{ 
            mysqli_stmt_bind_param($stmt,"ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
             if($row=mysqli_fetch_assoc($result)){
              
                $verify=$row['verified'];
               $pwdcheck= password_verify($password,$row['cpassword']);

            if($pwdcheck==false){
                
                $try_time=time();
            
                echo json_encode(array("statusCode"=>205));
                   
        mysqli_query($con,"insert into loginlogs(IpAddress,TryTime) values('$ip','$try_time')");
          
                exit();
               }
               else if($pwdcheck==true) {
                mysqli_query($con,"delete from loginlogs where IpAddress='$ip'");
                session_start();
                $_SESSION['username']=$row['cusername'];
           
                if($verify==1){
                    $_SESSION['verified']="hello";
                }
                
                $_SESSION['mail']=$row['email'];
               $sqlc="select * from cart where ip_add='$ip' AND user_id='-1' ";
               $runc=mysqli_query($con,$sqlc);
               while($rowc=mysqli_fetch_assoc($runc)){
                   $pid=$rowc['p_id'];
                   $ip=$rowc['ip_add'];
                   $qty=$rowc['qty'];
                   $userid=$_SESSION['username'];
                   $insertc="insert into cart(p_id,ip_add,user_id,qty) values('$pid','$ip','$userid','$qty') ";
                   $runci=mysqli_query($con,$insertc);
                   if($runc){
                       $deletec="delete from cart where p_id='$pid'AND ip_add='$ip' AND user_id='-1'";
                       mysqli_query($con,$deletec);
                   }
               }

               echo json_encode(array("statusCode"=>204));
                exit();
               }
               else{
                header("Location:../index.php");
                exit();
               }

        
            }
            else{
                echo json_encode(array("statusCode"=>214));
                exit();
            }
       
        
 }
    }
}
else{
    header("Location:../index.php");
    exit();
}