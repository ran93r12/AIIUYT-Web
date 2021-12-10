<?php
include_once "config/db_connection.php";


function Score_Aggregrate($con,$Asana)
{
	$query_11 = mysqli_query($con,"SELECT Name,University_Name FROM Participants");

	while($row = mysqli_fetch_array($query_11)){
		$Name = $row['Name'];
		$University_Name = $row['University_Name'];
		$query_12 = mysqli_query($con,"SELECT ".$Asana." FROM Primary_Score WHERE Name = '$Name' AND University ='$University_Name'");
		$mark = array();
		while($res = mysqli_fetch_array($query_12)){
			$a = $res[$Asana];
			array_push($mark,$a);
		}
		sort($mark);
		array_shift($mark);
		array_pop($mark);
		$sum = array_sum($mark);

		$query = mysqli_query($con,"UPDATE Final_Score SET ".$Asana."='$sum' WHERE Name='$Name' AND University='$University_Name'");
	}
}
$ar=array('CP_AS1','CP_AS2','CP_AS3','CP_AS4','OP_AS1','OP_AS2','OP_AS3','SN','SK_1','SK_2');

foreach ($ar as $value) {
	Score_Aggregrate($con,$value);
}

function Totals($con){

	$query_11 = mysqli_query($con,"SELECT Name,University_Name FROM Participants");

	while($row = mysqli_fetch_array($query_11)){
		$Name = $row['Name'];
		$University_Name = $row['University_Name'];

		$query = mysqli_query($con,"UPDATE Final_Score SET Total_CPAS=(CP_AS1+CP_AS2+CP_AS3+CP_AS4),Total_OPAS=(OP_AS1+OP_AS2+OP_AS3),Total_SK = (SK_1+SK_2) WHERE Name='$Name' AND University='$University_Name'"); 

		$query_Final = mysqli_query($con,"UPDATE Final_Score SET Grand_Total=(Total_CPAS+Total_OPAS+Total_SK+SN) WHERE Name='$Name' AND University='$University_Name'");
	}	
}

Totals($con);


// echo (array_sum($mark) - max($mark) - min($mark)) / count($mark);
//Students(Yogashala_Students_Passcode) == key_log="$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2."   "Yogashala_StudentAdmin_Passcode"
// Judges == key_log="$2y$10$Reg6.CaUJVu0pmahdlyY3uqX01XeSLQCwvOP32IEC/nvR2L/MHmL."
// ChiefRefree(Yogashala_ChiefRefree_Passcode) = "$2y$10$vCygzhFUFu.jtM5FC7qDT.ib.4KSMurmMfCk.vORtVliM5ODTE2Rm"
// $password = "123";
// $param_password = password_hash($password, PASSWORD_DEFAULT);
// echo $param_password;
?>