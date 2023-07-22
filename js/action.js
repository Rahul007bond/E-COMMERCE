// $(document).ready(function(){
//     getcart();
// });

// function getcart(){
   
    
//     $.ajax({
//         url:'action.php',
//         method:'POST',
        
//         data:{
//             getcart:1
            
//         },
//         success:function(data){
           
               
//                 $(".cart").html(data);
//             }
            
        

//     });
// }

$("body").delegate(".category","click",function(event){
    $(".resultss").html("<h3>Loading...</h3>");
    event.preventDefault();
    var cid = $(this).attr('cid');
    var search="<?php echo $search;?>";
    
    
        $.ajax({
        url		:	"news.php",
        method	:	"POST",
        data	:	{get_seleted_Category:1,cat_id:cid,search:search
          },
        success	:	function(data){
            $(".resultss").html(data);
            
        }
    })

});




$(document).ready(function() {

    $("body").delegate("#sgin","click",function(event){
   
        event.preventDefault();
    
        
        var name = $('#username').val();
        var email = $('#mail').val();
        var phone = $('#phone').val();
        var pass = $('#pass').val();
        var password = $('#pass2').val();
        var checkBox = document.getElementById("tmc");
        var re = /[a-z0-9._%+-]+@([gmail|GMAIL])+\.(com)$|[a-z0-9._%+-]+@([yahoo])+\.(com)$|[a-z0-9._%+-]+@([outlook])+\.(com)$/;

   var aka= re.test(email.value);
if(aka==false){
    $("#error").show();
    $('#error').html('Not valid email !');

}
         if (name != "" && email != "" && phone != "" && password != ""&&checkBox.checked == true) {
            $.ajax({
                url: "includes/login.php",
                async:false,
                type: "POST",
                data: {
                    type: 1,
                    name: name,
                    mail: email,
                    phone: phone,
                    pass: pass,
                    password: password
                },

                success: function(data) {
                    var data = JSON.parse(data);
					if(data.statusCode==205){
					location.reload();						
					}
					else if(data.statusCode==201){
						$("#errors").show();
						$('#errors').html('Mobile No already exists !');
					}
                    else if(data.statusCode==208){
						$("#errors").show();
						$('#errors').html('Email ID already exists !');
					}
                    else if(data.statusCode==203){
						$("#errors").show();
						$('#errors').html('Username already exists !');
					}
                    else if(data.statusCode==204){
						$("#errors").show();
						$('#errors').html('Wrong password !');
					}
                    else if(data.statusCode==207){
						$("#errors").show();
						$('#errors').html('Password length must be greater than 8 characters !');
					}
                    else if(data.statusCode==209){
						$("#errors").show();
						$('#errors').html('Email ID is not valid !');
					}else{
                        $("#errors").show();
						$('#errors').html('Something went wrong !');
					   
                    }
                  
                }
            });
        } else {
            $("#errors").show();
            $('#errors').html(' Please! fill all the fields');  
        }
    });


   
});

   

$(document).ready(function() {
    var otp=$('#otp').val();
    var mailme=$('#mailme').val();

    $('#otpsend').on('click', function() {
      
        $.ajax({
            url: "includes/email.php",
            type: "POST",
            data: {
                otp: 1,
               
               mail:mailme,
                otps:otps
               
            },

            success: function(data) {
               windows.location("index.php");
              
            }
        });
    });
});
    $(document).ready(function() {
       
         $('#change').on('click', function() {
              var email=$("#mails").val();
        
             $.ajax({
                 url: "includes/email.php",
                 type: "POST",
                 data: {
                     changemail: 1,
                    
                    
                     eml: email
                    
                 },
     
                 success: function(data) {
                    location.reload();
                   
                 }
             });
         });
 
     });

     $(document).ready(function() {
         $("#ootp").hide();
         var email=$("#mailto").val();
         $('.loader').hide();
         $('#gotp').on('click', function() {
            $('.loader').show();
          $('#errors').html('Please wait while sending e-mail!');
            $.ajax({
                url: "includes/email.php",
                type: "POST",
                data: {
                   gotp: 1,
                   
                   
                    eml: email
                   
                },
    
                success: function(data) {
                    $('.loader').hide();
                    $("#ootp").show();
                    $("#ggtp").hide();
                    $('#errors').html('<p style ="color:green" >OTP send</p>');
                    
                  
                }
            });

         });

         
     

     });
     
    
//      $('#gotps').on('click', function() {
//         var emails=$("#partitioned").val();
//   alert("hello");
//        $.ajax({
//            url: "includes/send.php",
//            type: "POST",
//            data: {
//                checkotp: 1,
              
              
//                otp: emails
              
//            },

//            success: function(data) {
              
//               if(data.statusCode==200){
//                     windows.location("ca.php");				
//                 }
//                 else{
//               alert("wrong");
                
//                 }
             
//            },
//            error: function ( thrownError) {
//             alert("wronf");
          
//           }
    
//        });
//    });
