<?php include("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/header.php"); ?>
<?php 
if (isset($_GET["subject"])) {
$selected_subject_id=$_GET["subject"];
$current_subject=find_subject_by_id($selected_subject_id); 
$selected_page_id=null;
$current_page=null;
} elseif (isset($_GET["page"])) {
$selected_page_id=$_GET["page"];
$current_page=find_page_by_id($selected_page_id); 
$selected_subject_id=null;
$current_subject=null;
}else{
	$selected_page_id=null;
	$current_page=null;
	$selected_subject_id=null;
	$current_subject=null;
}
?>
<div id="main">

<div id="navigation">
<ul class="subjects">
<?php
$query="SELECT * ";
$query.="FROM subjects ";
$query.="ORDER BY position ASC";
$subject_set=mysqli_query($connection,$query);
confirm_query($subject_set);
?>

<?php
while($subject=mysqli_fetch_assoc($subject_set)){
	?>
	<?php
	echo "<li";
	if ($subject["id"]==$selected_subject_id) {
	echo "class=\"selected\"";
}
echo ">"; 
?>
<a href="index.php ? subject= <?php echo urlencode($subject["id"]); ?>"> <?php 
		echo $subject["menu_name"];
		echo "<br \>";
		?></li></a>
<?php
$query="SELECT * ";
$query.="FROM pages ";
$query.="WHERE subject_id={$subject["id"]} ";
$query.="ORDER BY position ASC";

	
$page_set=mysqli_query($connection,$query);
confirm_query($page_set);
?>
		<ul class="pages">
	<?php	
while($page=mysqli_fetch_assoc($page_set)){
	?>
	<li><a href="index.php? page= <?php echo urlencode($page["id"]); ?>"> <?php 
		echo $page["menu_name"];
		echo "<br \>";
	}
?></li></a>
<?php mysqli_free_result($page_set); ?>
</ul>
<?php
}?>
</ul>
<?php 
mysqli_free_result($subject_set);
?>

</div>
<div id="page">


<?php if($current_subject) { ?>
<h2> Manage Content</h2>

Menu name : <?php echo htmlentities($current_subject["menu_name"]); ?><br \>
 <?php } elseif ($current_page){ ?>

<?php echo htmlentities($current_page["menu_name"]); ?><br \>
 <?php } else {?>
 Please select a subject or page.
 <?php }?>

</div>
</div>
<?php include("../includes/footer.php"); ?>