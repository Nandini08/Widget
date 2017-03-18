<?php

function redirect_to($new_location){
	header("Location: ".$new_location);
	exit;
}

function mysql_prep($string){
	global $connection;
	$escaped_string=mysqli_real_escape_string($connection,$string);
	return $escaped_string;
}
function confirm_query($result_set){
if (!$result_set){
	die("Data query failed:");
}
}

function find_subject_by_id($subject_id){
global $connection;
$safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
$query="SELECT * ";
$query.="FROM subjects ";
$query.="WHERE id = {$safe_subject_id} ";
$query.="LIMIT 1";
$subject_set=mysqli_query($connection,$query);
confirm_query($subject_set);
if ($subject = mysqli_fetch_assoc($subject_set)){
return $subject;
}else{
	return null;
}

}

function find_page_by_id($page_id){
global $connection;
$safe_page_id=mysqli_real_escape_string($connection,$page_id);
$query="SELECT * ";
$query.="FROM pages ";
$query.="WHERE id = {$safe_page_id} ";
$query.="LIMIT 1";
$page_set=mysqli_query($connection,$query);
confirm_query($page_set);
if ($page = mysqli_fetch_assoc($page_set)){
return $page;
}else{
	return null;
}
}

function find_all_subjects(){
global $connection;
$query="SELECT * ";
$query.="FROM subjects ";
$query.="WHERE visible=1 ";
$query.="ORDER BY position ASC";
$subject_set=mysqli_query($connection,$query);
confirm_query($subject_set);
return $subject_set;
}

?>