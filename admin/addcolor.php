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

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

        <!-- Template Stylesheet -->
        <style>
            .panel-bodys form{
				background-color: white;
			}
			form label{
				color:white;
				font-size: 20px;
				font-weight: bolder;
				font-family: Arial, Helvetica, sans-serif;
			}
			body{
        background-color:#2874f0;}
		.panel-heading{
			color:white;
		}
		.btn{
			color:black;
			background-color: white;
			font-size: 22px;
			font-weight: bolder;
		}
		@media only screen and (max-width: 768px) {
			body{
				margin: 10px;
			}
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
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>
					<i class="fab fa-product-hunt ">
						
					</i> Insert Product

				</h3>
			</div>

			<div class="panel-body">
            <form action="" method="POST">
						<label class=" control-label" >
							No. of colors
						</label>
						<input type="text" name="colorss" id="colorvalue"  >
						
					
					</form>	
                    <button id="asdd" class="btn btn-md">Add color</button>
		
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		
	</div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>    

   $("#asdd").click(function(){
          
		 var x= document.getElementById("colorvalue").value;
     var y=<?php echo $_GET['pro_id'];?>
	 
        
	  
 
  $.ajax({
               url:'../action.php',
               method:'POST',
               
               data:{
                   getcolorvalue:1,
                   color:x,
				   proid:y

               },
               success:function(data){
				$(".colors").html(data);
				alert("inserted");
			   }
}); 

}); 
</script>



<!-- Latest compiled and minified JavaScript -->

</body>
</html>




