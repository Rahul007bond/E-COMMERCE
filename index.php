<?php

 include "includes/db.php";
 require "includes/functions.php";


 session_start();
 if(isset($_SESSION['username'])){
    if(!isset($_SESSION['verified'])){
header("Location:email.php");
    }
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHOENIX-INFO-CARE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  

    <!-- Favicon -->
    <link href="n.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">     
    <link href="css/new.css" rel="stylesheet">
    <style>.wishlistbtn {
 float: right;
 transform: translate(-30%, -30%);
 -ms-transform: translate(-40%, -40%);
 background-color: transparent;

 color: #2874f0;
 font-size: 19px;
 padding: 9px 16px;
 border: none;
 cursor: pointer;
 border-radius: 5px;
 text-align: center;
}
        ::-webkit-scrollbar {
  width: 14px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #2874f0; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: black; 
}


#loginstyle{width: 300px;position:relative; bottom: 0px; height: auto;}
@media only screen and (max-width: 768px) {

#himg{
    display: none;
   }
   
   #loginstyle{
       width:180px;
   }

   ::-webkit-scrollbar {
  width: 4px;
}


 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #2874f0; 
  border-radius: 2px;
}
}
@media only screen and (min-width: 769px) {

#hidelog{
    display: none;
}
#hidelogin{
    display: none;
    margin: 0%;
}  


}

#livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}

.newsletter , .newsletter .btn {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
#as{
    border-radius: 15px;
}
.footer-bottom,#as,.sideview,#loginin
    {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	
}

}
.btn:hover
    {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	
}

}




.footer   {
    background: linear-gradient(52deg, #4c5955, #ffffff, #8db0e7, #41c2b4, #ffffff);
    background-size: 1000% 1000%;

    -webkit-animation: AnimationName 18s ease infinite;
    -moz-animation: AnimationName 18s ease infinite;
    -o-animation: AnimationName 18s ease infinite;
    animation: AnimationName 18s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 70%}
    50%{background-position:100% 31%}
    100%{background-position:0% 70%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 70%}
    50%{background-position:100% 31%}
    100%{background-position:0% 70%}
}
@-o-keyframes AnimationName {
    0%{background-position:0% 70%}
    50%{background-position:100% 31%}
    100%{background-position:0% 70%}
}
@keyframes AnimationName {
    0%{background-position:0% 70%}
    50%{background-position:100% 31%}
    100%{background-position:0% 70%}
}


    </style>
 
</head>

