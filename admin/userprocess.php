<?php
include "../includes/db.php";
if(isset($_POST['getdata'])||isset($_POST['getdatas'])){
    if(!isset($_POST['getdatas'])){
    $start=$_POST['start'];
    $limit=$_POST['limit'];
 
$sql="select * from customers limit  $start,$limit ";}else{
    $sql="select * from customers  ";  
}
    $runpl=mysqli_query($con,$sql);
if(mysqli_num_rows($runpl)>0){
 echo "  <tr>
 <th>ID</th>
 <th>CUSERNAME</th>
  <th>CMOBILE</th>
 <th>EMAIL</th> 
 <th>VERIFIED</th>

 
 

 <th>DELETE</th> 
 
 
</tr >";
    while($row=mysqli_fetch_assoc($runpl))
    {   $id=$row['cid'];
        $img =$row['cusername'];
        $name=$row['cmob'];
        $cat=$row['email'];
        $date=$row['verified'];
       

        echo "
        <tr>
        <td>$id</td>
        <td>$img</td>
        <td>$name</td>
      
        <td>$cat</td>
        <td>$date</td>
       
    
       
        <td><a href='deleteuser.php?user_id=$id'>Delete</a></td>
      </tr>
       ";
      
        }
    }}