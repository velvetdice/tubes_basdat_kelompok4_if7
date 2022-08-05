<?php
session_start();
// include 'koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database

// $nama_pegawai = $_POST['nama_pegawai'];
// $jk = $_POST['jk'];
// $alamat = $_POST['alamat'];
// $id_jabatan = $_POST['id_jabatan'];
// $id_tunjangan = $_POST['id_tunjangan'];


// $result = $mysqli->query("UPDATE `pegawai` SET `nama_pegawai` = '" . $nama_pegawai . "',`jk` = '" . $jk . "', `alamat` = '" . $alamat . "', `id_jabatan` = '" . $id_jabatan . "', `id_tunjangan` = '" . $id_tunjangan . "' WHERE `id_pegawai` = " . $_GET['id'] . ";");
// if (!$result) {
// 	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
// 	exit();
// } else {
// 	header('Location: pegawai.php');
// }

include 'koneksi.php';

$nip   	= $_POST['nip'];
$nama_pegawai   	= $_POST['nama_pegawai'];
$jk      			= $_POST['jk'];
$alamat             = $_POST['alamat'];
$id_jabatan         = $_POST['id_jabatan'];
$id_tunjangan       = $_POST['id_tunjangan'];

// buat query update
$result = $mysqli->query("UPDATE `pegawai` SET `nip` = '" . $nip . "',`nama_pegawai` = '" . $nama_pegawai . "', `jk` = '" . $jk . "', `alamat` = '" . $alamat . "', `id_jabatan` = '" . $id_jabatan . "', `id_tunjangan` = '" . $id_tunjangan . "' WHERE `pegawai`.`id_pegawai` = " . $_GET['id'] . ";");
if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: pegawai.php');
}
?>
<br>