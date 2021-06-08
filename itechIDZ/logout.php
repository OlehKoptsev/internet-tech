<?php 
session_start();
if (isset($_SESSION['UID']) || isset($_SESSION['UNAME'])) {
	unset($_SESSION['UID']);
	unset($_SESSION['UNAME']);
	session_unset();
	session_destroy();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>