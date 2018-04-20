<?php

function select_all_residents() {
	global $db;

	$sql = "SELECT * FROM Resident";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function find_resident_info($id) {
	global $db;

	$sql = "SELECT * FROM Resident WHERE ResidentID='".$id."'";
	$result = $db->query($sql);
	$array = $result->fetch(PDO::FETCH_ASSOC);
	return $array;
}

function select_all_facilities() {
	global $db;

	$sql = "SELECT * FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

?>