<body>
    <!-- Top bar Start -->
  
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <a href="cart.php" style="font-weight: bold;">
                        Shopping Cart = Total item: <?php item();?>, Total Price:<?php totalp();?>
                    </a>
                </div>
                <div class="col-sm-6" style="font-weight: bold;">
                    <i class="fa fa-phone-alt"></i>
                    Mobile no.
                </div>
            </div>
        </div>
    </div>
 
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid" id="tophu">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand"><?php if (isset($_SESSION['username'])){ echo 'Hi '.$_SESSION['username'].' <a id="hidelog" href="includes/logout.inc.php" class="btn btn-sm">Logout</a>';}
                else{
                    echo "<i class='fas fa-home'>Home</i>";
                }?></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active"> Home</a>
                        <a href="search.php" class="nav-item nav-link">Buy Used</a>

                        <a href="cart.php" class="nav-item nav-link">Cart</a>
                        <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                        <a href="repair.php" class="nav-item nav-link">Repair Status</a>
                        <a href="my-account.php" class="nav-item nav-link">My Account</a>
                        <a href="wishlist.php"  class="nav-item nav-link">Wishlist</a>

                                <a href="contact.php"  class="nav-item nav-link">Contact Us</a>
             
                    </div>
                    <div class="navbar-nav ml-auto p2">
                        <div class="nav-item dropdown1">
                             <?php if (!isset($_SESSION['username'])) {
  						# code...
  						echo "<a href='#' data-target='#id01' data-toggle='modal'   class='nav-item nav-link'
                          style='display: block; width:auto;'>Login</a>";
  					}else{
  						echo "<a href='my-account.php' class='nav-item nav-link'
                          style='display: block; width:auto;'>Hello! ".$_SESSION['username']."</a>";

  					}
  					?>
                                
                            <div class="dropdown-content1">
                            <?php if (!isset($_SESSION['username'])) {
  						# code...
  						echo "

                                <a href='#' data-target='#id02' data-toggle='modal'
                                    style='display: block; width:auto;'><span style='color: black;'>New Customer?</span>
                                    Register</a>";}
                                    else{echo "";}?>
                                <hr>
                                <div id="#p2dd">
                                   
                                   <?php
                                   if(isset($_SESSION['username'])){
                                       echo"
                                    <hr>
                                    <a href='includes/logout.inc.php'><i class='fas fa-sign-out-alt'></i><span style='color: black;'> Logout</span></a>
                                  "; }else{
                                      echo '';
                                  }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->
    <div id="id01" class="modal p2">


        

    </div>
    <div id="id02" class="modal p2">

<form class="modal-content animate">
        
            <div class="row">
                <div class="container col-md-4 sideview">

                    <div class="imgcontainer">

                       
                        <img src="signup1.png" id="loginstyle">
                    </div>

                </div>
                <div class="col-md-8">
                <div >
                        <form method="post" >
                    <div class="container">
                        <label for="phone"><b>Mobile :</b></label>
                        <input type="tel" id="phone" placeholder="Please Enter Mobile Number" name="phone" value="+91"
                            pattern="[+][0-9]{2}[0-9]{10}" required>

                        <label for="mail"><b>Email ID: <sub>(only @gmail.com,@outlook.com,@yahoo.com)</sub></b> </label>
                        <input type="email"  id="mail" placeholder="Enter Email-id" name="mail"  required>
                        <label for="uname"><b>Username:</b></label>
                        <input type="text" id="username" placeholder="Enter Username" name="uname" required>
                        <label for="psw"><b>Password:</b></label>
                        <input type="password" id="pass" placeholder="Enter Password" name="psw" required>
                        <label for="psw"><b>Retype-Password:</b></label>
                        <input type="password" id="pass2" placeholder="Enter Password" name="psw1" required>
<label>
                            <input type="checkbox" checked="checked" id="tmc" required name="remember"> Accept Terms and conditions
                        </label>
                        <p id="errors" style="color: #f44336;"></p>
                        <button type="button" id="sgin" name="signup-submit">Register</button>
                        
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <span class="psw">Forgot <a href="#">password?</a></span>
                        <a href="#" data-dismiss="modal"
                            style="background-color: #f44336;color: #fefefe; width: fit-content;"
                            class="nav-item nav-link" style="display: block; width:auto;">Cancel</a>

                    </div>
                        </form>
                        </div> 
                      
                       
                       
                </div>

            </div>
       
       
</form>
    </div>
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="logo3 (2).png" alt="Logo">
                        </a>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="search">
                    <form action="product-list.php" method="get">
                        <input name="search" type="text" onkeyup="showResult(this.value)" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                        <div id="livesearch"></div>
                        </form>
                    </div>
                </div>
             
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.php" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="cart.php" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(<?php item();?>)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="as">
                    <h5>✦Trending✦</h5>
                   
                    <a href="product-list.php?category=2" class="btn btn-light btn-md"><i style="margin-top: 17px;" class="fas fa-laptop fa-lg"></i> <br> Laptop</a>
                    <a href="product-list.php?category=5"class="btn btn-md"><i style="margin-top: 15px;" class="fas fa-desktop fa-lg"></i> <br> Desktop</a>
                    <a href="product-list.php?category=9"class="btn btn-md"><i style="margin-top: 15px;" class="fa fa-desktop fa-lg"></i> <br> Printer</a>
                    <a href="product-list.php?category=7"class="btn btn-md"><i style="margin-top: 15px;" class="fa fa-edit fa-2x"></i> <br> Stationaries</a>
                    <a href="product-list.php?category=8"class="btn btn-md"><i style="margin-top: 14px;" class="fa fa-microchip fa-lg"></i> <br> Spare-parts</a>
                    <a href="product-list.php?category=6"class="btn btn-md"><i style="margin-top: 14px;" class="fa fa-mobile-alt fa-lg"></i> <br> 
                       Accessories</a>

                </div>
                
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <?php
    	$getslider="select * from slider";
    	$rune=mysqli_query($con,$getslider);
        while ($row =mysqli_fetch_assoc($rune)) {
    		# code.
    		$slider_name=$row['Slidername'];
    		$slider_img=$row['Sliderimg'];
            $slider_a=$row['link'];
          
            echo "
           
            <div class='header-slider-item'>
                             <a href='$slider_a'>  <img src='img/$slider_img'class='img-fluid'width='100%' height='100%' alt='Slider Image' ></a>
                             
                            </div>";}?>

                    </div>
                </div>
                <div class="col-md-3" id="himg">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/rs1.gif" />
                            <a class="img-text" href="">
                                <p>Buy products</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/rs2.gif" />
                            <a class="img-text" href="">
                                <p>Repair Product</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

        <!-- Brand Start -->
        <div class="brand">
      <div class="container-fluid">
          <div class="brand-slider">
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/my.png" width="150" height="80"
                      alt=""></div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/dell.png" width="150" height="80"
                      alt=""></div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/jbl.png" width="150" height="80"
                      alt=""></div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/Quick-Heal-Logo.png" alt=""  width="150" height="80">
              </div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/hp.png" width="150" height="80"
                      alt=""></div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/avg.png" width="150" height="80"
                      alt=""></div>
              <div class="brand-item"><img style="filter: grayscale(100%);" src="img/mc.png" width="150" height="80"
                      alt=""></div>
          </div>
      </div>
  </div>
  <!-- Brand End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-paypal"></i>
                        <h2>Secure Payment</h2>
                        <p>
                            Secure Payment with Paypal
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck-moving"></i>
                        <h2>Free Delivery in specific area</h2>
                        <p>
                            Fast Delivery
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>No Return and No Replacement</h2>
                        <p>
                            Return and replacement is not available
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>
                            Contact us
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 id="cat" class="section-title px-5"><span class="px-2">Product Categories</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
        $psql="select * from pcat";
    	$pcat=mysqli_query($con,$psql);
        while ($rows =mysqli_fetch_array($pcat)) {
            $ptitle=$rows['pcattitle'];
            $pimg=$rows['pcatimg'];
            echo"
            <div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 pb-1'>
                <div class='cat-item d-flex flex-column border mb-3'style='padding: 20px;'>
                    
                    <a href='' class='cat-img position-relative overflow-hidden mb-3'>
                        <img class='img-fluid' src='img/$pimg' alt=''>
                    </a>
                    <h5 class='font-weight-bold m-1'>$ptitle</h5>
                </div>
            </div>";}?>
           
           
        </div>
    </div>
    <!-- Categories End -->

    <!-- Call to Action Start
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
               -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 id="trending" class="section-title px-5"><span class="px-2">Trending Products</span></h2>
        </div>
        <div id="products" class="row products  product-slider product-slider-4">
            <?php
        $sql="select * from products limit  0,8 ";
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
  
   
</div>

</div>
</div>

";



}


}?>

          
           
           
          
         
            
        </div>
    </div>
    <!-- Products End -->

    <!-- Featured Product Start -->
    <!-- <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row  product-slider product-slider-3">
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">Product Name</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php">
                                <img src="img/product-1.jpg" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">Product Name</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php">
                                <img src="img/product-2.jpg" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">Product Name</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php">
                                <img src="img/product-3.jpg" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">Product Name</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php">
                                <img src="img/product-4.jpg" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">Product Name</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php">
                                <img src="img/product-5.jpg" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Featured Product End -->

    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Subscribe Our Newsletter</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input style="background-color: white;" type="email" placeholder="Your email here">
                        <button type="button" style="margin-top: 8px ;" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Recent Product Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 id="recent" class="section-title px-5"><span class="px-2">Recents Products</span></h2>
        </div>
        <div id="products" class="row products  product-slider product-slider-4">
           
            
        <?php
        $sql="select * from products limit  0,8 ";
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
  
   
</div>

</div>
</div>

";



}


}?>

            </div>
        </div>
    </div>
    <!-- Recent Product End -->


    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Get in Touch</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>Shop No 12 Bus stop New, 60 Feet Rd, behind Omkar Colony, Pimple Gurav, Pune, Maharashtra 411061
