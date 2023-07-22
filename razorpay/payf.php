
<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

include "../includes/db.php";
// Create the Razorpay Order
if(isset($_SESSION['gtotal'])){
 
    $money=$_SESSION['gtotal'];
    
    function order(){
    global $rand;
    $rand = "OID" . rand(1000000000,999999999999);}
   order(); 
  
   $_SESSION['orid']=$rand;
   $random=$_SESSION['orid'];
    $ransql="select oid from orders where oid='$random'";
    $run=mysqli_query($con,$ransql);
  
    if($runs=mysqli_fetch_row($run)>0){
        order();
    }
    if(isset($_SESSION["username"])){
        $user=$_SESSION["username"];
        $total=0;
    $select="select * from cart where user_id='$user'";
    $run=mysqli_query($con,$select);
    
    
    while($row=mysqli_fetch_assoc($run)){
        $id=$row["p_id"];
        $qty=$row["qty"];
        
        $oid=$_SESSION["orid"];
        $pro="select * from products where id='$id'";
      $runp=  mysqli_query($con,$pro);
    while ($rowp=mysqli_fetch_array($runp)){
        
          $price=$rowp['productprice'];
          $avail=$rowp['available'];
          
          $subtotal=$price*$qty;
          $total+=$subtotal;
        
        
      }
    
      $insert="insert into orders (username,proid,qty,status,oid) values('$user','$id','$qty','pending','$oid')";
      $runin=mysqli_query($con,$insert);}
    
    if($total<600){
        $total+=40;
    
    }
    else{
        $total;
    }}
if($total==$_SESSION['gtotal']){

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $total * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}



$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "PHOENIX-INFO-CARE",
    "description"       => "Buy Electronics and Repair service",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => "Daft Punk",
    "email"             => "customer@merchant.com",
    "contact"           => "9999999999",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => $rand,
    ],
    "theme"             => [
    "color"             => "#2874f0"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);?>
<?php
 include "../includes/db.php";
 require "../includes/functions.php";


 if(isset($_SESSION['username'])){
   
     ?>
     
<!doctype html>
<html>
<head> <meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        
<style>



/* Set a style for all buttons */


.p2 button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */

/* Center the image and position the close button */
.p2 .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;

}


.p2 label{
    font-size: 25px;
    font-weight: bold;
    
}


button{
    border-radius: 10px;
    padding: 10px;
}

/* The Modal (background) */
.p2 .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.p2 .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */

.p2 .container {
    padding: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    .p2 span.psw {
        display: block;
        float: none;
    }

    .p2 .cancelbtn {
        width: 100%;
    }

    .p2 .sideview {
        display: block;
    }
}

.p2 .sideview {
    background-color: #2874f0;
    color: #fefefe;
    width: 93%;
}

.p2 .dropdown1 {
    position: static;

}

.p2 .dropdown-content1 {
    display: none;
    position: fixed;
    color: #2874f0;
    background-color: #f9f9f9;
    width: fit-content;
    font-weight: bold;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 12px 16px;
    z-index: 1;
    right: 20px;
}

.p2 .dropdown1:hover .dropdown-content1 {
    display: block;
}

#p2dd {
    margin: 2px;
    font-weight: normal;

}

#partitioned {
   
  padding-left: 15px;
  letter-spacing: 42px;
  border: 0;
  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
  background-position: bottom;
  background-size: 50px 1px;
  background-repeat: repeat-x;
  background-position-x: 35px;
  width: 200px;
}
#loginstyle{width: 300px;position:relative; bottom: 0px; height: auto;}
@media only screen and (max-width: 768px) {
    #loginstyle{
       width:180px;
   }
   #rzp-button1 i{
    font-size: 10px;
   }
   #rzp-button1 {
   margin: 10%;
}
}
#rzp-button1 {
   margin: 30%; color:white;background-color:#2874f0;
}

#rzp-button1 i{
    font-size: 35px; font-weight:bold;
}

</style>

</head>
<body>

<div id="id02" class=" p2">


       <div class="modal-content animate" >
           <div class="row">
               <div class="container col-md-4 sideview">

                   <div class="imgcontainer">

                     
                       <hr>
                     
                       <img src="../razor.png" id="loginstyle">
                   </div>

               </div>
               <div class="col-md-8 classs">
      
               <?php   $price= $_SESSION['gtotal'];
             $price1=  number_format($price)."<br>";
               ?>
<button  id="rzp-button1"><i  class="fas fa-rupee-sign"> <?php echo $price1?></i><hr>Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    <input type="hidden" name="shopping_order_id" value="<?php echo $rand?>">
</form>
</div>
                   
             

           </div>
</div>

   </div>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script>
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
 



</body>
</html>
<?php
 }
else{
    header("Location:index.php");
}
?>
<?php
	} }
?>
