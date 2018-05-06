<?php

function select_all_residents($lastname, $firstname, $facility) {
	global $db;

	$sql = "SELECT R.*
	 FROM Resident R, ResidentHome RH, Facility F
	 WHERE R.ResidentID = RH.ResidentID AND
	  RH.RACID = F.RACID AND
	  R.LastName LIKE $lastname AND 
	  R.FirstName LIKE $firstname AND 
	  F.Name LIKE $facility
	 ORDER BY R.LastName";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function resident_names_facilities() {
	global $db;

	$sql = "SELECT R.ResidentID, R.LastName, R.FirstName, F.Name
	 FROM Resident R, ResidentHome RH, Facility F
	 WHERE R.ResidentID = RH.ResidentID AND RH.RACID = F.RACID 
	 ORDER BY R.LastName";

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

function select_all_facilities($organisation, $name) {
	global $db;

	$sql = "SELECT * FROM Facility
	 WHERE Organisation LIKE $organisation AND Name LIKE $name
	 ORDER BY Organisation";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function select_all_organisations() {
	global $db;

	$sql = "SELECT DISTINCT Organisation FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function select_all_clinics_doctors($firstname, $lastname, $clinic) {
	global $db;

	$sql = "SELECT D.*, C.Name
	 FROM Doctor D, Clinic C
	 WHERE C.ClinicID = D.ClinicID
	 AND D.FirstName LIKE $firstname
	 AND D.LastName LIKE $lastname
	 AND C.Name LIKE $clinic";
	 $result = $db->query($sql);
	 $array = $result->fetchALL(PDO::FETCH_ASSOC);
	 return $array;
}

?>