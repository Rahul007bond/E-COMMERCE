<?php
include "includes/db.php";
session_start();

if(isset($_POST['getdata'])&&isset($_SESSION['username'])){
    $user=$_SESSION['username'];
    $sql="select * from customersinfo where username='$user'";
    $run=mysqli_query($con,$sql);
   
  



if(mysqli_fetch_row($run)<1){?>
 
                        <form action="#" method="POST" class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row ">
<div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" name="fn" type="text" placeholder="First Name" required="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control"  name="ln"type="text" placeholder="Last Name"required="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="eml" type="text"required=""  placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" name="mbl" type="text"required=""  placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" name="add" type="text" required="" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select required="" name="ctry"  class="custom-select">
                                            <option selected>India</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" name="city" type="text"required=""  placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control"  name="state"type="text"required=""  placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control"  name="zip"type="text"required=""  placeholder="ZIP Code">
                                    </div>       
                                </div>
                            </div>

                        </form>
                        <button name="info"  class="btn btn-lg infos">Submit</button>
                    
                                    <?php }
                                    else{ 
                                        $sqls="select * from customersinfo where username='$user'";
                                        $runs=mysqli_query($con,$sqls);
                                        
                                       $row=mysqli_fetch_assoc($runs);
                                            
                                                                                $first=$row['firstname'];
                                                                                $last=$row['lastname'];
                                                                                $email=$row['email'];
                                                                                $mobilno=$row['mobileno'];
                                                                                $address=$row['address'];
                                                                                $city=$row['city'];
                                                                                $countru=$row['country'];
                                                                                $state=$row['state'];
                                                                                $zip=$row['zipcode']; 
                                 
                                     
    ?>



                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" value="<?php echo $first;?>" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" type="text"value="<?php echo $last;?>" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text"value="<?php echo $email;?>" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text"value="<?php echo $mobilno;?>" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" value="<?php echo $address;?>" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option value="<?php echo $countru;?>" selected>India</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" value="<?php echo $city;?>"placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" type="text"value="<?php echo $state;?>" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" value="<?php echo $zip;?>" placeholder="ZIP Code">
                                    </div>

                    <?php } }?>
                    <?php
                    if(isset($_POST['getinfo'])){
                        $inser="insert into customersinfo (username,firstname,lastname,email,mobileno,address,country,city,state,zipcode)
                        values('user','fn','ln','eml',1,'add','ctry','city','state',1)";
                        $ru=mysqli_query($con,$inser);
                        $fn=$_POST['fn'];
                        $ln=$_POST['ln'];
                        $eml=$_POST['eml'];
                        $mbl=$_POST['mbl'];
                        $add=$_POST['add'];
                        $state=$_POST['state'];
                        $city=$_POST['city'];
                        $zip=$_POST['zip'];
                        $ctry="c";
                        $user="v";
                        $insert="insert into customersinfo (username,firstname,lastname,email,mobileno,address,country,city,state,zipcode)
                        values('$user','$fn','$ln','$eml','$mbl','$add','$ctry','$city','$state','$zip')";
                        $run=mysqli_query($con,$insert);
                        
                    }?>