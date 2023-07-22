<?php
include("../includes/db.php");
$proid=$_GET['pro_id'];
$user=$_GET['oid'];
$sql="select * from orders where id='$proid' and oid='$user' ";
$run=mysqli_query($con,$sql);
$row=mysqli_fetch_array($run);



$progress=$row['progress'];





?>

<!doctype html>

<html>
<head>
	<title>Edit Product</title>
</head>
<meta charset="utf-8">
        
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
        <style>
            .panel-bodys form{
				background-color: white;
			
			}
			form label{
				color: #696969;;
				font-size: 20px;
				font-weight: bolder;
				font-family: Arial, Helvetica, sans-serif;
			}
			body{
        background-color:white}
		.panel-heading{
			color:#2874f0;
		}
		.btn{
			color:white;
			background-color: #2874f0;
			font-size: 29px;
			font-weight: bolder;
			border-radius: 12px;
			
		}
		@media only screen and (max-width: 768px) {
			body{
				margin: 10px;
			}
		}
		.breadcrumb{
			color: white;
			background-color: black;
		}
        </style>
<body>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i>
				Dashboard / Update Order
			</li>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-2">
		
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>
					<i class="fab fa-product-hunt ">
						
					</i> Update Order

				</h3>
			</div>

			<div class="panel-body" style="background-color:#2874; border-radius: 25px;padding:10px;">
				<form class="form-horizontal"method="post" action="" enctype="multipart/form-data">
 
					<div class="form-group">
						<label class=" control-label" >
							Update Status
						</label>
						<input type="text"name="producttitle"value="<?php echo $progress;?>"  class="form-control" >
					</div>
			
			
				
					
				
					<div class="form-group">
						<input type="submit" name="update" value="UPDATE DETAILS" class="btn  form-control">
					</div>
					</form>
				
			
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		
	</div>
</div>



 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

   
	

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['update'])) {
$producttitle=$_POST['producttitle'];


$insrt="update orders set progress='$producttitle' where id='$proid'";
$runb=mysqli_query($con,$insrt);
if($runb){
	echo "<meta http-equiv='refresh' content='0'>";
}
}


?>