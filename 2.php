<?php

$res = array(
	array(
		'TEJA', '9', 'A'
	),
	array(
		'TEJA', '10', 'B'
	),
	array(
		'TEJA', '9', 'C'
	),
	array(
		'TEJA', '5', 'D'
	),
	array(
		'TEJA', '9', 'E'
	),
	array(
		'Raj', '6', 'A'
	),
	array(
		'Raj', '8', 'B'
	),
	array(
		'Raj', '10', 'C'
	),
	array(
		'Raj', '9', 'D'
	),
	array(
		'Raj', '9', 'E'
	),
	
);
$arr = array();
foreach ($res as $row) {
	$arr[$row[0]][$row[2]] = $row[1];
}
echo '<table border = 1>
	  <tr><th>#</th><th>Judge1</th><th>Judge2</th><th>Judge3</th><th>Judge4</th><th>Judge5</th><th>Aggregate</th></tr>';
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
print_r($arr);

?>