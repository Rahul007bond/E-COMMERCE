
<?php

include "../includes/db.php";
include "../includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">      <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="admin.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
       <style>
       a .btn{
border-radius: 120x;


       }
       a .btn{
        
         font-weight: bolder;
         font-family: lora;
        
       }
       .btn{
         margin: 10px;
         background-color: #2874;
       }
       .dashimg {
    height: 100px;
    width: 100px;
    position: relative;
    bottom: -15px;
   
    overflow: hidden;
    border-radius: 55px;
   
}
     </style>
	<script>
		$(document).ready(function(){
			$(".hamburger .hamburger__inner").click(function(){
			  $(".wrapper").toggleClass("active")
			})

			$(".top_navbar .fas").click(function(){
			   $(".profile_dd").toggleClass("active");
			});
		})
	</script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="hamburger__inner">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
       </div>
    </div>
    <div class="menu">
      <div class="logo">
        PHOENIX-INFO-CARE
      </div>
      <div class="right_menu">
        <ul>
          <li><i class="fas fa-user"></i>
            <div class="profile_dd">
               
               <a href="logout.php" class="dd_item">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
    
  <div class="main_container">
      <div class="sidebar ">
          <div class="sidebar__inner">
            <div class="profile">
              <div class="img">
                <img src="../n.png" alt="profile_pic">
              </div>
              <div class="profile_info">
                 <p>Welcome</p>
                 <p class="profile_name">Mr. Rahul</p>
              </div>
            </div>
            <ul>
              <li>
                <a href="index.php" >
                  <span class="icon"><i class="fas fa-dice-d6"></i></span>
                  <span class="title">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="products.php" >
                  <span class="icon"><i class="fab fa-delicious"></i></span>
                  <span class="title">Products</span>
                </a>
              </li>
              <li>
                <a href="uproducts.php" class="active">
                  <span class="icon"><i class="fab fa-delicious"></i></span>
                  <span class="title">Used Products</span>
                </a>
              </li>
              <li>
                <a href="orders.php">
                  <span class="icon"><i class="fab fa-delicious"></i></span>
                  <span class="title">Orders</span>
                </a>
              </li>
              <li>
                <a href="repairpage.php">
                  <span class="icon"><i class="fab fa-elementor"></i></span>
                  <span class="title">Repair</span>
                </a>
              </li>
            
              <li>
                <a href="users.php">
                  <span class="icon"><i class="fas fa-border-all"></i></span>
                  <span class="title">Users</span>
                </a>
              </li>
            </ul>
          </div>
      </div>
      <div class="container">
     <a class="btn btn-lg " href="products/insertproduct.php"> <div id="dashimg" >
                                    <img class="dashimg" src="../usedproduct.png">
                                </div><hr>
         Insert product
     </a>
 
    <a class="btn btn-lg " href="products/viewproducts.php"> <div id="dashimg" >
                                    <img class="dashimg" src="../usedproduct.png">
                                </div><hr>
        View all Product (<?php counttotal();?> )
    </a>
      </div>
  </div>
  
</div>	

</body>
</html>