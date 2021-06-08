<?php 

include 'crypt.php';

$key = 'i37gt4b74tb237tg237t2o83ty75itgbc5dsbsbsbajj';

session_start();
if (isset($_SESSION['UPASS']) && isset($_SESSION['UNAME'])) {
	$passwd = $_SESSION['UPASS'];
	$login =  $_SESSION['UNAME'];
}


$dsn = "mysql:host=localhost;dbname=itechidz";
$user = "root";
$pass = "";

$dbh = new PDO($dsn, $user, $pass);

$sqlQuery = 'SELECT * FROM users WHERE login = ?';

$sth = $dbh->prepare($sqlQuery);
$sth->execute(array($login));
$res = $sth->fetchAll();

if (isset($res[0])) {
	$user_pass = $res[0][2];

	if ($passwd == $user_pass) {

		$sqlGetInfo = 'SELECT * FROM user_info WHERE user_info.user_id IN(
		SELECT id FROM users WHERE users.login = ? AND users.password = ? )';

		$prep = $dbh->prepare($sqlGetInfo);
		$prep->execute(array($login, $passwd));
		$info = $prep->fetchAll();

		foreach ($info as $row) {
			$id = $row[0];
			$l = DecryptData($row[2], $key);
			$p = DecryptData($row[3], $key);
			$e = DecryptData($row[4], $key);
			$i = DecryptData($row[5], $key);
			echo "<tr><td>$id</td><td>$l</td><td>$p</td><td>$e</td><td>$i</td></tr>";
		}

	} else {
		echo "This password is wrong";
	}
} else {
	echo "This user doesn't exist";
}

$dbh = null;

mcrypt_module_close($mc_d);


?>