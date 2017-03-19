<?php
//1. connecting to database
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
<?php
//2. perform database query
$query="SELECT * ";
$query.="FROM subjects ";
$query.="WHERE visible=1 ";
$query.="ORDER BY position ASC";
$result=mysqli_query($connection,$query);
if (!$result){
	die("Data query failed");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
</head>
<body>
<ul>
<?php
//3.dumping the data i.e, using the returned data
while($subject=mysqli_fetch_assoc($result)){
	?>
	<li> <?php 
		echo $subject["menu_name"]."(".($subject["id"]).")";
		echo "<br \>";
	}
?>
</li>
</ul>
<?php 
//4.Freeing the data
mysqli_free_result($result)
?>
</body>
</html>
<?php
//closing the connection
mysqli_close($connection);
?>