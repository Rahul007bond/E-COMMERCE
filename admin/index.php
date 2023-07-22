<?php
session_start();
include "../includes/db.php";
if(!$_SESSION['admin']=="hello"){?>


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
  <style>
.dashb{
margin: 50px;
}
.dash {
    height: 100px;
    width: 250px;
    border: 1px solid gray;
    background-color: #2874;
    display: flex;
    justify-content: space-between;
    align-items: top;
    padding: 5px;
    overflow: visible;
    border-radius: 20px;
}.dashimg {
    height: 100px;
    width: 100px;
    position: relative;
    bottom: -15px;
    left: 15px;
    overflow: hidden;
    border-radius: 55px;
   
}
.dashimg
  {
    background: linear-gradient(43deg, #000000, #292937, #3c3c8f, #797999, #2a2a46);
    background-size: 1000% 1000%;

    -webkit-animation: AnimationName 20s ease infinite;
    -moz-animation: AnimationName 20s ease infinite;
    -o-animation: AnimationName 20s ease infinite;
    animation: AnimationName 20s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 97%}
    50%{background-position:100% 4%}
    100%{background-position:0% 97%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 97%}
    50%{background-position:100% 4%}
    100%{background-position:0% 97%}
}
@-o-keyframes AnimationName {
    0%{background-position:0% 97%}
    50%{background-position:100% 4%}
    100%{background-position:0% 97%}
}
@keyframes AnimationName {
    0%{background-position:0% 97%}
    50%{background-position:100% 4%}
    100%{background-position:0% 97%}
}

.dash h3{
  font-weight: 900;
  font-family: lora;
  
}
.dash h5{
 font-family: lora;
 font-weight: bolder;
  
}.admin-panel-first-four {
    display: grid;
    grid-template-columns: auto auto auto ;
    justify-content: center;
    align-items: center;
    gap: 85px;
    margin-bottom: 60px;
}
  </style>
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
      <div class="sidebar">
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
                <a href="index.php" class="active">
                  <span class="icon"><i class="fas fa-dice-d6"></i></span>
                  <span class="title">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="products.php">
                  <span class="icon"><i class="fab fa-delicious"></i></span>
                  <span class="title">Products</span>
                </a>
              </li>
              <li>
                <a href="uproducts.php">
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
        <div class="admin-panel-first-four">
        <?php
        $select="select count(*) as total from products";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../products.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total'];?></h3>
                                    <h5>Products</h5>
                                </div>
                            </div><?php } ?>
                            <?php
        $select="select count(*) as total1 from customers";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total1']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../users.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total1'];?></h3>
                                    <h5>Users</h5>
                                </div>
                            </div><?php } ?>
                            <?php
        $select="select count(*) as total2 from uproducts";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total2']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../usedproduct.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total2'];?></h3>
                                    <h5>Used Products</h5>
                                </div>
                            </div><?php } ?>
                            <?php
        $select="select count(*) as total3 from codorders";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total3']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../cod.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total3'];?></h3>
                                    <h5>COD</h5>
                                </div>
                            </div><?php } ?>
                            <?php
        $select="select count(*) as total from orders where status='success'";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../payrazor.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total'];?></h3>
                                    <h5>Razorpay</h5>
                                </div>
                            </div><?php } ?>
                            <?php
        $select="select count(*) as total7 from repair";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row['total7']>0){?>
        <div class="dash">
                                <div id="dashimg" >
                                    <img class="dashimg" src="../repair.png">
                                </div>
                                <div class="admin-panel-analytic-data">
                                    <h3><?php echo $row['total7'];?></h3>
                                    <h5>Repair</h5>
                                </div>
                            </div><?php } ?>
                            
      </div>
  </div>
  
</div>	

</body>
</html>
<?php } else{
 header("Location:login.php"); 
}?>