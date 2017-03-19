
<?php 

$errors=array();

function feildname_as_text($feildname){
	$feildname=str_replace("_"," ",$feildname);
	$feildname=ucfirst($feildname);
	return $feildname;
}


function has_presence($value){
	return isset($value) && $value!="";
}

function validate_presences($required_feilds){
	global $errors;
	foreach ($require_feilds as $feild){
		$value=trim($_POST[$feild]);
	if (!has_presence($value)){
		$errors[$feild]=feildname_as_text($feild)." can't be blank";
	}
}



function has_max_length($value,$max){
	return strlen($value)<=$max;
}
function validate_max_lengths($feilds_with_max_lengths){
	global $errors;
	foreach ($feilds_with_max_lengths as $feild=>$max){
		$value=trim($_POST[$feild]);
	if (!has_max_length($value)){
		$errors[$feild]=feildname_as_text($feild)." is too long";
	}
}


function has_inclusion_in($value,$set){
	return in_array($value,$set);
}



function form_errors($errors=array()){
	$out="";
	if(!empty($errors)){
		$out.="<div class=\"error\">";
		$out.="Please fix the following errors";
		$out.="<ul>";
		foreach ($errors as $key => $error){
			$out.="<li>{$error}</li>";
		}
		$out.="</ul>";
		$out.="</div>";
	}

	return $out;	
} ?>