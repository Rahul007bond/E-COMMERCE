<?php
include "../../includes/db.php";
if(isset($_POST['getdata'])||isset($_POST['getdatas'])){
    if(!isset($_POST['getdatas'])){
    $start=$_POST['start'];
    $limit=$_POST['limit'];
 
$sql="select * from uproducts limit  $start,$limit ";}else{
    $sql="select * from uproducts  ";  
}
    $runpl=mysqli_query($con,$sql);
if(mysqli_num_rows($runpl)>0){
 echo "  <tr>
 <th>ID</th>
 <th>IMG</th>
  <th>PRODUCTITLE</th>
 <th>PCATID</th> 
 <th>DATE</th>

 
 <th>PRICE</th> 
 <th>MRP</th>

 <th>EDIT</th> 

 <th>DELETE</th> 
 
 
</tr >";
    while($row=mysqli_fetch_assoc($runpl))
    {   $id=$row['id'];
        $img =$row['productimg1'];
        $name=$row['product_title'];
        $cat=$row['product_catid'];
        $date=$row['date'];
        $price=$row['productprice'];
        $mrp=$row['mrp'];

        echo "
        <tr>
        <td>$id</td>
        <td><img src='../../img/$img'width='50' height='60'></td>
        <td>$name</td>
      
        <td>$cat</td>
        <td>$date</td>
        <td>$price</td>
    
        <td>$mrp</td>
        <td><a href='editproduct.php?pro_id=$id'>Edit</a></td> 
        <td><a href='editproduct.php?pro_id=$id'>Delete</a></td>
      </tr>
       ";
      
        }
    }}