<?php
include('./connection.php');
$id = $_GET["id"];
$name = $_POST['name'];
$skill = $_POST['skill'];

$sql = "UPDATE users_tb SET name='$name' WHERE id=$id";
$sql2 = "UPDATE skill_tb SET name='$skill' WHERE id=$id";

if($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE){
	header('Location: ./index.php');
	echo "user update successfully";
} else{
	echo "error: ".$sql.'<br>'.$conn->error;
}

$conn->close();
?>
