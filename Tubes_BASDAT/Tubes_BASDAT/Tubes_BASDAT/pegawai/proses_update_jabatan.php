<?php
session_start();
include 'koneksi.php';     // include = menambahkan/mengikutkan file, setting koneksi ke database

$id_jabatan = $_POST['id_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan_jabatan = $_POST['tunjangan_jabatan'];


$result = $mysqli->query("UPDATE `jabatan` SET `id_jabatan` = '" . $id_jabatan . "', `nama_jabatan` = '" . $nama_jabatan . "', `gaji_pokok` = '" . $gaji_pokok . "', `tunjangan_jabatan` = '" . $tunjangan_jabatan . "' WHERE `jabatan`.`id_jabatan` = " . $_GET['id'] . ";");
if (!$result) {
    echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
    exit();
} else {
    header('Location: jabatan.php');
}
