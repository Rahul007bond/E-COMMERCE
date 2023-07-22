<?php
include "includes/db.php";

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  $search=$q;
    $start=0;
    $limit=5;
 
$sql="select * from uproducts where product_title like '%".$q."%' or productkeyword like '%".$q."%' limit  $start,$limit ";
    $runpl=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($runpl))
    {   $id=$row['id'];
        $name=$row['product_title'];
        $hint=$hint."<a  href='product-detail.php?pro_id=$id' ><p  style='white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 500px;'>$name</p></a><h1 style='white-space:pre; background-color:black;'></h1>";
    }
  
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>