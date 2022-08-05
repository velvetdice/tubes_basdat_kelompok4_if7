<?php
session_start();
include 'koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$result = $mysqli->query("UPDATE `user` SET `username` = '" . $username . "', `password` = '" . $password . "', `level` = '" . $level . "' WHERE `user`.`id_user` = " . $_GET['id'] . ";");
if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: user.php');
}
