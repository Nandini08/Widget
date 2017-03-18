<?php 
$name="root";
$pass="nandu@4044";
$db_name="widget_corp";
$host="localhost";
$connection=mysqli_connect($host,$name,$pass,$db_name);
if (mysqli_connect_errno()){
	die("Database Connection failed".
		mysqli_connect_error().
		"(".mysqli_connect_errno().")"
		);
}
?>