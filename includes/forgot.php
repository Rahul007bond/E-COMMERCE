
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

include "db.php";
session_start();
if(isset($_POST['fgotp'])){
    $eml=$_POST['eml'];
   $select="select email from customers where email='$eml' ";
   $run=mysqli_query($con,$select);
   $row=mysqli_num_rows($run);
   if($row>0){
    $otp=rand(1111,9999);
    $_SESSION['emailc']=$eml;
    $_SESSION['otps']=$otp;
   
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rajpurohitrahul007bond@gmail.com';                     //SMTP username
    $mail->Password   = 'igfdcjtpetohavnx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($eml, 'User');     //Add a recipient
    

      //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP';
    $mail->Body    = 'YOUR FORGOTTEN PASSWORD WILL RESET BY THIS CODE IS '.$_SESSION['otps'].'</b>';
    $mail->AltBody = 'YOUR FORGOTTEN PASSWORD WILL RESET BY THIS CODE IS '.$_SESSION['otps'].'';

    $mail->send();
    
    
} catch (Exception $e) {

}
   }else{
     echo "wrong email";
   }

}?>