<?php
include "../includes/db.php";
if($_GET['pro_id']){
$id=$_GET['pro_id'];
$delete="delete from products where id='$id'";
$run=mysqli_query($con,$delete);
if($run){
header("Location:viewproducts.php");}}
else{
    header("Location:index.php");   
}
?>