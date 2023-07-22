<?php
include "../includes/db.php";
if(isset($_POST['getdata'])||isset($_POST['getdatas'])||isset($_POST['ordered'])||isset($_POST['shipped'])||isset($_POST['ontheway'])||isset($_POST['delivered'])){
    if(isset($_POST['getdatas'])){
  
  $sql="select * from orders ";
}
else if(isset($_POST['ordered'])){
    $sql="select * from orders where status='success' and progress='ordered' order by id desc  ";  
}
else if(isset($_POST['shipped'])){
    $sql="select * from orders where status='success' and progress='shipped' order by id desc   ";  
}
else if(isset($_POST['ontheway'])){
    $sql="select * from orders where status='success' and progress='ontheway' order by id desc  ";  
}
else if(isset($_POST['delivered'])){
    $sql="select * from orders where status='success' and progress='delivered' order by id desc  ";  
}
else{  $start=$_POST['start'];
    $limit=$_POST['limit'];$sql="select * from orders where status='success' order by id desc limit  $start,$limit ";
     
}
    $runpl=mysqli_query($con,$sql);
  
if(mysqli_num_rows($runpl)>0){
 echo "  <tr>
 <th>ID</th>
 <th>USERNAME</th>

 
 <th>PID</th>
 <th>QTY</th>
 <th>DATE</th>
 <th>METHOD</th>

 


<th>OID</th> 
<th>PROGRESS</th>
 <th>EDIT</th> 
 
 
 
 
</tr >";
    while($row=mysqli_fetch_assoc($runpl))
    {   $id=$row['id'];
        $img =$row['username'];
        $name=$row['proid'];
        $cat=$row['qty'];
        $date=$row['date'];
        $price=$row['oid'];
        $method=$row['paymentmethod'];
        $mrp=$row['progress'];

        echo "
        <tr>
        <td>$id</td>
        <td>$img</td>
        <td>$name</td>
      
        <td>$cat</td>
        <td>$date</td>
        <td>$method</td>
        <td>$price</td>
    
        <td>$mrp</td>
        <td><a href='updateorder.php?pro_id=$id&oid=$price'>Edit</a></td> 
       
      </tr>
       ";
      
        }
    }

else{
    echo "
    <tr>
 <th>ID</th>
 <th>USERNAME</th>

 
 <th>PID</th>
 <th>QTY</th>
 <th>DATE</th>
 <th>METHOD</th>

 


<th>OID</th> 
<th>PROGRESS</th>
 <th>EDIT</th> 
 
 
 
 
</tr >
    <tr>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>

   
  </tr>";
}
}