<?php
include "../includes/db.php";
if($_GET['user_id']){
$id=$_GET['user_id'];
$delete="delete from customers where cid='$id'";
$run=mysqli_query($con,$delete);
if($run){
header("Location:users.php");}}
else{
    header("Location:index.php");   
}
?>