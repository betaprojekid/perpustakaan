<?php

function noDos($data){
	global $conn;

	$sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	$sql = mysqli_real_escape_string($conn, $sql);

	return $sql;
}