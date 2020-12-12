<?php
	include 'connection.php';
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
			margin-top: -60px;
		}
		
	</style>
</head>
<body>
	<header class="container p-2">
		<h1>DW Employee</h1>
	</header>
	<section id="content" class="container">
		<section class="card p-3">
			<form method="post" action="add_user.php" enctype="multipart/form-data" class="form-inline">
				<input type="file" name="photo" placeholder="Attache" class="btn btn-secondary" />
				<input type="text" name="name" placeholder="Input name programmer" class="form-control m-2" />
				<button type="submit" name="submit" class="btn btn-primary">Add Character</button>
			</form>
		</section>

		<?php
			$sql = "SELECT u.id, u.name, u.photo , s.name as skill FROM users_tb as u JOIN skill_tb as s where s.user_id = u.id";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
		?>

		<section class="card flex-row flex-wrap" id="<?php echo $row["id"] ?>" >
			
			<div id="actionBtn" class="p-2">
				<a href="edit_user.php?id=<?php echo $row["id"] ?>" class="btn btn btn-warning"> Edit </a>
				<a href="delete_user.php?id=<?php echo $row["id"] ?>&photo=<?php echo $row["photo"] ?>" class="btn btn btn-danger"> X </a>
			</div>

			<div class="card-header border-0">
			    <img src="<?php echo $row["photo"] ?>" alt="<?php echo $row["photo"] ?>" width="200" height="200" alt="">
			</div>

			<div class="card-block p-2">
				<h2 class="card-title"> <?php echo $row["name"] ?> </h2>
				<p class="card-text"> <?php echo $row["skill"] ?> </p>
				<form action="add_skill.php" method="post" class="form-inline">
					<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
					<input type="hidden" name="old_skill" value="<?php echo $row["skill"] ?>" >
					<input type="text" name="skill" placeholder="Input skill" class="form-control m-2" />
					<button type="submit" name="submit" class="btn btn-primary">Add skill</button>
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
