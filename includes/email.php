<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

include "db.php";
session_start();
if(isset($_POST['changemail'])&&$_SESSION['username']){
    $mail=$_POST['eml'];
    $user=$_SESSION['username'];
    $qchange="update customers set email='$mail' where cusername='$user'";
   $run= mysqli_query($con,$qchange);
   if($run){
       echo "true";
   }else{
       echo "false";
   }
}
if(isset($_POST['gotp'])&&$_SESSION['username']){
    $eml=$_POST['eml'];
    
    $otp=rand(1111,9999);
   
    $_SESSION['otp']=$otp;
   
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rajpurohitrahul007bond@gmail.com';                     //SMTP username
    $mail->Password   = 'lwqitmzlfortuhoe';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'PHOENIX-INFO-CARE');
    $mail->addAddress($eml, 'User');     //Add a recipient
    

      //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP';
    $mail->Body    = '<div style="color:black; border:1px solid #2874f0; border-radius:12px; margin:20px;  "><h4 style="margin:5%;">YOUR VERIFICATION CODE IS <b>'.$_SESSION['otp'].'</b></h4></div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {

}

}


if(isset($_POST['checkotp'])){
$otp=$_POST['otp'];
if($_SESSION['otp']==$otp){
    session_start();
    $_SESSION['verified']="hello";
    unset($_SESSION['otp']);
    echo json_encode(array("statusCode"=>200));
}
else{
    echo json_encode(array("statusCode"=>201));
}
}?>