<?php
include "db.php";
session_start();

if(isset($_POST['me'])){
    $user=$_SESSION['username'];
$eml=$_POST['eml'];
$mob=$_POST['mob'];
$update="update customers set cmob='$mob', email='$eml' , verified=0 where cusername='$user' ";
unset($_SESSION['verified']);
$run=mysqli_query($con,$update);
header("Location:../my-account.php");
}?>