</p>
                            <p><i class="fa fa-envelope"></i>sample@gmail.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Follow Us</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Company Info</h2>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Purchase Info</h2>
                        <ul>
                            <li><a href="#">Pyament Policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="img/godaddy.svg" alt="Payment Security" />
                        <img src="img/norton.svg" alt="Payment Security" />
                        <img src="img/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a style=" color:black; " href="#">PHOENIX-INFO-CARE</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Powered By <a style=" color:black; " href="#">Version-IT</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div class="loader-wrappers">
    <span class="loaders"><span class="loader-inners"></span></span>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    $(window).on("load",function(){
$(".loader-wrappers").fadeOut("slow");
    })
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        var modal1 = document.getElementById('id02');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
     
    </script><script src="js/action.js" >
    
    </script>
     <script>

$(document).ready(function(){
    loginp();
}); 
function loginp(){
$.ajax({
        url : "loginprocess.php",
        method : "POST",
        data : {loginp:1},
        success:function(data){
           
            $("#id01").html(data);

        }, error: function ( thrownError) {
             alert("wrong");
          
          }
        
    
    })
}



    </script>
    <script src="js/action.js"></script>
    
    <script>
      
      $(document).ready(function(){

//Add Product into Cart
$("body").delegate("#loginin","click",function(event){

var user=$("#uname").val();
var psw=$("#psw").val();
var n=user.length;
var p=psw.length;
if(n<200 && p<200){
$.ajax({
url : "includes/login.inc.php",
method : "POST",
data : { loginsubmitcheckout:1,uname:user,psw:psw},
success:function(data){
    var data=JSON.parse(data);
            if(data.statusCode==205){
              
               loginps();
              
            }
            if(data.statusCode==214){
                $("#error").html("Wrong username or password!");
                document.getElementById("error").style.color="red";
            }
            if(data.statusCode==204){
                location.reload();
            }

}


});
}else{
    alert("Too much length");
}


});

function loginps(){
$.ajax({
        url : "loginprocess.php",
        method : "POST",
        data : {loginp:1},
        success:function(data){
           
            $("#id01").html(data);
            $("#error").html("Wrong username or password!");
            document.getElementById("error").style.color="red";
        }, error: function ( thrownError) {
             alert("something went wrong!");
          
          }
        
    
    })
}
});
    </script>
    <script>
    $("#livesearch").hide();
function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    $("#livesearch").show();
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }
    </script>
</body>

</html>