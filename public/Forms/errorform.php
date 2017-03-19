<!DOCTYPE html>
<html>
<head>
	<title>Validation errors
	</title>
</head>
<body>
<?php
require_once("validations.php");
$errors=array();
$user=trim("   ");
if(!has_presence($user)){
	$errors["username"]="value can't be empty";
}

?>
<?php echo form_errors($errors); ?>
</body>
</html>