<?php
include_once "config/db_connection.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if(isset($_SESSION['keys_log'])){
	if(@$_GET['y'] == 'Score_Participants' && $_SESSION['keys_log']  == '$2y$10$Reg6.CaUJVu0pmahdlyY3uqX01XeSLQCwvOP32IEC/nvR2L/MHmL.'){
		$uni_name = $_POST['university_name'];
		$uni_name = mysqli_real_escape_string($con,$uni_name);
		$Gender  = $_POST['gender'];

		$query = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name='$uni_name' AND Gender='$Gender'") or die("Error in Details :: Missing Records.");
		$count = mysqli_num_rows($query);

		header("location:Judge.php?y=2&Step=2&count=$count&uni_name=$uni_name&Gender=$Gender");

	}
	if(@$_GET['y'] == 'Score_Sheet' && $_SESSION['keys_log']  == '$2y$10$Reg6.CaUJVu0pmahdlyY3uqX01XeSLQCwvOP32IEC/nvR2L/MHmL.'){
		if(isset($_POST['result-submit'])){
			$uni_name = @$_GET['uni_name'];
			$count = @$_GET['count'];
			$Gender = @$_GET['Gender'];

			for ($i=1;$i<=$count; $i++){
				$Name = $_POST['Name'.$i];
				$Query = mysqli_query($con,"SELECT * FROM Primary_Score WHERE University = '$uni_name' AND Gender = '$Gender' AND Judge_Name = '$username'") or die("Can't Fetch Details");
				$university_name = $uni_name;
				while($res = mysqli_fetch_array($Query)){
					$panel = $res['Panel_Num'];
					if ($res['CP_AS1'] == -1) {
						$CP_AS1 = $_POST['CPA1'.$i];
						$query_1 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS1='$CP_AS1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'") or die("Can't Fetch Details");
					}
					if ($res['CP_AS2'] == -1) {
						$CP_AS2 = $_POST['CPA2'.$i];
						$query_2 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS2='$CP_AS2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'") or die("Can't Fetch Details");
					}
					if ($res['CP_AS3'] == -1) {
						$CP_AS3 = $_POST['CPA3'.$i];
						$query_3 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS3='$CP_AS3' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['CP_AS4'] == -1) {
						$CP_AS4 = $_POST['CPA4'.$i];
						$query_4 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS4='$CP_AS4' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['OP_AS1'] == -1) {
						$OP_AS1 = $_POST['OPA1'.$i];
						$query_5 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS1='$OP_AS1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");

					}
					if ($res['OP_AS2'] == -1) {
						$OP_AS2 = $_POST['OPA2'.$i];
						$query_6 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS2='$OP_AS2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['OP_AS3'] == -1) {
						$OP_AS3 = $_POST['OPA3'.$i];
						$query_7 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS3='$OP_AS3' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['SN'] == -1) {
						$SN = $_POST['SN'.$i];
						$query_8 = mysqli_query($con,"UPDATE Primary_Score SET SN='$SN' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['SK_1'] == -1) {
						$SK_1 = $_POST['SK1'.$i];
						$query_9 = mysqli_query($con,"UPDATE Primary_Score SET SK_1='$SK_1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
					if ($res['SK_2'] == -1) {
						$SK_2 = $_POST['SK2'.$i];
						$query_10 = mysqli_query($con,"UPDATE Primary_Score SET SK_2='$SK_2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
					}
				}
				header("location:Judge.php?y=2&uploaded=True"); 

			}


		}
		else if(isset($_POST['result-update'])){
			$uni_name = @$_GET['uni_name'];
			$count = @$_GET['count'];
			$Gender = @$_GET['Gender'];

			for ($i=1;$i<=$count; $i++){
				$Name = $_POST['Name'.$i];
				$Query = mysqli_query($con,"SELECT * FROM Primary_Score WHERE University = '$uni_name' AND Gender = '$Gender' AND Judge_Name = '$username'") or die("Can't Fetch Details");
				$university_name = $uni_name;
				while($res = mysqli_fetch_array($Query)){
					$panel = $res['Panel_Num'];
					if ($res['CP_AS1'] == -1) {
						$CP_AS1 = $_POST['CPA1'.$i];
						$query_1 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS1='$CP_AS1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'") or die("Can't Fetch Details".mysqli_error($con));
						if ($CP_AS1 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','CP_AS1','$CP_AS1','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['CP_AS2'] == -1) {
						$CP_AS2 = $_POST['CPA2'.$i];
						$query_2 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS2='$CP_AS2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'") or die("Can't Fetch Details");
						if ($CP_AS2 != -1){
							$q3 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','CP_AS2','$CP_AS2','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}	
					if ($res['CP_AS3'] == -1) {
						$CP_AS3 = $_POST['CPA3'.$i];
						$query_3 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS3='$CP_AS3' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($CP_AS3 !=-1){
							$q4 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','CP_AS3','$CP_AS3','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['CP_AS4'] == -1) {
						$CP_AS4 = $_POST['CPA4'.$i];
						$query_4 = mysqli_query($con,"UPDATE Primary_Score SET CP_AS4='$CP_AS4' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($CP_AS4 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','CP_AS4','$CP_AS4','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['OP_AS1'] == -1) {
						$OP_AS1 = $_POST['OPA1'.$i];
						$query_5 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS1='$OP_AS1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($OP_A1 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','OP_AS1','$OP_AS1','$username','$uni_name','$Gender','$panel',NULL)");
						}
						
					}
					if ($res['OP_AS2'] == -1) {
						$OP_AS2 = $_POST['OPA2'.$i];
						$query_6 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS2='$OP_AS2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($OP_AS2 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','OP_AS2','$OP_AS2','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['OP_AS3'] == -1) {
						$OP_AS3 = $_POST['OPA3'.$i];
						$query_7 = mysqli_query($con,"UPDATE Primary_Score SET OP_AS3='$OP_AS3' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($OP_AS3 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','OP_AS3','$OP_AS3','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['SN'] == -1) {
						$SN = $_POST['SN'.$i];
						$query_8 = mysqli_query($con,"UPDATE Primary_Score SET SN='$SN' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($SN != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','SN','$SN','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['SK_1'] == -1) {
						$SK_1 = $_POST['SK1'.$i];
						$query_9 = mysqli_query($con,"UPDATE Primary_Score SET SK_1='$SK_1' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($SK_1 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','SK_1','$SK_1','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
					if ($res['SK_2'] == -1) {
						$SK_2 = $_POST['SK2'.$i];
						$query_10 = mysqli_query($con,"UPDATE Primary_Score SET SK_2='$SK_2' WHERE Name='$Name' AND University='$uni_name' AND Judge_Name = '$username'");
						if ($SK_2 != -1){
							$q2 = mysqli_query($con,"INSERT INTO Display VALUES(NULL,'$Name','SK_2','$SK_2','$username','$uni_name','$Gender','$panel',NULL)");
						}
					}
				}
				header("location:Judge.php?y=2&Step=2&count=$count&uni_name=$uni_name&Gender=$Gender&uploaded=Done"); 
			}

		}
		
	}
}
?>