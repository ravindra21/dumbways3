<?php
	include 'connection.php';
	$id = $_GET['id']; // the id of the image_blog
?>

<!DOCTYPE html>
<html>
<head>
	<title>dw employee</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		body{
			background: #000000;
			color: white;
		}
		h1 {
			color: #f0f0f0;
		}
		header {
			margin-bottom: 40px;
		}
		#content > section{
			margin-bottom: 40px;
			background: #2f2f2f;
		}
		.card-text {
			color: red;
			font-size: 22px;
		}
		#content {
			max-width: 840px;
		}
		#actionBtn {
			display: block;
			width: 100%;
			text-align: right;
		}
		.card-header img {
			margin-top: -80px;
		}

		#editForm {
			width: 700px;
		}
	</style>
</head>
<body>
	<header class="container p-2">
		<h1>DW Employee</h1>
	</header>
	<section id="content" class="container">
		<section class="card p-3">
			<form method="post" action="/add_users" class="form-inline">
				<input type="file" name="photo" placeholder="Attache" class="btn btn-secondary" />
				<input type="text" name="name" placeholder="Input name programmer" class="form-control m-2" />
				<button type="submit" name="submit" class="btn btn-primary">Add Character</button>
			</form>
		</section>

		<?php
			$sql = "SELECT u.id, u.name, u.photo , s.name as skill FROM users_tb as u JOIN skill_tb as s where s.user_id = u.id and u.id = '$id' ";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
		?>

		<section class="card flex-row flex-wrap" id="<?php echo $row["id"] ?>" >
			<div class="card-block p-2">
				<form action="edit_user_submit.php?id=<?php echo $id ?>" method="POST" id="editForm">
					<div class="form-group row">
					    <label for="name" class="col-sm-2 col-form-label">Name : </label>
					    <div class="col-sm-10">
					      <input type="text" name="name" class="form-control" value="<?php echo $row["name"] ?>">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="skill" class="col-sm-2 col-form-label">Skill : </label>
					    <div class="col-sm-10">
					      <textarea type="text" name="skill" class="form-control" value="<?php echo $row["skill"] ?>"><?php echo $row["skill"] ?></textarea>
					    </div>
					</div>
					<button type='submit' name='edit' class="btn btn-primary">Edit User</button>
				</form>
			</div>
		</section>


		<?php
			}
		}
		?>
	</section>
</body>
</html>
