




<?php

include "includes/db.php";
require "includes/functions.php";
if(isset($_GET['search'])){
    $search=mysqli_real_escape_string($con,trim($_GET['search']));
}else{
    $search="";
}
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
       <title>Phoenix-Info-Care</title>
       <meta content="width=device-width, initial-scale=1.0" name="viewport">
       

       <!-- Favicon -->
       <link href="n.png" rel="icon">

       <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

       <!-- CSS Libraries -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
       <link href="lib/slick/slick.css" rel="stylesheet">
       <link href="lib/slick/slick-theme.css" rel="stylesheet">

       <!-- Template Stylesheet -->
       <link href="css/style.css" rel="stylesheet"> <link href="css/new.css" rel="stylesheet">
       <style>
        #livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}

         .filter{
           border: 2px solid #2874f0;
           box-shadow: 3px 2px 12px #2874f0;
           padding-left: 10px;
       
         }
         .filter h5{
           padding-top: 7px;
           font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-size: 27px;
         }
         #deskfilter{
           margin-bottom: 30px;

         }

        
         @media only screen and (max-width: 768px) {
 /* For mobile phones: */
 #deskfilter {
  display: none;
  
 }
.card-footer .btn{
     font-size: 16px; 
  }
}
@media only screen and (min-width: 769px){
.mobilefilter{
display: none;
}}
.wishlistbtn {
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

       }
   </style>
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
   </head>

   <body>
       <!-- Top bar Start -->
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
                       <a href="search.php" class="nav-item nav-link active">Buy Used</a>

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
                    <form action="search.php" method="get">
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
       
       <!-- Breadcrumb Start -->
       <div class="breadcrumb-wrap">
           <div class="container-fluid">
               <ul class="breadcrumb">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item"><a href="#">Products</a></li>
                   <li class="breadcrumb-item active">Product List</li>
               </ul>
           </div>
       </div>
       <!-- Breadcrumb End -->
       
       <!-- Product List Start -->
       <div class="product-view">
           <div class="container-fluid">
               <div class="row">
                 
<!-- Side Bar Start -->
                   
                   <div class="col-lg-3 ">
                       <!-- Section: Sidebar -->
