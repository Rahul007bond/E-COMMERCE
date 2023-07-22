<?php
 include "includes/db.php";
 require "includes/functions.php";

 session_start();
?>
     
<!doctype html>
<html>
<head> <meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        
<style>
@media only screen and (max-width: 768px) {
    .card-footer .btn{
font-size: 16px; 

}
#himg{
    display: none;
   }

}

.p2 
input[type=email] {
    width: 90%;
    padding: 12px 20px;
    border-radius: 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
  font-size: 15px;
  font-style: italic;
  font-weight: bold;
  background-color: #2874;
}

/* Set a style for all buttons */
.p2 button {
    background-color: #2874f0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    font-size: 18px;
    font-weight: bolder;
    border: none;
    cursor: pointer;
    width: 45%;
    border-radius: 30px;
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


.p2 label{
    font-size: 25px;
    font-weight: bold;
    
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
.loader-wrappers{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #2874f0;display: flex;
    justify-content: center;
    align-items: center;


}
.loaders {
display: inline-block;
width: 30px;
height: 30px;
position: relative;
border: 4px solid #Fff;

animation: loader 2s infinite ease;
}

.loader-inners {
vertical-align: top;
display: inline-block;
width: 100%;
background-color: #fff;
animation: loader-inners 2s infinite ease-in;
}

@keyframes loader {
0% {
transform: rotate(0deg);
}

25% {
transform: rotate(180deg);
}

50% {
transform: rotate(180deg);
}

75% {
transform: rotate(360deg);
}

100% {
transform: rotate(360deg);
}
}

@keyframes loader-inners {
0% {
height: 0%;
}

25% {
height: 0%;
}

50% {
height: 100%;
}

75% {
height: 100%;
}

100% {
height: 0%;
}
}




 #change{
   width: 150px;
   font-size: 15px;
   font-weight: bolder;
   border-radius: 25px;

}


#partitioned {
   
  padding-left: 15px;
  letter-spacing: 42px;
  border: 0;
  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
  background-position: bottom;
  background-size: 50px 1px;
  background-repeat: repeat-x;
  background-position-x: 35px;
  width: 200px;
}#loginstyle{width: 300px;position:relative; bottom: 0px; height: auto;}
@media only screen and (max-width: 768px) {
    #loginstyle{
       width:180px;
   }

}


</style>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #2874f0;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<div id="id02" class=" p2">


       <form class="modal-content animate" action="includes/signup.inc.php" method="post">
           <div class="row">
               <div class="container col-md-4 sideview">

                   <div class="imgcontainer">

                    
                   <img src="forgot.png" id="loginstyle">
                   </div>

               </div>
               <div class="col-md-8">


                   <div class="container" id="ggtp">
                      
<form method="post">
                       <label for="mail"><b>Email ID:</b></label><hr>
                       <input  id="mailt" type="email" placeholder="Enter Email-id" >
    
                       
                       <button type="button" name="signup-submit" id="fgotp" >Generate OTP</button>
                                      
                      
                      <a href="index.php" style="color:white;background-color: #f44336;" id="logout" class="btn btn-md " value="">Cancel</a>
        </form>
                   </div>
                   <div id="ootp">
                   <form method="post">
                   <label for="mail"><b>Email ID:</b></label><hr>
                       <input style="pointer-events: none; opacity:0.5;" type="email" value="" placeholder="Enter Email-id" name="mail" required>
                       <input  id="partitioned" type="text" maxlength="4" value="" placeholder="0000" name="otp" required>
                       
                       <button type="button" name="signup-submits" id="gotps" >Send OTP</button>
                   </form>
                   </div>
                   <div class="loader"></div>
                  <p id="errors"></p>  
               </div>

           </div>
       </form>

   </div>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/ac.js">
  </script>
 
    <script>
$("body").delegate("#gotps","click",function(event){
        var emails=$("#partitioned").val();
   
       $.ajax({
           url: "includes/send.php",
           type: "POST",
           data: {
               checkotpc: 1,
        
               otp: emails,
              
           },

           success: function(data){
        
            var data=JSON.parse(data);
              if(data.statusCode==200){
             <?php $_SESSION['changepass']="hello";?>
                    window.location.replace("http://localhost/newp/changepass.php");				
                }
               else{
                   alert(data);
               }
             
           },
           error: function ( thrownError) {
            alert("something went wrong");
          
          }
    
       });
   });
    </script>


</body>
</html>
