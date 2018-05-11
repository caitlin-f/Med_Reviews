<?php
// database connections and error checking

require_once('config.php');

function db_connect() {
	$db = new PDO(DB_DSN, DB_USER, DB_PASS); // Need this line for the hosted site
	// $db = new PDO(DB_DSN, DB_USER); // Need this line for the local site
	if($db) {
		return $db;
	}
	$msg = "Database connection failed";
	exit($msg);
} ?>