<?php
include_once "config/db_connection.php";
session_start();
$username = $_SESSION['username'];
if(isset($_SESSION['key_log'])){
	if(@$_GET['y'] == 'Num_participants' && $_SESSION['key_log'] == '$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2.'){
		$uni_name = $_POST['university_name'];
		$uni_name = mysqli_real_escape_string($con,$uni_name);
		$Gender  = $_POST['gender'];
		$people = $_POST['Num_participant'];
		$people = mysqli_real_escape_string($con,$people);
		$id      = uniqid();

		$qu = mysqli_query($con,"SELECT Uni_name FROM Universities WHERE Uni_name = '$uni_name' ");
		if (mysqli_num_rows($qu)>=12)
		{
			header("location:dashboard.php?y=2&uploaded=AlreadyTaken");
		}
		else{
			$query=mysqli_query($con,"INSERT INTO Universities VALUES(NULL,'$id','$uni_name','$people','$Gender',NULL)") or die("Insertion not possible");
			header("location:dashboard.php?y=2&Step=2&name=$uni_name&count=$people&gender=$Gender");
		}
		
	}
	if(@$_GET['y'] == 'add_participants' && $_SESSION['key_log'] == '$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2.'){
		$count = @$_GET['count'];
		$Uni_name = @$_GET['name'];
		$Gender = @$_GET['gender'];
		for($i=1; $i<=(@$_GET['count']); $i++){
			$name=$_POST['1'.$i];
			$name=mysqli_real_escape_string($con,$name);
			
			// $tag = $_POST['2'.$i];
			$qu = mysqli_query($on,"SELECT Tag FROM Paticipants");
			if(mysqli_num_rows($qu)>=1){
				$tag = mt_rand(10000,99999);
				$tag = $_POST['$tag'];
				$tag = mysqli_real_escape_string($con,$tag);		
			}
			else{
				$tag = $_POST['2'.$i];
			}
			$age = $_POST['3'.$i];
			$age = mysqli_real_escape_string($con,$age);
			$DOB = $_POST['4'.$i];
			$DOB = mysqli_real_escape_string($con,$DOB);
			$uni = $Uni_name;
			$uni = mysqli_real_escape_string($con,$uni);
			$gender = $Gender;
			$gender = mysqli_real_escape_string($con,$gender);
			$Asana_1 = $_POST['5'.$i];
			$Asana_1 = mysqli_real_escape_string($con,$Asana_1);
			$Asana_2 = $_POST['6'.$i];
			$Asana_2 = mysqli_real_escape_string($con,$Asana_2);
			$Asana_3 = $_POST['7'.$i];
			$Asana_3 = mysqli_real_escape_string($con,$Asana_3);
			$Uploader = $username;

			$query = mysqli_query($con,"INSERT INTO Participants VALUES(NULL,'$name','$tag','$age','$DOB','$uni','$gender','$Asana_1','$Asana_2','$Asana_3','$Uploader',NULL)") or die("Insertion is Not Possible".mysqli_error($con));

			
			for($j=0;$j<5;$j++)
			{
				$query_1 = mysqli_query($con,"INSERT INTO Primary_Score VALUES(NULL,'$name','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','$uni','$gender','Judge$j','0',NULL)") or die("Error:1210".mysqli_error($con));
			}
			

			$query_Final_1 = mysqli_query($con,"INSERT INTO Final_Score VALUES(NULL,'0','$name','0','0','0','0','0','0','0','0','0','0','0','0','0','$uni','$gender',NULL)") or die("Error:In Final::".mysqli_error($con));
			
		}
		header("location:dashboard.php?y=2&uploaded=True");
	}
	if(@$_GET['y'] == 'Updation_dob' && $_SESSION['key_log'] == '$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2.'){
		$uni_name = $_POST['university_name'];
		$uni_name = mysqli_real_escape_string($con,$uni_name);
		$Gender  = $_POST['gender'];
		$Query = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name = '$uni_name' AND Gender = '$Gender' ");
		$people = mysqli_num_rows($Query);

		header("location:dashboard.php?y=4&Step=4&name=$uni_name&count=$people&gender=$Gender");
	}
	if(@$_GET['y'] == 'add_dob' && $_SESSION['key_log'] == '$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2.'){
		$count = @$_GET['count'];
		$Uni_name = @$_GET['name'];
		$Gender = @$_GET['gender'];
		for($i=1; $i<=(@$_GET['count']); $i++){
			$qu = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name = '$Uni_name' AND Gender = '$Gender'");
			while ($row = mysqli_fetch_array($qu)){
				$Name = $row['Name'];
				$age = $_POST['3'.$i];
				$age = mysqli_real_escape_string($con,$age);
				$DOB = $_POST['4'.$i];
				$DOB = mysqli_real_escape_string($con,$DOB);
				$Query = mysqli_query($con,"UPDATE Participants SET Age='$age',DOB='$DOB'  WHERE University_Name = '$Uni_name' AND Gender = '$Gender' AND Name = '$Name'");
			}
		}
		header("location:dashboard.php?y=4");
	}
}
else
	header("location:index.php");
?>