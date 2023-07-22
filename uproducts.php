
<?php

include "includes/db.php";
require "includes/functions.php";

session_start();

if(isset($_SESSION['username'])){
    if(!isset($_SESSION['verified'])){
header("Location:email.php");
    }
 }
if (isset($_GET['pro_id'])) {
   $prodi=$_GET['pro_id'];
   if(is_numeric($prodi)==0){
       header("Location:index.php");
       exit();
   }
   $getpro="select * from uproducts where id='$prodi'";
   $run=mysqli_query($con,$getpro);
   $row=mysqli_fetch_array($run);
   $id=$row['id'];
   $title=$row['product_title'];
   $price=$row['productprice'];
   $mrp=$row['mrp'];
   $specs=$row['specification'];
   $price1=number_format($price)."<br>";
   $mrp1=number_format($mrp)."<br>";
   $procatid=$row['product_catid'];
   $color=$row['color'];
   $dec=$row['productdesc'];
   $img=$row['productimg1'];
   $img2=$row['productimg2'];
   $img3=$row['productimg3'];
   $getprocat="select * from pcat where pcatid='$procatid'";
   $runy=mysqli_query($con,$getprocat);
   $rowy=mysqli_fetch_array($runy);
   $cid=$rowy['pcatid'];
   $ctitle=$rowy['pcattitle'];
   $star="select rating from review where proid='$prodi' ";
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


   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <title>Phoenix-Info-Care</title>
       <meta content="width=device-width, initial-scale=1.0" name="viewport">
       <meta content="eCommerce HTML Template Free Download" name="keywords">
       <meta content="eCommerce HTML Template Free Download" name="description">

       <!-- Favicon -->
         <link href="n.png" rel="icon">
         <link href="css/new.css" rel="stylesheet">
       <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

       <!-- CSS Libraries -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
       <link href="lib/slick/slick.css" rel="stylesheet">
       <link href="lib/slick/slick-theme.css" rel="stylesheet">
       <script src="https://use.fontawesome.com/9428b9218d.js"></script>
       <!-- Template Stylesheet -->
       <link href="css/style.css" rel="stylesheet">     <style>
        #livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}</style>
       <style>
       .p2 input[type=text],
       input[type=password],
       input[type=tel],
       input[type=email] {
           width: 100%;
           padding: 12px 20px;
           margin: 8px 0;
           display: inline-block;
           border: 1px solid #ccc;
           box-sizing: border-box;
       }

       /* Set a style for all buttons */
       .p2 button {
           background-color: #2874f0;
           color: white;
           padding: 14px 20px;
           margin: 8px 0;
           border: none;
           cursor: pointer;
           width: 100%;
       }

       .p2 button:hover {
           opacity: 0.8;
       }

       /* Extra styles for the cancel button */
       .p2 .cancelbtn {
           width: auto;
           padding: 10px 18px;
           background-color: #f44336;
       }

       /* Center the image and position the close button */
       .p2 .imgcontainer {
           text-align: center;
           margin: 24px 0 12px 0;
           position: relative;

       }





       .p2 span.psw {
           float: right;

       }

       /* The Modal (background) */
       .p2 .modal {
           display: none;
           /* Hidden by default */
           position: fixed;
           /* Stay in place */
           z-index: 1;
           /* Sit on top */
           left: 0;
           top: 0;
           width: 100%;
           /* Full width */
           height: 100%;
           /* Full height */
           overflow: auto;
           /* Enable scroll if needed */
           background-color: rgb(0, 0, 0);
           /* Fallback color */
           background-color: rgba(0, 0, 0, 0.4);
           /* Black w/ opacity */
           padding-top: 60px;
       }

       /* Modal Content/Box */
       .p2 .modal-content {
           background-color: #fefefe;
           margin: 5% auto 15% auto;
           /* 5% from the top, 15% from the bottom and centered */
           border: 1px solid #888;
           width: 80%;
           /* Could be more or less, depending on screen size */
       }

       /* The Close Button (x) */
       .p2 .close {
           position: absolute;
           right: 25px;
           top: 0;
           color: #000;
           font-size: 35px;
           font-weight: bold;
       }

       .p2 .close:hover,
       .p2 .close:focus {
           color: red;
           cursor: pointer;
       }

       /* Add Zoom Animation */
       .p2 .animate {
           -webkit-animation: animatezoom 0.6s;
           animation: animatezoom 0.6s
       }

       @-webkit-keyframes animatezoom {
           from {
               -webkit-transform: scale(0)
           }

           to {
               -webkit-transform: scale(1)
           }
       }

       @keyframes animatezoom {
           from {
               transform: scale(0)
           }

           to {
               transform: scale(1)
           }
       }

       .p2 .container {
           padding: 16px;
       }

       /* Change styles for span and cancel button on extra small screens */
       @media screen and (max-width: 300px) {
           .p2 span.psw {
               display: block;
               float: none;
           }

           .p2 .cancelbtn {
               width: 100%;
           }

           .p2 .sideview {
               display: block;
           }
       }

       .p2 .sideview {
           background-color: #2874f0;
           color: #fefefe;
           width: 93%;
       }
   </style>
       <style>
       .p2 .dropdown1 {
           position: static;

       }

       .p2 .dropdown-content1 {
           display: none;
           position: fixed;
           color: #2874f0;
           background-color: #f9f9f9;
           width: fit-content;
           font-weight: bold;
           box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
           padding: 12px 16px;
           z-index: 1;
           right: 20px;
       }

       .p2 .dropdown1:hover .dropdown-content1 {
           display: block;
       }

       #p2dd {
           margin: 2px;
           font-weight: normal;

       }.product-detail .nav.nav-pills .nav-link {
   color: #2874F0;
   background: #ffffff;
   border-radius: 0;
   transition: all .3s;
}

