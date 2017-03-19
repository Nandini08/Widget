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

$menu="Deleted";
$pos=4;
$vis=1;
$id=5;
$query="UPDATE subjects SET ";
 $query.="menu_name='{$menu}',"; 
  $query.=" position={$pos},";
  $query.=" visible={$vis} ";
  $query.="WHERE id={$id} ";
$result=mysqli_query($connection,$query);
if ($result && mysqli_affected_rows($connection)==1){
	echo "query success";
}else {
	die("Data update failed".mysqli_error($connection));
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