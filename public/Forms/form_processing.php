<!DOCTYPE html>
<html>
<head>
	<title>Form processing</title>
</head>
<body>
<?php 
echo print_r($_POST)."<br \>";
//$name=$_POST["username"];
//$pass=$_POST["password"];


 //form submitted or not

if(isset($_POST["submit"])){
	echo "Submitted";
$name=isset($_POST["username"]) ? $_POST["username"] : "";
$pass=isset($_POST["password"]) ? $_POST["password"] : "";
} else{
	echo "not submitted";
	$name="";
	$pass="";
}

echo "<br \>".$name.":".$pass;
?>
</body>
</html>