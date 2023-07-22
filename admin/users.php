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
        <style>#livesearch{
    position: absolute;

  z-index: 1;
  background-color: white;
  border: 4px solid #2874f0;
  border-radius: 10px;
  padding: 7px;
}

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
        #t01{
            font-size: 20px;

        }
        #t01 th{
            padding: 7px;
        }
        #t01 tr:nth-child(even) {
  background-color: #eee;


}


#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
#t01 td{
  padding: 10px;
}
		@media only screen and (max-width: 768px) {
			body{
				margin: 10px;
			}
		}
		.breadcrumb{
			color: white;
			background-color: black;
		} .search {
      margin: 20px;
    width: 100%;
}

 .search input[type=text] {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    color: #666666;
    border: 1px solid #2874f0;
    border-radius: 4px;
}

 .search button {
   margin-top: 20px;
   margin-left: 20px;
    position: absolute;
    width: 40px;
    height: 38px;
    top: 1px;
    right: 10px;
    padding: 0 15px;
    border: none;
    background: none;
    color: #2874f0;
    border-radius: 0 2px 2px 0;
}
 .search button:hover {
    background: #2874f0;
    color: #ffffff;
}#viewall{
  margin: 12px;
}
        </style>
<body>

<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i>
				Dashboard / All Users
			</li>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-6">
                    <div class="search">
                    <form action="product-list.php" method="get">
                        <input name="search" type="text" onkeyup="showResult(this.value)" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                        <div id="livesearch"></div>
                        </form>
                    </div>
                </div>
                <div>
                <button id="viewall" type="button" class="btn btn-md">View All products</button></div>
    <div class="col-lg-12">
<table style=" margin: 16px;" class="editdata" id="t01">


</table>
<button style="margin-left:42%;" type="button" class="btn btn-lg" id="asd">Load more</button>
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
    </script> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
   var start=0;
       var limit=6;
       var reached=false; 
      
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
               url:'userprocess.php',
               method:'POST',
               
               data:{
                   getdata:1,
                   start:start,
                   limit:limit,
                   
               },
               success:function(data){
                   if(data==("reached")){
                       reached=true;
                   }
                   else{
                       
                       limit+=limit;
                      
                       $(".editdata").html(data);
                   }
                   
               }

           });
       }
       $("#viewall").click(function(){
          
          getdatas();
      
  }); function getdatas(){
        
           
           $.ajax({
               url:'userprocess.php',
               method:'POST',
               
               data:{
                   getdatas:1,
                   
                   
               },
               success:function(data){
                  
                      
                       $(".editdata").html(data);
                   
                   
               }

           });
       }
       
       </script>    <script>
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
    xmlhttp.open("GET","../livesearch.php?q="+str,true);
    xmlhttp.send();
  }
    </script>
</body>
</html>
