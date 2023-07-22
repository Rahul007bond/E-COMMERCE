<?php
include("../includes/db.php");
?>

<!doctype html>

<html>
<head>
	<title>Insert Product</title>
</head>
<meta charset="utf-8">
        
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
        <style>
            .panel-bodys form{
				background-color: white;
			}
			form label{
				color:#696969;
				font-size: 20px;
				font-weight: bolder;
				font-family: Arial, Helvetica, sans-serif;
			}
			body{
        background-color:white;}
		.panel-heading{
			color:#2874f0;
		}
		.btn{
			color:#2874f0;
			background-color: white;
			font-size: 22px;
			border-radius: 12px;
			font-weight: bolder;
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
				Dashboard / Insert Product
			</li>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div  class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>
					<i class="fab fa-product-hunt ">
						
					</i> Insert Product

				</h3>
			</div>
			<div class="panel-body"  style="background-color:#2874; border-radius: 25px;padding:10px;">
				<form class="form-horizontal"method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class=" control-label" >
							Product title
						</label>
						<input type="text"name="producttitle" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product Categories
						</label>
						<select name="product_cat" class="form-control">
							<option>Select a category</option>
							<?php
							$getproductcat="select * from pcat ";
							$run=mysqli_query($con,$getproductcat);
							while ($row=mysqli_fetch_array($run)) {
								# code...
								$id=$row['pcatid'];
								$cattitle=$row['pcattitle'];
								echo "
								<option value='$id'> $cattitle </option>
								";
							}

							?>
						</select>
					</div>
			
					<label style="color: #696969;font-style:italic; " >warning: Image height and width must be same like 300*300</label>
					<div class="form-group">
						<label class=" control-label" >
							Product Image 1
						</label>
						<input type="file"name="productimg1" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 2
						</label>
						<input type="file"name="productimg2" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 3
						</label>
						<input type="file"name="productimg3" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 4
						</label>
						<input type="file"name="productimg4" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 5
						</label>
						<input type="file"name="productimg5" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product price
						</label>
						<input type="text"name="productprice" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product MRP
						</label>
						<input type="text"name="mrp" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product Color(hex code is also allowed)
						</label>
						<input type="text"name="color" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product keyword
						</label>
						<input type="text"name="productkey" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product decription
						</label>
						<textarea id="mytextarea" name="productdesc" class="form-control" ></textarea>
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product Specification
						</label>
						<textarea id="mytextarea1"  name="specs" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input  type="submit" name="submit" value="Insert Product" class="btn  form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		
	</div>
</div>



 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

<script>
      tinymce.init({
        selector: '#mytextarea1'
      });
    </script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
$producttitle=$_POST['producttitle'];
$product_cat=$_POST['product_cat'];
$specs=$_POST['specs'];
$productprice=$_POST['productprice'];
$mrp=$_POST['mrp'];
$productdesc=$_POST['productdesc'];
$productkey=$_POST['productkey'];
$color=$_POST['color'];

$productimg1=$_FILES['productimg1']['name'];
$productimg2=$_FILES['productimg2']['name'];
$productimg3=$_FILES['productimg3']['name'];
$productimg4=$_FILES['productimg4']['name'];
$productimg5=$_FILES['productimg5']['name'];

$temp_name1=$_FILES['productimg1']['tmp_name'];
$temp_name2=$_FILES['productimg2']['tmp_name'];
$temp_name3=$_FILES['productimg3']['tmp_name'];
$temp_name4=$_FILES['productimg4']['tmp_name'];
$temp_name5=$_FILES['productimg5']['tmp_name'];
move_uploaded_file($temp_name1,"../img/$productimg1");
move_uploaded_file($temp_name2,"../img/$productimg2");
move_uploaded_file($temp_name3,"../img/$productimg3");
move_uploaded_file($temp_name4,"../img/$productimg4");
move_uploaded_file($temp_name5,"../img/$productimg5");


$insrt="insert into products(product_catid,color,specification,date,product_title,productimg1,productimg2,productimg3,productimg4,productimg5,productprice,productdesc,productkeyword,mrp) values('$product_cat','$color','$specs',NOW(),'$producttitle','$productimg1','$productimg2','$productimg3','$productimg4','$productimg5','$productprice','$productdesc','$productkey','$mrp')
";
$runb=mysqli_query($con,$insrt);
if($runb){
	echo "<meta http-equiv='refresh' content='0'>";
}
else{
	echo "<script>alert('Some products images may not insert or inputs are invalid');</script>";
}
}
?>