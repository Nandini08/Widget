<?php 
if(isset($_POST["submit"])){
	$name=$_POST["username"];
	$pass=$_POST["password"];
	echo "submitted";
}else{
	echo "Notsubmitted";
	echo $name="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form action="singleform.php" method="post">
Username: <input type="text" name="username" value="<?php echo htmlspecialchars($name) ?>"/> <br \>
Password: <input type="password" name="password" value=""/> <br \>  
<br \>
 <input type="submit" name="submit" value="Submit"/> <br \> 
 </form>
</body>
</html>
