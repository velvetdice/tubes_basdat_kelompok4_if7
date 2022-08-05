<?php
session_start();
include 'koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$result = $mysqli->query("INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES 
(NULL, '" . $username . "', '" . $password . "', '" . $level . "');");
if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: user.php');
}
