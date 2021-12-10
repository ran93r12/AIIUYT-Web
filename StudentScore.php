<?php
include_once "config/db_connection.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if(isset($_SESSION['keys_log']) && isset($_SESSION['role'])){
	if(@$_GET['y'] == 'DelAccount' && $_SESSION['keys_log'] == '$2y$10$Jie9cW1tl1vKaUcXQ1A3Zuxs653F1Y/A8ceElgEQ8SgZ9HNCWc5N.' && $_SESSION['role'] == 'StudentAdmin'){
		$university = $_POST['university_name'];
		$Gender = $_POST['gender'];
		$Query=mysqli_query($con,"DELETE FROM Final_Score WHERE University = '".$university."' AND Gender = '".$Gender."'") or die("Error in Final_Score".mysqli_error($con));
		$Query1=mysqli_query($con,"DELETE FROM Primary_Score WHERE University = '".$university."' AND Gender = '".$Gender."'") or die("Error in Primary_Score");
		$Query2=mysqli_query($con,"DELETE FROM Participants WHERE University_Name = '".$university."' AND Gender = '".$Gender."'") or die("Error in Participants");

		header("location:Student.php?y=5");

	}
}