<?php
session_start();

include 'koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database

$username	= $_POST['username']; // menangkap username
$password	= $_POST['password']; // menangkap password

// echo $user." - ".$pass; // cek apakah username dan password terparsing..

// membuat query untuk mencari data yang sesuai login
$result = $mysqli->query("SELECT * FROM user where username = '" . $username . "' and password = '" . $password . "'");
// echo "SELECT * FROM user where user = '".$user."' and pass = '".$pass."'";
// cek apakah ada data yang sesuai
if ($result->num_rows > 0) {
	// echo "User ada";
	while ($row = $result->fetch_assoc()) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['login'] = 'login';
	}
	if ($_SESSION['level'] == 'admin') {
		header('Location: dashboard_a.php');
	} else {
		header('Location: dashboard_u.php');
	}
} else {
	// echo "User tidak ada";
	$_SESSION['msg'] = 1;
	header('Location: login.php');
}
