<?php include("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/header.php"); ?>
<?php 
if (isset($_GET["subject"])) {
$selected_subject_id=$_GET["subject"];
$selected_page_id=null;
} elseif (isset($_GET["page"])) {
$selected_page_id=$_GET["page"];
$selected_subject_id=null;
}else{
	$selected_page_id=null;
	$selected_subject_id=null;
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
<a href="manage_content.php ? subject= <?php echo urlencode($subject["id"]); ?>"> <?php 
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
	<li><a href="manage_content.php? page= <?php echo urlencode($page["id"]); ?>"> <?php 
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
<h2>Create Subject</h2>
<form action="create_subject.php" method="post">
<p> Menu name :<input type="text" name="menu_name" value="" />
</p>
<p>Position:
<select name="position">
<?php
$subject_set=find_all_subjects();
$subject_count=mysqli_num_rows($subject_set);
for($count=1; $count<=($subject_count+1); $count++){
	echo "<option value=\"{$count}\">{$count}</option>";
}
?>
</select>
<p>Visible:
<input type="radio" name="visible" value="0"/> No
&nbsp;
<input type="radio" name="visible" value="1" /> Yes
</p>
<input type="submit" value="Create Subject" />
<br />
<a href="manage_content.php"> Cancel </a>
</div>
</div>
<?php include("../includes/footer.php"); ?>