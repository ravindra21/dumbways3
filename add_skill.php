<?php
include('./connection.php');
$id = $_POST['id'];
$skill = $_POST['skill'];
$old_skill = $_POST['old_skill'];

if($old_skill == ' ' || $old_skill == '') {
	$skill = $skill;
} else {
	$skill = $old_skill.', '.$skill;	
}

echo $skill;
$sql = "UPDATE skill_tb SET name = '$skill' where user_id = $id";
if($conn->query($sql) === TRUE){
	echo "new skill added successfully";
	header('Location: ./index.php');
} else{
	echo "error: ".$sql.'<br>'.$conn->error;
}

$conn->close();

?>