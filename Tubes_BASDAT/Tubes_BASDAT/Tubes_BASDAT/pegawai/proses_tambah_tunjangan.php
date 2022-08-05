<?php
session_start();
include 'koneksi.php';

$id_tunjangan = $_POST['id_tunjangan'];
$tunjangan_anak = $_POST['tunjangan_anak'];
$tunjangan_pasutri = $_POST['tunjangan_pasutri'];
$uang_makan = $_POST['uang_makan'];
$uang_lembur = $_POST['uang_lembur'];


$result = $mysqli->query("INSERT INTO `tunjangan` (`id_tunjangan`, `tunjangan_anak`, `tunjangan_pasutri`, `uang_makan`, `uang_lembur') VALUES ('".$id_tunjangan."','".$tunjangan_anak."','".$tunjangan_pasutri."','".$uang_makan."','".$uang_lembur."');");
if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: tunjangan.php');
}
