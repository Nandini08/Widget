<?php 
require_once("function.php");
if(isset($_POST["submit"])){
	$name=$_POST["username"];
	$pass=$_POST["password"];
if($name=="nandini" && $pass=="nandini"){
	redirect_to("form1.php");
}else{
$message = "There was some errors";
}
}
else{
	$name="";
	$message="Please log in:";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form action="newsingle.php" method="post">
Username: <input type="text" name="username" value="<?php echo htmlspecialchars($name) ?>"/> <br \>
Password: <input type="password" name="password" value=""/> <br \>  
<br \>
 <input type="submit" name="submit" value="Submit"/> <br \> 
 </form>
</body>
</html>
