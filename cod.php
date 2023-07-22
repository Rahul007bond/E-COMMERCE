<?php

 include 'includes/db.php';
 require 'includes/functions.php';

 session_start();
if($_GET['pro_id']){
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">     <style>

/*======================
    404 page
=======================*/


.page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:30px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-50px;}


        #livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}</style><link href="css/new.css" rel="stylesheet">
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
    .mutedinfo input{
        color: #696969;
    }
    .mutedinfo select{
        color:#696969;
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
    .table {
        width: 100%;
        text-align: center;
        margin-bottom: 0;
    }

    .table .thead-dark th {
        font-family: 'Source Code Pro', monospace;
        font-size: 18px;
        font-weight: 700;
        color: #353535;
        text-align: center;
        background: transparent;
        border-color: #dddddd;
        border-bottom: none;
        vertical-align: middle;
    }

    .table td {
        font-size: 16px;
        vertical-align: middle;
    }

    .table .img {
        display: flex;
        align-items: center;
    }

    .table .img img {
        max-width: 60px;
        max-height: 60px;
        margin-right: 15px;
    }

    .table .img p {
        display: inline-block;
        text-align: left;
        margin: 0;
    }

    .table .qty {
        display: inline-block;
        width: 100px;
        font-size: 0;
    }

    .table button {
        width: 30px;
        height: 30px;
        font-size: 14px;
        text-align: center;
        color: #ffffff;
        background: #2874F0;
        border: none;
        border-radius: 4px;
    }

    .table button.btn-minus {
        border-radius: 4px 0 0 4px;
    }

    .table button.btn-plus {
        border-radius: 0 4px 4px 0;
    }

    .table button.btn-cart {
        width: auto;
    }

    .table input {
        width: 40px;
        height: 30px;
        font-size: 16px;
        color: #ffffff;
        text-align: center;
        background: #000000;
        border: none;
    }

    .cart-page-inner {
        padding: 30px;
        margin-top: 0px;
        background: #ffffff;
    }

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
                        <a href="index.php" class="nav-item nav-link active"> Home</a>
                             <a href="search.php" class="nav-item nav-link">Buy Used</a>

                        <a href="cart.php" class="nav-item nav-link">Cart</a>
                        <a href="checkout.php" class="nav-item nav-link active">Checkout</a>
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


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <?php
        if(isset($_SESSION['username'])){
            $user=$_SESSION['username'];
            $sql="select * from customersinfo where username='$user'";
            $run=mysqli_query($con,$sql);
           $rowsa= mysqli_fetch_row($run);
           $proidi=$_GET['pro_id'];
           if($rowsa<1){
            echo ' 
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row ">
                <div class="col-lg-12 ">
                <form action="cod.php?pro_id='.$proidi.'" method="POST" class="checkout-inner">
                <div class="billing-address">
                    <h2>Billing Address</h2>
                    <div class="row ">
<div class="col-md-6">
                            <label>First Name</label>
                            <input class="form-control" name="fn" type="text" placeholder="First Name" required="" >
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input class="form-control"  name="ln"type="text" placeholder="Last Name"required="" >
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" name="eml" type="text"required=""  placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile No</label>
                            <input class="form-control" name="mbl" type="text"required=""  placeholder="Mobile No">
                        </div>
                        <div class="col-md-12">
                            <label>Address</label>
                            <input class="form-control" name="add" type="text" required="" placeholder="Address">
                        </div>
                        <div class="col-md-6">
                            <label>Country</label>
                            <select required="" name="ctry"  class="custom-select">
                                <option value="India" selected>India</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>City</label>
                            <input class="form-control" name="city" type="text"required=""  placeholder="City">
                        </div>
                        <div class="col-md-6">
                            <label>State</label>
                            <input class="form-control"  name="state"type="text"required=""  placeholder="State">
                        </div>
                        <div class="col-md-6">
                            <label>ZIP Code</label>
                            <input class="form-control"  name="zip"type="text"required=""  placeholder="ZIP Code">
                        </div>       
                    </div>
                </div>
            <button name="getinfo" type="submit"  class="btn btn-lg infos">Submit</button>     
            </form>
 
                       </div>
                          ';} else{
                            $sqls="select * from customersinfo where username='$user'";
                            $runs=mysqli_query($con,$sqls);
                            
                           $row=mysqli_fetch_assoc($runs);
                                
                                                                    $first=$row['firstname'];
                                                                    $last=$row['lastname'];
                                                                    $email=$row['email'];
                                                                    $mobilno=$row['mobileno'];
                                                                    $address=$row['address'];
                                                                    $city=$row['city'];
                                                                    $countru=$row['country'];
                                                                    $state=$row['state'];
                                                                    $zip=$row['zipcode']; 
                     
                         
?>


    <div class="checkout">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <div style="pointer-events: none;" class="row mutedinfo">

                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" value="<?php echo $first;?>"
                                        placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" value="<?php echo $last;?>"
                                        placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" value="<?php echo $email;?>"
                                        placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" value="<?php echo $mobilno;?>"
                                        placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" value="<?php echo $address;?>"
                                        placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select name="ctry" class="custom-select">
                                        <option value="<?php echo $countru;?>" selected><?php echo $countru;?></option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" value="<?php echo $city;?>"
                                        placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" value="<?php echo $state;?>"
                                        placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" value="<?php echo $zip;?>"
                                        placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <?php } ?>

                <div class="cart-page-inner col-md-7">
                    <h1>All products</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                    $ip=getIpAddr();
                                  
                                        $proid=$_GET['pro_id'];
                                        $cartpro="select * from uproducts where id='$proid'";
                                      $runp=  mysqli_query($con,$cartpro);
                                    while ($rowp=mysqli_fetch_array($runp)){
                                          $img=$rowp['productimg1'];
                                          $title=$rowp['product_title'];
                                          $price=$rowp['productprice'];
                                          $subtotal=$price;
                                       
                                          $price1=number_format($price)."<br>";
                                        $subtotal2=number_format($subtotal)."<br>";
                                    }
                                      echo"
                                      <tr>
                                      <td>
                                          <div class='img'>
                                              <a href='#'><img src='img/$img' alt='Image'></a>
                                              <p style='   white-space: nowrap; 
                                              width: 200px; 
                                              overflow: hidden;
                                              text-overflow: ellipsis;
                                               
                                           ' id='titlep'>$title</p>
                                          </div>
                                      </td>
                                      <td>₹$price1</td>
                                      <td>
                                         
                                              <p>1</p>
                                          
                                      </td>
                                      <td>₹$subtotal2</td>
                               
                                  </tr>
                                      ";
                                    
                                    ?>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Cart Total</h1>

                            <p class="sub-total">Total<span>₹<?php echo $subtotal;?></span></p>
                            <p class="ship-cost">Shipping Cost<span>₹<?php if($subtotal>=600){
                                                $shipping=0;
                                                echo 0;}
                                                elseif($subtotal==0){
                                                    $shipping=0;
                                                    echo 0;
                                                }
                                                else{
                                                    $shipping=40;
                                                    echo $shipping;}?></span></p>
                            <h2>Grand
                                Total<span>₹<?php $gtotal=$subtotal+$shipping; echo number_format($gtotal)."<br>"; $_SESSION['gtotal']=$gtotal; ?></span>
                            </h2>
                        </div>

                        <div class="checkout-payment">
<?php If($rowsa){?>
                            <div class="checkout-btn">
                                <button class="placeordercod">Cash on delivery</button>
                                <div class="resultss">
                                </div>
                            </div><?php }?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Checkout End -->
    <?php }
        else{
            echo ' 
            <section class="page_404">
            <div class="container">
                <div class="row">	
                <div class="col-sm-12 ">
                <div class="col-sm-12 col-sm-offset-1  text-center">
                <div class="four_zero_four_bg">
                    <h1 class="text-center">Welcome!</h1>
                
                
                </div>
                
                <div class="contant_box_404">
                <h3 class="h2">
                Please! Sign-in/up
                </h3>
                
                <p>Comming soon!</p>
                
                <a href="#" style="font-size:30px; font-weight:bolder" data-target="#id01" data-toggle="modal"   class="nav-item nav-link"  class="link_404">LOGIN</a>
            </div>
                </div>
                </div>
                </div>
            </div>
        </section>


            ';
        }?>


    </div>

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Get in Touch</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
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
                    <p>Copyright &copy; <a href="#">PHOENIX-INFO-CARE</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="#">PHOENIX-INFO-CARE</a></p>
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
    $("body").delegate(".placeordercod", "click", function(event) {
        $(".resultss").html("<h3>Loading...</h3>");
        event.preventDefault();

        var search = "<?php echo $_GET['pro_id'];?>";


        $.ajax({
            url: "codorder.php",
            method: "POST",
            data: {
                get_cod: 1,
                prid: search
            },
            success: function(data) {
                $(".resultss").html(data);

            }
        })

    })

    // $(document).ready(function(){
    //            getdata();
    //        });

    //        function getdata(){

    //            $.ajax({
    //                url:'customerinfo.php',
    //                method:'POST',

    //                data:{
    //                    getdata:1,

    //                },
    //                success:function(data){


    //                        $(".customerinfo").html(data);


    //                }

    //            });
    //        }

    //        $("body").delegate(".infos","click",function(event){
    //     $(".customerinfo").html("<h3>Loading...</h3>");
    //     event.preventDefault();




    //         $.ajax({
    //         url		:	"customerinfo.php",
    //         method	:	"POST",
    //         data	:	{getinfo:1
    //           },
    //         success	:	function(data){
    //             getdata();

    //         }
    //     })

    // })
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script> <script>

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
</body>

</html>
<?php
}else{
    header("Location:index.php");
}
                    if(isset($_POST['getinfo'])){
                        $fn=$_POST['fn'];
                        $ln=$_POST['ln'];
                        $eml=$_POST['eml'];
                        $mbl=$_POST['mbl'];
                        $add=$_POST['add'];
                        $state=$_POST['state'];
                        $city=$_POST['city'];
                        $zip=$_POST['zip'];
                        $ctry=$_POST['ctry'];
                        $user=$_SESSION['username'];
                     
                      $insert="insert into customersinfo(username,firstname,lastname,email,mobileno,address,country,city,state,zipcode)
                        values(?,?,?,?,?,?,?,?,?,?)";
                        $stmt=mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt,$insert)){
                            header("Location:../signup.php?error=somethingwentwrong");
                        exit();
                        }
                        else{
                           
                            
                            mysqli_stmt_bind_param($stmt,"sssssssssi",$user,$fn,$ln,$eml,$mbl,$add,$ctry,$city,$state,$zip);
                            mysqli_stmt_execute($stmt);                
                        echo "<meta http-equiv='refresh' content='0'>";}
                    }?>