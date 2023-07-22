$(document).ready(function() {
    $("#ootp").hide();

    $('.loader').hide();
    $("body").delegate("#fgotp","click",function(event){
        var emails=$("#mailt").val();
       $('.loader').show();
     $('#errors').html('Please wait while sending e-mail!');
       $.ajax({
           url: "includes/forgot.php",
           type: "POST",
           data: {
              fgotp: 1,
              
              
               eml: emails
              
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