<section id="deskfilter">
<!-- Section: Filters -->
<section class="filter" >

  <h5>Filters</h5>
  <hr style="padding-left: 0px; border: 1px dotted #2874f0;">

  <!-- Section: Condition -->
  <section class="mb-4">

    <h6 class="font-weight-bold mb-3">Condition</h6>

    
   <hr>
    <div class="form-check ">
      <input type="checkbox" ccid="0" value="0" class="form-check-input filled-in" id="useds">
      <label class="form-check-label small text-uppercase card-link-secondary" for="used">Available</label>
    </div>
   
  </section>
  <!-- Section: Condition -->

  <section class="mb-4">

    <h6 class="font-weight-bold mb-3">Categories</h6>
    <?php
        $psql="select * from pcat";
    	$pcat=mysqli_query($con,$psql);
        while ($rows =mysqli_fetch_array($pcat)) {
            $ptitle=$rows['pcattitle'];
            $id=$rows['pcatid'];
         
            echo"
    <a href='#!' cid='$id' class='category'>
    <h7 class='font-weight-bold m-1'>$ptitle</h7>
    </a><hr>";}?>



  </section>
  <!-- Section: Average -->


  <!-- Section: Price version 2 -->
  <!-- <section class="mb-4">

    <h6 class="font-weight-bold mb-3">Price</h6>

    <div class="slider-price d-flex align-items-center my-4">
      <span class="font-weight-normal   mr-2">$0</span>
      <form class="multi-range-field w-100 mb-1">
        <input id="multi" class="multi-range" type="range" min="0" max="100" />
      </form>
      <span class="font-weight-normal   " style="margin-right: 26px;">$100</span>
    </div>

  </section> -->
  <!-- Section: Price version 2 -->



</section>
<!-- Section: Filters -->

</section>
<!-- Section: Sidebar -->
                   </div>
                    <!-- Side Bar End --></section>
                 
                   <div class="col-lg-9">
                       <div class="row">
                         <div class="col-md-12 mobilefilter">
                           <div class="product-view-top">
                               <div class="row">
                                   
                                   <div class="col-md-4">
                                       <div class="product-short">
                                           <div class="dropdown">
                                               <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                               <div class="dropdown-menu dropdown-menu-right">
                                                   <a href="#" class="dropdown-item">Newest</a>
                                                   <a href="#" class="dropdown-item">Popular</a>
                                                   <a href="#" class="dropdown-item">Most sale</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="product-price-range">
                                           <div class="dropdown">
                                               <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                               <div class="dropdown-menu dropdown-menu-right">
                                                   <a href="#" class="dropdown-item">$0 to $50</a>
                                                   <a href="#" class="dropdown-item">$51 to $100</a>
                                                   <a href="#" class="dropdown-item">$101 to $150</a>
                                                   <a href="#" class="dropdown-item">$151 to $200</a>
                                                   <a href="#" class="dropdown-item">$201 to $250</a>
                                                   <a href="#" class="dropdown-item">$251 to $300</a>
                                                   <a href="#" class="dropdown-item">$301 to $350</a>
                                                   <a href="#" class="dropdown-item">$351 to $400</a>
                                                   <a href="#" class="dropdown-item">$401 to $450</a>
                                                   <a href="#" class="dropdown-item">$451 to $500</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
                         <div class="col-lg-12 row resultss">
                        
                         </div> 
                       <!-- Pagination Start -->
                       <div class="col-md-12 " >
                        
                           <button style="margin-left:33%" class="btn btn-md" id="asd">show more products</button>
                         
                       </div>
                       <!-- Pagination Start -->
                   </div>           
                   
                
               </div>
           </div>
       </div>
       </div>
       <!-- Product List End -->  
       
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
                               <p><i class="fa fa-map-marker"></i>No address</p>
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
                       <p>Copyright &copy; <a href="#">7</a>. All Rights Reserved</p>
                   </div>

                   <div class="col-md-6 template-by">
                       <p>Template By <a href="#">Gr. no.7</a></p>
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
       <script src="lib/slick/slick.min.js"></script>  
       <script>
       var start=0;
       var limit=6;
       var reached=false; 
       var search="<?php echo $search;?>";
       $("#asd").click(function(){
          
               getdata();
           
       });
       $(document).ready(function(){
           getdata();
       });
     
       function getdata(){
           if(reached)

               return;
           
           $.ajax({
               url:'news.php',
               method:'POST',
               
               data:{
                   getdata:1,
                   start:start,
                   limit:limit,
                   search:search
               },
               success:function(data){
                   if(data==("reached")){
                       reached=true;
                   }
                   else{
                       
                       limit+=limit;
                      
                       $(".resultss").html(data);
                   }
                   
               }

           });
       }
       </script>   
       
       <script>
           
      $('#useds').click(function() {
                var cc=$(this).attr('ccid');
                <?php
if(isset($_GET['search'])){?>
    var search="<?php echo $search;?>"; <?php }?>
  
    
    //-->this will alert id of checked checkbox.
       if(this.checked){
            $.ajax({
                type: "POST",
                url: "news.php",
                data:{getcheck:1,avail:cc, <?php if(isset($_GET['search'])){?>
    s:search; <?php }?>}, 
                success	:	function(data){
            $(".resultss").html(data);
            
        }
            });

            }
            else{
                getdata();
            }
      });
       
       </script>
          <script >$("body").delegate(".category","click",function(event){
    $(".resultss").html("<h3>Loading...</h3>");
    event.preventDefault();
    var cid = $(this).attr('cid');
    var search="<?php echo $search;?>";
    
    
        $.ajax({
        url		:	"news.php",
        method	:	"POST",
        data	:	{get_seleted_Category:1,cat_id:cid,search:search
          },
        success	:	function(data){
            $(".resultss").html(data);
            
        }
    })

})
</script> <script>

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
    xmlhttp.open("GET","liveu.php?q="+str,true);
    xmlhttp.send();
  }
    </script>
       <!-- Template Javascript -->
       <script src="js/main.js"></script>
   </body>
</html>

