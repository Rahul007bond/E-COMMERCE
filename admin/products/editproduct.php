<?php
include("../../includes/db.php");
$proid=$_GET['pro_id'];
$sql="select * from uproducts where id='$proid'";
$run=mysqli_query($con,$sql);
$row=mysqli_fetch_array($run);
$catid=$row['product_catid'];
$ptitle=$row['product_title'];
$pimg1=$row['productimg1'];
$pimg2=$row['productimg2'];

$pimg3=$row['productimg3'];

$pprice=$row['productprice'];

$pmrp=$row['mrp'];

$pdesc=$row['productdesc'];

$pspecs=$row['specification'];

$pkeyw=$row['productkeyword'];





?>

<!doctype html>

<html>
<head>
	<title>Edit Used Product</title>
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
				Dashboard / Edit Product
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
						
					</i> Edit Product

				</h3>
			</div>

			<div class="panel-body" style="background-color:#2874; border-radius: 25px;padding:10px;">
				<form class="form-horizontal"method="post" action="" enctype="multipart/form-data">
 
					<div class="form-group">
						<label class=" control-label" >
							Product title
						</label>
						<input type="text"name="producttitle"value="<?php echo $ptitle ?>"  class="form-control" >
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
			
				
					<div class="form-group">
						<label class=" control-label" >
							Product price
						</label>
						<input type="text"name="productprice"value="<?php echo $pprice ?>"  class="form-control" >
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product MRP
						</label>
						<input type="text"name="mrp"value="<?php echo $pmrp ?>"  class="form-control" >
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product keyword
						</label>
						<input type="text"name="productkey"value="<?php echo $pkeyw ?>"  class="form-control">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product decription
						</label>
						<textarea id="mytextarea" name="productdesc"  class="form-control"    ><?php echo $pdesc; ?></textarea>
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product Specification
						</label>
						<textarea id="mytextarea1" name="specs" class="form-control"   ><?php echo $pspecs; ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="update" value="UPDATE DETAILS" class="btn  form-control">
					</div>
					</form>
					<hr>
				<form class="form-horizontal"method="post" action="" enctype="multipart/form-data">
				
				
					<label style="color:#696969; font-style:italic;" >warning: Image height and width must be same like 300*300</label>
					<div class="form-group">
						<label class=" control-label" >
							Product Image 1
						</label>
						<input type="file"name="productimg1"  class="form-control"style="margin-bottom: 12px;" required="">
                        <img src="../img/<?php echo $pimg1; ?>"class="img-responsive" height="100" width="100" >
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 2
						</label>
						<input type="file"name="productimg2" class="form-control"style="margin-bottom: 12px;" required="">
                        <img src="../img/<?php echo $pimg2; ?>"class="img-responsive" height="100" width="100" >
                    </div>
					<div class="form-group">
						<label class=" control-label" >
							Product image 3
						</label>
						<input type="file"name="productimg3"  class="form-control" required="" style="margin-bottom: 12px;">
                        <img src="../img/<?php echo $pimg3; ?>"class="img-responsive" height="100" width="100" >
                    </div>
					<div class="form-group">
						<input type="submit" name="update_images" value="UPDATE IMAGES" class="btn  form-control">
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
  selector: '#mytextarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  mobile: { 
    theme: 'mobile' 
  },
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',

});
    </script>
	 <script>
      tinymce.init({
  selector: '#mytextarea1',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  mobile: { 
    theme: 'mobile' 
  },
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  
});
    </script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['update'])) {
$producttitle=$_POST['producttitle'];
$product_cat=$_POST['product_cat'];
$specs=$_POST['specs'];
$productprice=$_POST['productprice'];
$mrp=$_POST['mrp'];
$productdesc=$_POST['productdesc'];
$productkey=$_POST['productkey'];

$insrt="update products set product_catid='$product_cat',specification='$specs',date=NOW(),product_title='$producttitle',productprice='$productprice',productdesc='$productdesc',productkeyword='$productkey',mrp='$mrp' where id='$proid'";

$runb=mysqli_query($con,$insrt);
if($runb){
	echo "<meta http-equiv='refresh' content='0'>";
}
}
if(isset($_POST['update_images'])){
	
$productimg1=$_FILES['productimg1']['name'];
$productimg2=$_FILES['productimg2']['name'];
$productimg3=$_FILES['productimg3']['name'];

$temp_name1=$_FILES['productimg1']['tmp_name'];
$temp_name2=$_FILES['productimg2']['tmp_name'];
$temp_name3=$_FILES['productimg3']['tmp_name'];
move_uploaded_file($temp_name1,"product_images/$productimg1");
move_uploaded_file($temp_name2,"product_images/$productimg2");
move_uploaded_file($temp_name3,"product_images/$productimg3");
$insrt="update products set productimg1='$productimg1',productimg2='$productimg2',productimg3='$productimg3' where id='$proid'";
$runb=mysqli_query($con,$insrt);
if($runb){
	echo "<meta http-equiv='refresh' content='0'>";
}}

?>