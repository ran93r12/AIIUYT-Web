<?php
include_once "config/db_connection.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if(isset($_SESSION['keys_log']) && isset($_SESSION['role'])){
	if(@$_GET['y'] == 'PanelSelect' && $_SESSION['keys_log'] == '$2y$10$vCygzhFUFu.jtM5FC7qDT.ib.4KSMurmMfCk.vORtVliM5ODTE2Rm' && $_SESSION['role'] == 'Chief_Judge_Admin'){
		$University = $_POST['university_name'];
		$Gender = $_POST['gender'];
		$Panel = $_POST['Panel'];
		$Judge1 = $_POST['Judge_1'];
		$Judge2 = $_POST['Judge_2'];
		$Judge3 = $_POST['Judge_3'];
		$Judge4 = $_POST['Judge_4'];
		$Judge5 = $_POST['Judge_5'];
		$query = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name='$University' AND Gender='$Gender'") or die("Error in Details :: Missing Records.");
		while($row = mysqli_fetch_array($query)){
			$Name = $row['Name'];
			$J = array($Judge1,$Judge2,$Judge3,$Judge4,$Judge5);
			for ($i=0;$i<=4;$i++){
				$Query = mysqli_query($con,"UPDATE Primary_Score SET Judge_Name = '$J[$i]',Panel_Num = '$Panel' WHERE University = '$University' AND Gender = '$Gender' AND Name = '$Name' AND Judge_Name = 'Judge$i'");
			}
		}
		

		header("location:ChiefReferee.php?y=2");

	}
	

}