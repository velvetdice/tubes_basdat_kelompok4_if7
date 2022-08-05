<?php
session_start();
include 'koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database

$nip = $_POST['nip'];
$nama_pegawai = $_POST['nama_pegawai'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$id_tunjangan = $_POST['id_tunjangan'];
$id_jabatan = $_POST['id_jabatan'];

$result = $mysqli->query("INSERT INTO `pegawai` ('id_pegawai',`nip`, `nama_pegawai`, `jk`, `alamat`, 'id_jabatan', 'id_tunjangan')
 						VALUES ( NULL,'" . $nip . "', '" . $nama_pegawai . "', '" . $jk . "', '" . $alamat . "', '" . $id_jabatan . "','" . $id_tunjangan . "');");

if (!$result) {
	echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
	exit();
} else {
	header('Location: pegawai.php');
}
?>
<br>