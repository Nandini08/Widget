<?php 
require_once("function.php");
require_once("validations.php");
$errors=array();
$message="";
$name="";

if(isset($_POST["submit"])){
	//form was submitted
	$name=trim($_POST["username"]);
	$pass=trim($_POST["password"]);
	//check validations
	$feild=array("username","password");
	foreach ($feild as $feilds){
		$val=trim($_POST[$feilds]);
	if (!has_presence($val)){
		$errors["feilds"]=$feilds."Value cant be blank";
	}

	if($name=="nandini" && $pass=="nandini"){
	redirect_to("hello.html");
	}else{
	$message = "There was some errors";
	}
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
<?php echo $message ?>
<?php //display validtaion errors?>
<?php echo form_errors($errors); ?>
<form action="newsinglevalidations.php" method="post">
Username: <input type="text" name="username" value="<?php echo htmlspecialchars($name) ?>"/> <br \>
Password: <input type="password" name="password" value=""/> <br \>  
<br \>
 <input type="submit" name="submit" value="Submit"/> <br \> 
 </form>
</body>
</html>
