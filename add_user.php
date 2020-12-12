<?php
include('./connection.php');

$sql = 'SELECT id FROM users_tb ORDER BY id DESC LIMIT 1';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row["id"]+1;

$name = $_POST['name'];

$target_dir = "./photo/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo(basename($_FILES["photo"]["name"]),PATHINFO_EXTENSION));
$target_file = $target_dir . $id . '.' .$imageFileType;

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$sql = "INSERT INTO users_tb(id, name, photo) VALUES($id, '$name','$target_file')";
$sql2 = "INSERT INTO skill_tb(name, user_id) VALUES(' ','$id')";

if($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE){
	header('Location: ./index.php');
	echo "new image added successfully";
} else{
	echo "error: ".$sql.'<br>'.$conn->error;
}

$conn->close();
?>