.product-detail .nav.nav-pills .nav-link:hover,
.product-detail .nav.nav-pills .nav-link.active {
   color: #ffffff;
   background: #2874F0;
}
/**********************************/
.product-detail {
   position: relative;
   width: 100%;
   padding: 30px 0;
}

.product-detail .product-detail-top,
.product-detail .product-detail-bottom {
   margin-bottom: 30px;
}

.product-detail .product-detail-top {
   padding: 0;
   background: #ffffff;
}

.product-detail .product-slider-single img {
   width: 100%;
}

.product-detail .product-slider-single-nav {
   margin: 15px 30px 30px 30px;
   border: 3px double #2874F0;
}

.product-detail .product-slider-single-nav .slider-nav-img {
   border-right: 1px solid #2874F0;
   overflow: hidden;
}

.product-detail .product-slider-single-nav img {
   width: 100%;
   transition: all .3s;
}

.product-detail .product-slider-single-nav img:hover {
   transform: scale(1.2);
}

.product-detail .product-content,
.product-detail .product-content .title,
.product-detail .product-content .ratting,
.product-detail .product-content .price,
.product-detail .product-content .details,
.product-detail .product-content .quantity,
.product-detail .product-content .action {
   position: relative;
   width: 100%;
}

.product-detail .product-content {
   padding: 30px;
}

@media (min-width: 768px) {
   .product-detail .product-content {
       padding-left: 0;
   }
}

.product-detail .product-content .title h2 {
   font-size: 23px;
   margin-bottom: 5px;
}

.product-detail .product-content .ratting {
   margin-bottom: 10px;
}

.product-detail .product-content .ratting i {
   color: #2874F0;
   font-size: 26px;
}

.product-detail .product-content .price,
.product-detail .product-content .quantity,
.product-detail .product-content .p-size,
.product-detail .product-content .p-color {
   margin-bottom: 15px;
}

.product-detail .product-content .price h4,
.product-detail .product-content .quantity h4,
.product-detail .product-content .p-size h4,
.product-detail .product-content .p-color h4 {
   display: inline-block;
   width: 140px;
   font-size: 25px;
   font-weight: bolder;
   margin-right: 5px;
}

.product-detail .product-content .price p {
   display: inline-block;
   color: #2874F0;
   font-size: 35px;
   font-weight: 700;
   margin: 0;
}

.product-detail .product-content .price span {
   color: #999999;
   text-decoration: line-through;
   margin-left: 12px;
}

.product-detail .product-content .quantity .qty {
   display: inline-block;
   font-size: 0;
}

