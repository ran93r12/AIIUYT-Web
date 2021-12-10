<?php

define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'AIUYT');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
function getUserAccessRoleByID($id)
{
	global $con;
	
	$query = "select user_role from tbl_user_role where  id ='$id'";	
	$rs = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($rs);
	
	return $row['user_role'];
}
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>
