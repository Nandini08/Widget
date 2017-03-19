<!DOCTYPE html>
<html>
<head>
	<title>Validations</title>
</head>
<body>
<?php 
//presence
function has_presence($value){
	return isset($value) && $value!="";
}
//length
function has_max($value,$max){
	return strlen($value)<=$max;
}

//inclusion in aset
function has_included($value,$set){
	return in_array($value,$set);
}

function form_errors($errors=array()){
	$out="";
	if(!empty($errors)){
		$out.="<div class=\"error\">";
		$out.="Please fix the errors";
		$out.="<ul>";
		foreach ($errors as $key => $error){
			$out.="<li>{$error}</li>";
		}
		$out.="</ul>";
		$out.="</div>";
	}
	return $out;
}
?>
</body>
</html>