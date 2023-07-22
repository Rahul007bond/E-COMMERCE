<?php
include("../includes/db.php");
?>

<!doctype html>

<html>
<head>
	<title>Repair status of Product</title>
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
		input{
			border-radius: 10px;
		}
        </style>
<body>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i>
				Dashboard / Repair status of Product
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
						
					</i>Repair status of Product

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
							Status
						</label>
						<input type="text"name="status" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Expected date
						</label>
						<input type="date"name="exdate" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Last updated
						</label>
						<input type="date"name="ldate" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Given Date
						</label>
						<input type="date" name="gdate" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class=" control-label" >
							Issues
						</label>
						<textarea id="mytextarea1"  name="issues" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input  type="submit" name="submit" value="Repair status" class="btn  form-control">
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
$status=$_POST['status'];
$gdate=$_POST['gdate'];
$ldate=$_POST['ldate'];
$exdate=$_POST['exdate'];
$issue=$_POST['issues'];
function order(){
    global $rand;
    $rand ="e".rand(1000000000,999999999999);}
   order(); 
  
    $ransql="select tokenid from repair where tokenid='$rand'";
    $run=mysqli_query($con,$ransql);
  
    if($runs=mysqli_fetch_row($run)>0){
        order();
    }


$insrt="insert into repair(productname,status,gdate,ldate,exdate,issues,tokenid) values('$producttitle','$status','$gdate','$ldate','$exdate','$issue','$rand')
";
$runb=mysqli_query($con,$insrt);
if($runb){
	echo "<meta http-equiv='refresh' content='0'>";
}
}
?>