<?php 

if ( isset($_GET['username']) && isset($_GET['password']) ) {

	$login = $_GET['username'];
	$password = hash('sha256', $_GET['password']);

	$dsn = "mysql:host=localhost;dbname=itechidz";
	$user = "root";
	$pass = "";

	$dbh = new PDO($dsn, $user, $pass);

	$sqlQuery = 'SELECT * FROM users WHERE login = ? AND password = ?';

	$sth = $dbh->prepare($sqlQuery);
	$sth->execute(array($login, $password));
	$res = $sth->fetchAll();

	if (isset($res[0])) {
		echo "User detected";

		session_start();
		$_SESSION['UID'] = $res[0][0];
		$_SESSION['UNAME'] = $res[0][1];
		$_SESSION['UPASS'] = $res[0][2];
		header('location: ../itechIDZ/main.php');
	}else{
		echo "no such User";
	}
}else{
	echo "No login data was submited";
}


?>