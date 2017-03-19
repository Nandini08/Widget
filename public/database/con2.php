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

$menu="example";
$pos=4;
$vis=1;
$query="INSERT INTO subjects(";
$query.= " menu_name,position,visible";
$query.=") VALUES(";
$query.="'{$menu}',{$pos},{$vis})";
$result=mysqli_query($connection,$query);
if ($result){
	echo "query success";
}else {
	die("Data query failed".mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
</head>
<body>

</body>
</html>
<?php
//closing the connection
mysqli_close($connection);
?>