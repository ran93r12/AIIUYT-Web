<?php
include_once "config/db_connection.php";

echo "King";
function Display_Score($con,$Asana)
{
	$query = mysqli_query($con,"SELECT * FROM Primary_Score WHERE Panel_Num = 1 ORDER BY Time DESC LIMIT 1");
	while($row = mysqli_fetch_array($query)){
		$Uni_name = $row['University'];
		$Gender = $row['Gender'];
		$Query1 = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name = '$Uni_name' AND Gender = '$Gender' ");
		while($res = mysqli_fetch_array($Query1)){
			$Name = $res['Name'];
			$University = $res['University_Name'];
			$Gen = $res['Gender'];
			$Query2 = mysqli_query($con,"SELECT ".$Asana.",Judge_Name FROM Primary_Score WHERE University = '$University' AND Gender = '$Gen' AND Name ='$Name' AND Panel_Num = 1") or die(mysqli_error($con));
			$Marks = array();
			while($Res = mysqli_fetch_array($Query2)){
				$a = $Res[$Asana];
				$b = $Res['Judge_Name'];
				if ($a != -1){
					// echo $a;echo $b;
					$query12 = mysqli_query($con,"INSERT INTO Display VALUES('$Name','$Asana','$a','$b','$University','$Gen',1,NULL)") or die(mysqli_error($con));
				}
				else{
					continue;
				}
				array_push($Marks,$a);
			
			}
			echo '<br />';
		}
	}
}


$ar=array('CP_AS1','CP_AS2','CP_AS3','CP_AS4','OP_AS1','OP_AS2','OP_AS3','SN');

foreach ($ar as $value) {
	Display_Score($con,$value);
}


$query23 = mysqli_query($con,"SELECT * FROM Primary_Score WHERE Panel_Num = 1 ORDER BY Time DESC LIMIT 1");
	while($row = mysqli_fetch_array($query23)){
		$Uni_name = $row['University'];
		$Gender = $row['Gender'];
	}
$query24 = mysqli_query($con,"SELECT num_participants FROM Universities WHERE Uni_name = '$Uni_name' AND Gender = '$Gender'");
while($rows = mysqli_fetch_array($query24)){
	$number = $rows['num_participants'];
}

$D = 5 * ($number);
// echo $D;
$Plz =mysqli_query($con,"SELECT * FROM Display WHERE Panel = 1 ORDER BY Time DESC LIMIT $D");
while($result = mysqli_fetch_array($Plz))
{
	$Uni_name = $result['University'];
	$Gender = $result['Gender'];
	$Asana_Name = $result['Asana'];
	$Name = $result['Name'];
	$Judge = $result['Judge_Name'];
	// echo $Name;
	//$que = mysqli_query($con,"SELECT Asana_Score FROM Display WHERE Judge_Name = '$Judge' AND Name = '$Name'");

	$que = mysqli_query($con,"SELECT Name, Asana, Asana_Score, Judge_Name from Display where Asana in (select distinct asana from Display) and Name = '$Name'");
	while ($t=mysqli_fetch_array($que)){

		echo $t['Asana_Score'];
	}
	
	// echo '<table><tr><td>Name</td><td>Judge 1</td><td>Judge 2</td><td>Judge 3</td><td>Judge 4</td><td>Judge 5</td><td>Aggregate</td></tr>'
	// while($t = mysqli_fetch_array($que)){
	// 	echo '<tr>'
	// 	$n = $t['Asana_Score'];
	// 	echo $n; echo $Name;
	// 	echo '<tr />
		
	// 	<td>Name</td></tr>
	// 	<';
	// }
}

?>