<?php
include('./connection.php');
$id = $_GET['id'];
$photo = $_GET['photo'];

$sql = "DELETE from users_tb where id = $id";
$sql2 = "DELETE from skill_tb where user_id = $id";

if($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE){
	unlink($photo);
	header('Location: ./index.php');
	echo "user deleted successfully";
} else{
	echo "error: ".$sql.'<br>'.$conn->error;
}

$conn->close();
?>