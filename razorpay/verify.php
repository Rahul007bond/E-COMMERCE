<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
include "../includes/db.php";
$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{$roid= $_SESSION['razorpay_order_id'];

 $userid=$_SESSION['username'];
    $razpid=  $_POST['razorpay_payment_id'];  
   
    $html = "<p>Your payment was successful</p>";
          $coid=$_POST['shopping_order_id'];
          echo $coid;
          $sql="update orders set status='success', razorpayoid='$roid', razorpaymentid='$razpid', paymentmethod='RAZORPAY',progress='ordered' where oid='$coid'";
		$run=mysqli_query($con,$sql);
        $delete="delete from cart where user_id='$userid'";
        $del=mysqli_query($con,$delete);
        unset($_SESSION['gtotal']);
        header("Location:success.php");
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
             
             $roid= $_SESSION['razorpay_order_id'];
       
           
                   $coid=$_POST['shopping_order_id'];
                   echo $coid;
                   $sql="update orders set status='Failed', razorpayoid='$roid' where oid='$coid'";
                 $run=mysqli_query($con,$sql);
}

echo $html;
