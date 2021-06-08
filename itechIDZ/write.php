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
// $cid = EncryptData($id, $key);
$cemail = EncryptData($email, $key);
$ccomment = EncryptData($comment, $key);

// http://localhost/itechIDZ/write.php?id=0&login=magnus&password=1212234&email=bobmgmailcom&comment=Ubuntu

$dsn = "mysql:host=localhost;dbname=itechidz";
$user = "root";
$pass = "";

$dbh = new PDO($dsn, $user, $pass);

$sqlQuery = "INSERT INTO user_info (user_info.user_id, user_info.login, user_info.password, user_info.email, user_info.Comment) VALUES (?, ?, ?, ?, ?)";

$prep = $dbh->prepare($sqlQuery);
$prep->execute(array($id, $clogin, $cpasswd, $cemail, $ccomment));
if ($prep) {
	echo "SUCCESSFULLY saved";
}else {
	echo "save UNSUCCESSFULL";
}

$dbh = null;
mcrypt_module_close($mc_d);


?>