.product-detail .product-content .quantity button {
   width: 30px;
   height: 30px;
   padding: 2px 0;
   font-size: 16px;
   text-align: center;
   color: #ffffff;
   background: #2874F0;
   border: none;
}

.product-detail .product-content .quantity button.btn-minus {
   border-radius: 4px 0 0 4px;
}

.product-detail .product-content .quantity button.btn-plus {
   border-radius: 0 4px 4px 0;
}

.product-detail .product-content .quantity input {
   width: 40px;
   height: 30px;
   color: #020202;
   font-size: 21px;
   text-align: center;
   background: #ffffff;
   border: none;
}

.product-detail .product-content .action a:first-child {
   margin-right: 11px;
}

.product-detail .product-content .action a i {
   margin-right: 5px;
   font-size: 25px;
}
.product-detail .product-content .action a {
   font-size: 20px;
 font-weight: bolder;
   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ;
}
.product-detail .nav.nav-pills .nav-link {
   color: #2874F0;
   background: #ffffff;
   border-radius: 0;
   transition: all .3s;
}

.product-detail .nav.nav-pills .nav-link:hover,
.product-detail .nav.nav-pills .nav-link.active {
   color: #ffffff;
   background: #2874F0;
}

.product-detail .tab-content {
   background: #ffffff;
   padding: 25px 15px 15px 15px;
}

.product-detail .tab-content ul {
   margin: 0;
   padding: 0;
   list-style: none;
}

.product-detail .tab-content ul li {
   margin-bottom: 10px;
}

.product-detail .tab-content ul li::before {
   content: '\f061';
   font-family: 'Font Awesome 5 Free';
   font-weight: 900;
   padding-right: 5px;
}

.product-detail .tab-content .reviews-submitted {
   position: relative;
   margin-bottom: 45px;
}

.product-detail .tab-content .reviewer {
   color: #2874F0;
   font-size: 18px;
   font-weight: 600;
}

.product-detail .tab-content .reviewer span {
   color: #666666;
   font-size: 14px;
   font-weight: 400;
}

.product-detail .tab-content .ratting {
   color: #2874F0;
   margin-bottom: 15px;
}

.product-detail .tab-content .reviews-submit .ratting {
   font-size: 24px;
}

.product-detail .tab-content .form input {
   width: 100%;
   height: 35px;
   padding: 0 15px;
   color: #666666;
   border: 1px solid #dddddd;
   border-radius: 4px;
   margin-bottom: 15px;
}

.product-detail .tab-content .form textarea {
   width: 100%;
   height: 80px;
   padding: 6px 15px;
   color: #666666;
   border: 1px solid #dddddd;
   border-radius: 4px;
   margin-bottom: 15px;
}

.product-detail .tab-content .form button {
   display: inline-block;
   height: 35px;
   padding: 0 15px;
   color: #2874F0;
   background: #ffffff;
   border: 1px solid #2874F0;
   border-radius: 4px;
   margin-bottom: 15px;
   transition: all .3s;
}

.product-detail .tab-content .form button:hover {
   color: #ffffff;
   background: #2874F0;
}



.input-rating {
 margin-bottom: 15px;
}

.input-rating .stars {
 display: inline-block;
 vertical-align: top;
 font-size: 30px;
}

.input-rating .stars input[type="radio"] {
 display: none;
}

.input-rating .stars>label {
 float: right;
 cursor: pointer;
 padding: 0px 3px;
 margin: 0px;

}

.input-rating .stars>label:before {
 content: "\f005";
 font-family: FontAwesome;
 color: #E4E7ED;
 -webkit-transition: 0.2s all;
 transition: 0.2s all;
}

.input-rating .stars>label:hover:before, .input-rating .stars>label:hover~label:before {
 color: #2874f0;
}

