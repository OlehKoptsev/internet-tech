<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	
	<?php 

	session_start();
	if (isset($_GET['login']) && isset($_GET['password']) && isset($_GET['email']) && isset($_GET['comment']) && isset($_SESSION['UID']) && isset($_GET['id']) ) {
	$login = $_GET['login'];
	$passwd = $_GET['password'];
	$id = $_GET['id'];
	$uid = $_SESSION['UID'];
	$email = $_GET['email'];
	$comment = $_GET['comment'];

	?>

<div class="add_new_info m-3">
	<h3>Change record</h3>

	<input type="hidden" id="id" value="<?php echo $id ?>">
	<div class="form-row">
		<div class="col">
			<label for="login">Login</label>
			<input type="text" class="form-control" id="login" placeholder="Login" value="<?php echo $login ?>">
		</div>
		<div class="col">
			<label for="password">Password</label>
			<input type="text" class="form-control" id="password" placeholder="Password" value="<?php echo $passwd ?>">
		</div>
		<div class="col">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $email ?>">
		</div>
		<div class="col">
			<label for="comment">Comment</label>
			<input type="text" class="form-control" id="comment" placeholder="Comment" value="<?php echo $comment ?>">
		</div>
	</div>

	<button class="form-control btn btn-primary" type="submit" onclick="change_user_data()">CHANGE RECORD</button>

</div>

<h3 id="response"></h3>

<a href="main.php" class="btn btn-dark">Go back</a>

	<?php  	
		}else{
			echo "unauthirized action";
		}
	?>

<script type="text/javascript" src="change_script.js"></script>

</body>
</html>