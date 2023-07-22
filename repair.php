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
        <title>Phoenix-Info-Care</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        

        <!-- Favicon -->
        <link href="img/n.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">     <style>
        #livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}</style><link href="css/new.css" rel="stylesheet">
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
.has-search .form-control {
    padding-left: 5px;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
   
    line-height: 5px;
    text-align: center;
  
    color: #aaa;
}
.token{
    margin-right:20px;
    margin-left: 20px;
    margin-top: 20px;
}
.token input{
    height:50px;
    font-size: 22px;
}
.token button{
    margin-right:19px ;
}
    </style>
    <style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 2px solid #2874f0;  box-shadow: 5px 5px 15px #2874f0;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

.card {
    margin: auto;
    margin-top: 30px;margin-bottom: 30px;
    width: 38%;
    max-width: 600px;
    padding: 4vh 0;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-top: 12px solid #2874f0;
    border-bottom: 20px solid #2874f0;
 
}

@media(max-width:768px) {
    .card {
        width: 90%
    }
}

.title {
    color: #2874f0;
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial
}

#details {
    font-weight: 400
}

.info {
    padding: 5% 8%
}

.info .col-5 {
    padding: 0
}

#heading {
    color: grey;
    line-height: 6vh
}

.pricing {
    background-color: #ddd3;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5
}

.pricing .col-3 {
    padding: 0
}

.card .total {
    padding: 2vh 8%;
    color: #2874f0;
    font-weight: bold
}

.card.total .col-3 {
    padding: 0
}

.card.footer {
    padding: 0 8%;
    font-size: x-small;
    color: black
}

.card.footer img {
    height: 5vh;
    opacity: 0.2
}

.card.footer a {
    color: #2874f0
}

.card .footer .col-10,
.col-2 {
    display: flex;
    padding: 3vh 0 0;
    align-items: center
}

.card .footer .row {
    margin: 0
}

#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: #2874f0;
    padding-left: 0px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: 14px;
    font-weight: bold;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: rgb(160, 159, 159)
}

#progressbar #step1:before {
    content: "";
    color: #2874f0;
    width: 5px;
    height: 5px;
    margin-left: 0px !important
}

#progressbar #step2:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-left: 32%
}

#progressbar #step3:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 32%
}

#progressbar #step4:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 0px !important
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh
}

#progressbar li:after {
    content: '';
    height: 2px;
    background: #ddd;
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 1px;
    z-index: 1
}

.progress-track {
    padding: 0 8%
}

#progressbar li:nth-child(2):after {
    margin-right: auto
}

#progressbar li:nth-child(1):after {
    margin: auto
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%
}

#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%
}

#progressbar li.active {
    color: black
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #2874f0;}
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
                        <a href="repair.php" class="nav-item nav-link active">Repair Status</a>
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
                    <li class="breadcrumb-item" style="color: #1161ee;"><a href="index.php">Home</a></li>
                    
                    <li class="breadcrumb-item active">Repair</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

           <form method="post">    
    <div class="input-group col-md-6 token container">
    <input type="text" id="tokenf" class="form-control" placeholder="Token ID">
    <div class="input-group-append">
      <button class="btn btn-secondary" id="tokenbtn" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
           </form>
           <div class="container" id="resultto">

</div>
         
  <div class="container-fluid">
  <img src="fix.gif" style="margin-left: 35%; margin-right:35%;width:30%">
  <h2 style="margin-left: 12px; margin-top:20px;">Our Services:</h2>
  <div class="row gallerybyme container">
      
  <div class="gallery">
  <a target="_blank" href="img_5terre.jpg">
    <img src="img/repair1.jpg" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="img_forest.jpg">
    <img src="img/repair2.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="img_lights.jpg">
    <img src="img/s5.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>


  </div>
  </div>
           
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
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
            $("body").delegate("#tokenbtn","click",function(event){

var tok=$("#tokenf").val();
$.ajax({
url : "repairprocess.php",
method : "POST",
data : { token:1,tokenid:tok},
success:function(data){
    $("#resultto").html(data);
 

}

});
});
        </script>
    
    </body>
</html>
