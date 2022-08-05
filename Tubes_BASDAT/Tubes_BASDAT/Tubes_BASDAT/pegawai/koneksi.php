<?php
// (nama server, user, password, database)
$mysqli = new mysqli("localhost", "root", "", "tubes_basdat");
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