.input-rating .stars>input:checked label:before, .input-rating .stars>input:checked~label:before {
 content: "\f005";
 color: #2874f0;
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
               <a href="#" class="navbar-brand">MENU</a>
               <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                   <div class="navbar-nav mr-auto">
                       <a href="index.php" class="nav-item nav-link "> Home</a>
                            <a href="search.php" class="nav-item nav-link">Buy Used</a>

                       <a href="cart.php" class="nav-item nav-link">Cart</a>
                       <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                       <a href="repair.php" class="nav-item nav-link">Repair Status</a>
                       <a href="my-account.php" class="nav-item nav-link">My Account</a>
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                           <div class="dropdown-menu">
                               <a href="wishlist.php" class="dropdown-item">Wishlist</a>

                               <a href="contact.php" class="dropdown-item">Contact Us</a>

                           </div>
                       </div>
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
                                   <a><i class="fas fa-user"></i><span style="color: black;"> My-Account</span></a>
                                   <hr>
                                   <a><i class="fas fa-shopping-cart"></i><span style="color: black;"> Cart</span></a>
                                   <hr>
                                   <a><i class="fas fa-heart"></i><span style="color: black;"> Wish-List</span></a>
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
                    <input type="tel" id="phone" placeholder="Please Enter Mobile Number" name="phone"
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
                       <input type="text" placeholder="Search">
                       <button><i class="fa fa-search"></i></button>
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
                           <span>(0)</span>
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Bottom Bar End -->

       
       <!-- Breadcrumb Start -->
       <div class="breadcrumb-wrap">
           <div class="container-fluid">
               <ul class="breadcrumb">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item"><a href="#">Products</a></li>
                   <li class="breadcrumb-item active">Product Detail</li>
               </ul>
           </div>
       </div>
       <!-- Breadcrumb End -->
       
     <!-- Product Detail Start -->
       <div class="product-detail">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="product-detail-top">
                           <div class="row align-items-center">
                               <div class="col-md-5">
                                   <div class="product-slider-single normal-slider" >
                                
                                   <img  src="img/<?php echo $img; ?>" alt="Product Image">
                                 
                                   <img   src="img/<?php echo $img2; ?>" alt="Product Image">
                                       <img   src="img/<?php echo $img3; ?>" alt="Product Image">
                                      
                                   </div>
                                   <div class="product-slider-single-nav normal-slider">
                                       <div class="slider-nav-img"><img src="img/<?php echo $img; ?>" alt="Product Image"></div>
                                       <div class="slider-nav-img"><img src="img/<?php echo $img2; ?>" alt="Product Image"></div>
                                       <div class="slider-nav-img"><img src="img/<?php echo $img3; ?>" alt="Product Image"></div>
                                    
                                   </div>
                               </div>
                               <div class="col-md-2"></div>
                               <div class="col-md-5">
                                   <div class="product-content">
                                       <div class="title"><h2><?php echo $title; ?></h2></div>

                                       <span style="padding:3px;font-size:17px;color:white; background-color:#388e3c; " id="#spans"><?php echo round($rsd,1);?> <i class="fas fa-star" style="color:white;"></i></span>
                                     <hr>
                                       <div class="price">
                                           <h4>Price:</h4>
                                           <br>
                                           <p>₹<?php echo $price1; ?><span>₹<?php echo $mrp1; ?></span></p>
                                       </div>
                                       <div class="quantity">
                                           <h4>Quantity:</h4>
                                           <div class="qty">
                                            
                                               <input type="text" value="1" style="pointer-events: none;">
                                           </div>
                                       </div>

                                       <div class="p-color">
                                           <h4>Color:</h4>
                                           <div class="btn-group btn-group-lg">
                                           <button type="button" style="background-color:<?php echo $color?>;" class="btn"><?php echo $color?></button>
                                              
                                           </div> 
                                       </div>
                                       <div class="action">
                                          
                                           <a class="btn" href="cod.php?pro_id=<?php echo $prodi;?> "><i class="fa fa-shopping-bag"></i><br>Buy Now</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       
                       <div class="row product-detail-bottom">
                           <div class="col-lg-12">
                               <ul class="nav nav-pills nav-justified">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                                   </li>
                               </ul>

                               <div class="tab-content">
                                   <div id="description" class="container tab-pane active">
                                       <h4>Detailed description</h4>
                                       <p>
                                           <?php echo $dec; ?>
                                       </p>
                                   </div>
                                   <div id="specification" class="container tab-pane fade">
                                       <h4>Product specification</h4>
                                       <p>
                                           <?php echo $specs; ?>
                                       </p>
                                   </div>
                                   <div id="reviews" class="container tab-pane fade">
                                       <div class="reviews-submitted">
                                          
                                          
                                       </div>
                                       <button style="color:#2874f0; margin-bottom:20px;" class="btn btn-md" id="asds">Load More Reviews</button>
                                       <?php if(isset($_SESSION['username'])){?>
                                       <form action="" method="POST" class="reviews-submit">
                                           <h4>Give your Review:</h4>
                                           <div class="input-rating">
														<span style="font-size: 25px;">Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
                                           <div class="row form">
                                               
                                           
                                               <div class="col-sm-12">
                                                   <textarea name="rtxt"  placeholder="Review"></textarea>
                                               </div>
                                               <div class="col-sm-12">
                                                   <button name="submitr">Submit</button>
                                               </div>
                                           </div>
</form><?php }?>
                                   </div>
                               </div>
                           </div>
                       </div>
                       
                       
                       <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 id="recent" class="section-title px-5"><span class="px-2">Related Products</span></h2>
        </div>
        <div id="products" class="row products  product-slider product-slider-4">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/e.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorfuls Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹123.00</h6>
                            <h6 class="text-muted ml-2"><del>₹200.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border">
                        <a href="" class="btn btn-md"><i class="fas fa-eye  mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-md "><i class="fas fa-shopping-cart  mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

            </div>
        </div>
                       
                   </div>
                   
            
               </div>
           </div>
       </div>
       <!-- Product Detail End -->
       
       <!-- brand start -->
      <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img style="filter: grayscale(100%);" src="img/my.png" width="150" height="80"
                        alt=""></div>
                <div class="brand-item"><img style="filter: grayscale(100%);" src="img/dell.png" width="150" height="80"
                        alt=""></div>
                <div class="brand-item"><img style="filter: grayscale(100%);" src="img/jbl.png" width="150" height="80"
                        alt=""></div>
                <div class="brand-item"><img style="filter: grayscale(100%);" src="img/Quick-Heal-Logo.png"  width="150" height="80" alt="">
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
       
       <!-- Footer Start -->
       <div class="footer">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-3 col-md-6">
                       <div class="footer-widget">
                           <h2>Get in Touch</h2>
                           <div class="contact-info">
                               <p><i class="fa fa-map-marker"></i>ggggggg
                            </p>
                               <p><i class="fa fa-envelope"></i>email@example.com</p>
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
                       <p>Copyright &copy; <a href="">phoenix-info-care</a>. All Rights Reserved</p>
                   </div>

                   <div class="col-md-6 template-by">
                       <p>Template By <a href="">phoenix-info-care</a></p>
                   </div>
               </div>
           </div>
       </div>
       <!-- Footer Bottom End -->       
       
       <!-- Back to Top -->
       <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
       
       <!-- JavaScript Libraries -->
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
       <script src="lib/easing/easing.min.js"></script>
       <script src="lib/slick/slick.min.js"></script>  <script>
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
            
        <script>
var start=0;
var limit=4;
var reached=false; 
var pid=<?php echo $prodi;?>;
$("#asds").click(function(){
   
        getreview();
    
});
$(document).ready(function(){
    getreview();
});

function getreview(){
    if(reached)

        return;
    
    $.ajax({
        url:'action.php',
        method:'POST',
        
        data:{
            getreview:1,
            start:start,
            limit:limit,
            id:pid
        },
        success:function(data){
            if(data==("No Review")){
                reached=true;
            }
            else{
                
                limit+=2;
               
                $(".reviews-submitted").html(data);
            }
            
        }

    });
}
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
            $("#error").html("Wrong username or password");

        }, error: function ( thrownError) {
             alert("wrong");
          
          }
        
    
    })
}
});
    </script>
       <!-- Template Javascript -->
       <script src="js/main.js"></script>
   </body>
</html>



<?php
if(isset($_POST['submitr'])&&isset($_SESSION['username'])){
    $rname=$_SESSION['username'];
    $review=$_POST['rtxt'];
    $rating=$_POST['rating'];
    $proidr=$prodi;

    $sql="insert into review (username,review,rating,date,proid) values('$rname','$review','$rating',NOW(),'$proidr')";
    $runp=mysqli_query($con,$sql);
  
    

}?>
