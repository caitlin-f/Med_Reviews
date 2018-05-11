<?php

function get_all_residents($lastname, $firstname, $facility) {
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

function get_resident_info($id) {
	global $db;

	$sql = "SELECT R.*, F.Organisation, F.Name, H.AdminDate 
	 FROM Resident R, ResidentHome H, Facility F
	 WHERE R.ResidentID = $id
	  AND H.ResidentID = R.ResidentID
	  AND H.RACID = F.RACID
	  AND H.AdminDate =
		(SELECT Max(H2.AdminDate)
		 FROM ResidentHome H2
		 WHERE H2.ResidentID = R.ResidentID)";
	$result = $db->query($sql);
	$array = $result->fetch(PDO::FETCH_ASSOC);
	return $array;
}

function get_all_facilities($organisation, $name) {
	global $db;

	$sql = "SELECT * FROM Facility
	 WHERE Organisation LIKE $organisation AND Name LIKE $name
	 ORDER BY Organisation";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function get_all_organisations() {
	global $db;

	$sql = "SELECT DISTINCT Organisation FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

function get_all_clinics_doctors($firstname, $lastname, $clinic) {
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

function resident_Dx($id) {
	global $db;

	$sql = "SELECT Disease From ResidentDx
	 WHERE ResidentID = $id";
	return ($db->query($sql))->fetchALL(PDO::FETCH_ASSOC);
}

function latest_resident_Rx($id) {
	global $db;

	$sql = "SELECT Med.GenericName, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form, Med.Strength, Rx.Dose, Rx.Frequency
		FROM Review Rev1, ResidentRx Rx, Resident Res, Medication Med
		 LEFT JOIN Oral O ON O.MedID = Med.MedID
		 LEFT JOIN Topical T ON T.MedID = Med.MedID
		 LEFT JOIN Injectable I ON I.MedID = Med.MedID
		WHERE Res.ResidentID = $id
		 AND Rev1.RevID = Rx.RevID
		 AND Res.ResidentID = Rev1.ResidentID
		 AND Rx.MedID = Med.MedID 
		 AND Rev1.ReviewDate = (
			SELECT MAX(Rev2.ReviewDate)
			FROM Review Rev2
			WHERE Rev1.ResidentID = Rev2.ResidentID)";

	return ($db->query($sql))->fetchALL(PDO::FETCH_ASSOC);
}

function resident_Rx($rev) {
	global $db;

	$sql = "SELECT Med.GenericName, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form, Med.Strength, Rx.Dose, Rx.Frequency
	FROM Review Rev1, ResidentRx Rx, Medication Med
	 LEFT JOIN Oral O ON O.MedID = Med.MedID
	 LEFT JOIN Topical T ON T.MedID = Med.MedID
	 LEFT JOIN Injectable I ON I.MedID = Med.MedID
	WHERE Rev1.RevID = $rev
	 AND Rev1.RevID = Rx.RevID
	 AND Rx.MedID = Med.MedID";

	 return ($db->query($sql))->fetchALL(PDO::FETCH_ASSOC);
}

function all_resident_reviews($id) {
	global $db;

	$sql = "SELECT D.FirstName AS D_First, D.LastName AS D_Last, 
		 R.ReferralDate, R.ReviewDate, R.RevID, Res.ResidentID,
		 P.FirstName AS P_First, P.LastName AS P_Last
	 	FROM Doctor D, Pharmacist P, Review R, Resident Res
	 	WHERE Res.ResidentID = $id
	  	 AND Res.ResidentID = R.ResidentID
	  	 AND D.DoctorID = R.DoctorID
	  	 AND P.PharmID = R.PharmID
	  	ORDER BY R.ReferralDate DESC";

	return ($db->query($sql))->fetchALL(PDO::FETCH_ASSOC);
}

function get_recommendations($rev) {
	global $db;

	$sql = "SELECT Title, Information, Options
		FROM Recommendation
		WHERE RevID = $rev";

	return ($db->query($sql))->fetchALL(PDO::FETCH_ASSOC);
}

?>