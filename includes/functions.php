<?php
include "db.php";
global $con;
function getIpAddr(){
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
$ipAddr=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ipAddr=$_SERVER['REMOTE_ADDR'];
}
return $ipAddr;
}
function item(){
	global $con;
	$getip=getIpAddr();
	$getitem="select * from cart where ip_add='$getip'";
	$runi=mysqli_query($con,$getitem);
	$counti=mysqli_num_rows($runi);

	echo $counti;
}

function totalp(){
    $ip=getIpAddr();
    global $con;
    $total=0;
    $cartp="select * from cart where ip_add='$ip'";
    $run=mysqli_query($con,$cartp);
while($row=mysqli_fetch_assoc($run)){
    $proid=$row['p_id'];$qty=$row['qty'];
    $cartpro="select * from products where id='$proid'";
  $runp=  mysqli_query($con,$cartpro);
while ($rowp=mysqli_fetch_array($runp)){
   
      $price=$rowp['productprice'];
      $subtotal=$price*$qty;
      $total+=$subtotal;

  }   

}  $total1=number_format($total)."<br>";
  echo $total1;
}
function counttotal(){
  global $con;
  $result=mysqli_query($con,"SELECT count(*) as total from products");
  $data=mysqli_fetch_assoc($result);
  echo $data['total'];
}

if(isset($_POST['count_item'])){
  item();
}

?>