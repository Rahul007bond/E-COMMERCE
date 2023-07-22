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
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);?>

<button style="margin: 30%; color:#2874f0; background-color:aliceblue; border:none;" id="rzp-button1">Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    <input type="hidden" name="shopping_order_id" value="<?php echo $rand?>">
</form>

<script>
// Checkout details as a json
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
<script>
    $(document).ready(function(){
  $('#rzp-button1').trigger('click');
});
</script>
<?php
	} }
?>
