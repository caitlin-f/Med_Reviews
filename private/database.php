<?php
// database connections and error checking

require_once('config.php');

function db_connect() {
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	if($db) {
		return $db;
	}
	$msg = "Database connection failed";
	exit($msg);
}