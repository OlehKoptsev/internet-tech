<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<h1>Welcome to AllSafe</h1>

	<?php 
	session_start();
	if (isset($_SESSION['UID']) && isset($_SESSION['UNAME'])) {
		$uname = $_SESSION['UNAME'];
		echo "<p class='pl-2'>You are loged in as <strong>$uname</strong> (<a href='logout.php'>logout</a>) </p>";
	}else{
		echo "<p class='pl-2'>You are not loged in</p>";
		echo "<a class='btn btn-primary m-2' href='login_form.html'>Login</a>";
	}
	?>

	<?php
	if ( isset($_SESSION['UID']) && isset($_SESSION['UNAME']) ) {
		$UIDv = $_SESSION['UID'];
		?> 
		<div class="add_new_info m-3">
			<h3>Add new record</h3>

				<input type="hidden" id="uid" value="<?php echo $UIDv ?>">
				<div class="form-row">
					<div class="col">
						<label for="login">Login</label>
						<input type="text" class="form-control" id="login" placeholder="Login">
					</div>
					<div class="col">
						<label for="password">Password</label>
						<input type="text" class="form-control" id="password" placeholder="Password">
					</div>
					<div class="col">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email">
					</div>
					<div class="col">
						<label for="comment">Comment</label>
						<input type="text" class="form-control" id="comment" placeholder="Comment">
					</div>
				</div>

				<button class="form-control btn btn-primary" type="submit" onclick="add_user_data()">ADD RECORD</button>

		</div>
		<div class="user-data m-3">

			<h3>Your saved records</h3>

			<table id="tableId" class="table table-striped table-dark">
				<thead>
					<th>ID</th>
					<th>LOGIN</th>
					<th>PASSWORD</th>
					<th>EMAIL</th>
					<th>COMMENT</th>
				</thead>
				<tbody id="user_info">
				</tbody>
			</table>
			<?php
		}else{ ?>

			<p>You must login to view your data</p>

		<?php } ?>

	</div>

	<script type="text/javascript" src="script.js"></script>

</body>
</html>