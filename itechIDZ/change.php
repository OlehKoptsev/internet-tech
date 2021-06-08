<?php 

include 'crypt.php';

$key = 'i37gt4b74tb237tg237t2o83ty75itgbc5dsbsbsbajj';

$login = $_GET['login'];
$passwd = $_GET['password'];
$id = $_GET['id'];
$email = $_GET['email'];
$comment = $_GET['comment'];

$clogin = EncryptData($login, $key);
$cpasswd = EncryptData($passwd, $key);
$cemail = EncryptData($email, $key);
$ccomment = EncryptData($comment, $key);

// http://localhost/itechIDZ/write.php?id=0&login=magnus&password=1212234&email=bobmgmailcom&comment=Ubuntu

$dsn = "mysql:host=localhost;dbname=itechidz";
$user = "root";
$pass = "";

$dbh = new PDO($dsn, $user, $pass);

$sqlQuery = "UPDATE user_info SET login = ?, password = ?, email = ?, Comment = ? WHERE user_info.id = ?";

$prep = $dbh->prepare($sqlQuery);
$prep->execute(array($clogin, $cpasswd, $cemail, $ccomment, $id));
if ($prep) {
	echo "SUCCESSFULLY changed";
}else {
	echo "change UNSUCCESSFULL";
}

$dbh = null;
mcrypt_module_close($mc_d);




?>