<?php
session_start();
include 'koneksi.php';

$id_tunjangan = $_POST['id_tunjangan'];
$tunjangan_anak = $_POST['tunjangan_anak'];
$tunjangan_pasutri = $_POST['tunjangan_pasutri'];
$uang_makan = $_POST['uang_makan'];
$uang_lembur = $_POST['uang_lembur'];


$result = $mysqli->query("UPDATE `tunjangan` SET `id_tunjangan` = '" . $id_tunjangan . "', `tunjangan_anak` = '" . $tunjangan_anak . "', `tunjangan_pasutri` = '" . $tunjangan_pasutri . "', `uang_makan` = '" . $uang_makan . "', `uang_lembur` = '" . $uang_lembur . "' WHERE `tunjangan`.`id_tunjangan` = " . $_GET['id'] . ";");
if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: tunjangan.php');
}
