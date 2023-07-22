

<?php
include 'includes/db.php';
if(isset($_POST['getdata'])||isset($_POST['get_seleted_Category'])||isset($_POST['getcheck'])||isset($_POST['catget'])){
  
    if(isset($_POST['get_seleted_Category'])){  $search=$_POST['search'];
        $cat=$_POST['cat_id'];
        $sql="select * from products where productkeyword like '%$search%' or product_title like '%$search%' and product_catid='$cat' ";
    }
    elseif(isset($_POST['catget'])){
        $cat=$_POST['cat'];
        $start=$_POST['start'];
        $limit=$_POST['limit'];
        $sql="select * from products where product_catid='$cat' limit $start,$limit ";
    }
    elseif(isset($_POST['getcheck'])){
    $s=$_POST['s'];
   
  if(isset($_POST['avail'])&&(isset($_POST['cid']))){
    $sql="select * from products where productkeyword like '%$s%' or product_title like '%$s%' and used=1 or available > 0 ";
  }
  if(isset($_POST['cid'])){
    $sql="select * from products where productkeyword like '%$s%' or product_title like '%$s%' and used=1 ";
  }
  if(isset($_POST['avail'])){
    $sql="select * from products where productkeyword like '%$s%' or product_title like '%$s%' and available > 0 ";
  }
       
    }
    else{
        $search=$_POST['search'];
    $start=$_POST['start'];
    $limit=$_POST['limit'];
 
$sql="select * from products where product_title like '%".$search."%' or productkeyword like '%".$search."%' limit  $start,$limit ";}
    $runpl=mysqli_query($con,$sql);
if(mysqli_num_rows($runpl)>0){
 
    while($row=mysqli_fetch_assoc($runpl))
    {   $id=$row['id'];
        $name=$row['product_title'];
        $price=$row['productprice'];
        $mrp=$row['mrp'];
      
        $discount=100-round(($price/$mrp)*100,0);
       
        $imgp=$row['productimg1'];
        $star="select rating from review where proid='$id' ";
        $runstar=mysqli_query($con,$star);
        $starc=mysqli_num_rows($runstar);
        If($starc<=0){
            $starc=1;
        }
        $rs=0;
        while($rowstar=mysqli_fetch_assoc($runstar)){
            $rs+=$rowstar['rating'];
        }
        $rsd=round($rs/$starc,1);
  
   echo "<div class='col-lg-4 col-md-6 col-sm-6  pb-1'>
<div class='card product-item border-0 mb-4'>
<div class='card-header product-img position-relative overflow-hidden bg-transparent border p-0'>
   <img class='img-fluid w-100' src='img/$imgp' alt=''>
   <span style='padding:3px;font-size:13px;color:white; margin:1px; background-color:#388e3c; ' >$rsd <i class='fas fa-star'></i> </span>				
									
   <span style='padding:3px;font-size:17px;color:#388e3c; ' >-$discount% off</span>	
 
   <a  href='' class='btn btn-sm wishlistbtn'><i class='fa fa-heart'></i></a>
</div>
<div class='card-body border-left border-right text-center p-0 pt-4 pb-3'>
   <h6 class='text-truncate mb-3' >$name</h6>
   <div class='d-flex justify-content-center'>
       <h6>₹$price</h6><h6 class='text-muted ml-2'><del>₹$mrp</del></h6>
   </div>
</div>
<div class='card-footer d-flex justify-content-between border'>
   <a href='product-detail.php?pro_id=$id' class='btn btn-md nep'><i class='fas fa-eye  mr-1'></i>View Detail</a>
   <button  pid=$id class='btn btn-md btns'><i class='fas fa-shopping-cart  mr-1'></i>Add To Cart</button>
   
</div>

</div>
</div>

";



}


}
else{
    exit("<h1 style='margin-left:250px;margin-bottom:100px;'>No Products</h1>");
}
}?>