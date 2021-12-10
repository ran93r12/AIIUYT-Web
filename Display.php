<?php
include_once "config/db_connection.php";
$query23 = mysqli_query($con,"SELECT * FROM Primary_Score WHERE Panel_Num = 2 ORDER BY Time DESC LIMIT 1");
	while($row = mysqli_fetch_array($query23)){
		$Uni_name = $row['University'];
		$Gender = $row['Gender'];
	}
$query24 = mysqli_query($con,"SELECT num_participants FROM Universities WHERE Uni_name = '$Uni_name' AND Gender = '$Gender'");
while($rows = mysqli_fetch_array($query24)){
	$number = $rows['num_participants'];
}
// $D = 5 * ($number);

// $q2 = mysqli_query($con,"SELECT * FROM Display WHERE Panel = 2 ORDER BY Time DESC LIMIT 1");

$q3 = mysqli_query($con,"SELECT DISTINCT Name,Asana,Judge_Name,Asana_Score,University,Gender,Panel FROM Display WHERE University = '$Uni_name' ORDER BY Judge_Name");
{
	$res = array();
	while($c = mysqli_fetch_array($q3)){
		$a = array();
		$n = $c['Name'];
		$as = $c['Asana'];
		$s = $c['Asana_Score'];
		$j = $c['Judge_Name'];
		array_push($a,$n);
		array_push($a,$as);
		array_push($a,$s);
		array_push($a,$j);
		array_push($res,$a);
		// var_dump($res);
		// print_r($res);
	}
	$arr = array();
	// print_r($res);
	foreach ($res as $row) {
		$arr[$row[0]][$row[3]] = $row[2];
	}
	echo '<table border = 1>
	  <tr><th>Chest No.</th><th>Judge1</th><th>Judge2</th><th>Judge3</th><th>Judge4</th><th>Judge5</th><th>Aggregate</th></tr>';
	foreach ($arr as $name => $row) {
		echo '<tr><td>'.$name.'</td>';
		$a = array();
		foreach ($row as $value) {
			array_push($a,$value);
			echo '<td>' . $value . '</td>';
		}
		sort($a);
		array_shift($a);
		array_pop($a);
		$sum=array_sum($a);
		echo '<td>'.$sum.'</td>';
		echo '</tr>';
	}
	echo '</table>';
}

?>
<html>
<head><title>Display</title>
</head>
<body>
	<script>
		var rows = 0;
	var fadeTime = 700;
	var delayTime = 50;
	var animTime = 0;
</script>
</body>
</html>