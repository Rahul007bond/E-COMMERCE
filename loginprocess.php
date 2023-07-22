<?php
include 'includes/db.php';
include 'includes/functions.php';
if(isset($_POST['loginp'])){

echo'
<form class="modal-content animate" action="" method="post">
            <div class="row">
                <div class="container col-md-4 sideview">

                    <div class="imgcontainer">

                        
                        <img src="nlogin.png" id="loginstyle">
                    </div>

                </div>
                <div class="col-md-8">


                    <div class="container">
                
                        <label for="uname"><b>Username/Mobile. NO.</b></label>
                        <input id="uname" type="text" placeholder="Enter Username/Mobile. No" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input id="psw"  type="password" placeholder="Enter Password" name="psw" required>';?>
<?php

$time=time()-300;
$ip=getIpAddr();
$query=mysqli_query($con,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip'");
$check_login_row=mysqli_fetch_assoc($query);
$total_count=$check_login_row['total_count'];
if($total_count>=1){
echo "<p style='color:red; margin-left:5%;font-weight:bolder;font-family:arial ' >Sorry you can't login for 5 minutes</p>";

}

else
     {echo " <button type='button' id='loginin' name='login-submit'>Login</button>";}?>
                     <?php  echo '
                    </div>
                    <div class="container">
                    <p style="color:#2874f0" id="error"></p>
                    <a href="#" data-dismiss="modal"
                            style="background-color: #f44336;color: #fefefe; width: fit-content;"
                            class="nav-item nav-link" style="display: block; width:auto;">Cancel</a>
</div>
                    <div class="container" style="background-color:#f1f1f1">
                        <span class="psw">Forgot <a href="forgot.php">password?</a></span>
                        <a href="#" data-dismiss="modal" data-target="#id02" data-toggle="modal"
                            style="display: block; width:auto;"><span style="color: black;">New?</span> Create an
                            Account</a>

                    </div>
                </div>

            </div>
        </form> ';}?>