<?php include("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/session.php"); ?>
<?php include("../includes/validations_functions.php"); ?>
<?php 
if (isset($_POST['submit'])){

$menu_name=mysql_prep($_POST["menu_name"]);
$pos=(int) $_POST["position"];
$vis=(int) $_POST["visible"];

//Validations 
$required_feilds=array("menu_name","position","visible");
validate_presences($required_feilds);

$feilds_with_max_lengths=array("menu_name" => 30);
validate_max_lengths($feilds_with_max_lengths);

if(!empty($errors)){
	$_SESSION["errors"]=$errors;
	redirect_to("new_subject.php");
}


$query="INSERT INTO subjects(";
$query.= " menu_name,position,visible";
$query.=") VALUES(";
$query.="'{$menu_name}',{$pos},{$vis})";
$result=mysqli_query($connection,$query);
if ($result){
	$message="Subject Created";
	redirect_to("manage_content.php");
}else {
	$message="Subject Creation failed";
	redirect_to("new_subject.php");
}
}
else{
	redirect_to("new_subject.php");
}
?>
<?php
if (isset($connection)){
mysqli_close($connection);
?>
<?php
}
?>