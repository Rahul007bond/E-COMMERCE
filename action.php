<?php
 include "includes/db.php";
 include "includes/functions.php";
 session_start();
 $ip_add=getIpAddr();

if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["username"])){

		$user_id = $_SESSION["username"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			 echo json_encode(array("statusCode"=>209));
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo json_encode(array("statusCode"=>205));
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo json_encode(array("statusCode"=>209));
					exit();
			}
			$sql = "INSERT INTO cart			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo json_encode(array("statusCode"=>205));
				exit();
			}
			
		}


		
		
		
		
	}
	if(isset($_POST["adc"])){
		

		$p_id = $_POST["proId"];
		$y=$_POST["y"];

		if(isset($_SESSION["username"])){

		$user_id = $_SESSION["username"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			 echo json_encode(array("statusCode"=>209));
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','$y')";
			if(mysqli_query($con,$sql)){
				echo json_encode(array("statusCode"=>205));
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo json_encode(array("statusCode"=>209));
					exit();
			}
			$sql = "INSERT INTO cart			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','$y')";
			if (mysqli_query($con,$sql)) {
				echo json_encode(array("statusCode"=>205));
				exit();
			}
			
		}


		
		
		
		
	}

	if(isset($_POST["getreview"])){
		$start=$_POST["start"];
		$limit=$_POST["limit"];
		$id=$_POST["id"];
		$sqlr="select * from review where proid='$id' limit $start,$limit ";
	
		$runr=mysqli_query($con,$sqlr);
		if(mysqli_num_rows($runr)>0){
 
			while($row=mysqli_fetch_assoc($runr)){
				$usernamer=$row['username'];
				$rating=$row['rating'];
				$dates=$row['date'];
				$textr=$row['review'];
				echo "<div class='reviewer'>$usernamer - <span>$dates</span></div>
				<div class='ratting'>";
				while($rating>0){
				echo"	<i class='fa fa-star'></i>"; $rating-=1;}
					echo"
				</div>
				<p>
					$textr
				</p>
			
				";
				
			}
			
	}
	else{
		exit('No Review');
	}
}
	
if(isset($_POST["getcolorvalue"])){
	$nocolor=$_POST["color"];
	 $proid=$_POST["proid"];
	$insert ="insert into productcolor(proid,color) values('$proid','$nocolor')";
$runc=mysqli_query($con,$insert);
exit();}


    ?>
	