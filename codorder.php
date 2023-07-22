<?php
include "includes/db.php";
session_start();
if(isset($_POST['get_cod'])&&isset($_SESSION['username'])){
    $user=$_SESSION['username'];
    $proid=$_POST['prid'];
    $sql="select * from uproducts where id='$proid'";
    $run=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($run);
        $price=$row['productprice'];
        $qty=$row['available'];
    if($qty){
        $oid= "COD" . rand(10000,99999999)."END";
        $insert="insert into codorders(username,proid,qty,status,oid,time) values('$user','$proid',1,'COD','$oid',NOW() )";

        $runi=mysqli_query($con,$insert);
        $update="update uproducts set available =0 where id='$proid' ";
        $runup=mysqli_query($con,$update);
        echo "<p style='color:green;'>Successfully placed order<hr>
        <a href='my-account.php'>Want to Track your order please Check it! on My account</a>
        </p>";
    }else{
        echo "<p style='color:red;'>Fail to placed order Out of stock</p>";
    }


    
}
?>