<?php
include 'includes/db.php';
if(isset($_POST['token'])){
    $token=trim($_POST['tokenid']);
$selectok="select * from repair where tokenid='$token'";
$run=mysqli_query($con,$selectok);
$rows=mysqli_num_rows($run);
$row=mysqli_fetch_assoc($run);
if($rows>0){
$pname=$row['productname'];
$status=$row['status'];
$gdate=$row['gdate'];
$ldate=$row['ldate'];
$exdate=$row['exdate'];
$issues=$row['issues'];
}
 ?>

<?php
if($row>0){
echo '
<div id="viewrec">
<div class="card">
<div class="title">Repair Reciept</div>
<div class="info">
<div class="row">
<div class="col-7"> <span id="heading">Date</span><br> <span id="details">';echo $gdate; echo '</span> </div>
<div class="col-5 pull-right"> <span id="heading">Token No.</span><br> <span id="details">'; echo $token; echo'</span> </div>
</div>
</div>
<div class="pricing">
<div class="row">
<div class="col-12"> <span id="name">'; echo $pname; echo '</span> </div>

</div>
<hr>
<div class="row">
<div class="col-6"> <span id="name">Status: </span> </div>
<div class="col-6"> <span Style="font-weight:bolder;">'; echo $status; echo '</span> </div>
<div class="col-12"> <span Style="font-weight:bolder;">Last Updated: '; echo $ldate; echo '</span> </div>
<div class="col-12"> <span Style="font-weight:bolder;">Expected Date: '; echo $exdate; echo '</span> </div>
</div>
</div>

<div class="tracking">
<div class="title">Issue:</div>
<div class="col-12"> <span id="price">';echo $issues; echo '</span> </div>
</div>

<div class="footer">
<div class="row">
<div class="col-2"><img class="img-fluid" src="n.png"></div>
<div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
</div>
</div>
</div>

</div>
';}
else{
	echo "<p style='color:red' >Token ID not found! please contact owner</p>";
}
}?>