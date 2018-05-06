<?php require_once('query_functions.php'); ?>

<?php

function url_to($script_path) {
	// add the leading '/' if not present
	if($script_path[0] != '/') {
		$script_path = "/" . $script_path;
	}
	return WWW_ROOT . $script_path;
}

// Prevent passing in of special characters by a user messing with the html format when echo'd back
function h($string) {
	return htmlspecialchars($string);
}

// change special characters in url string to their hexadecimal representation
function u($string="") {
	return urlencode($string);
}

function resident_options($all_residents) {
	$option_string = '';
	foreach($all_residents as $resident) {
		$option_string .='<option data-value= "'.$resident["ResidentID"].'">'.$resident["LastName"].' '.$resident["FirstName"].'</option>';
	}
	return $option_string;
}

function lastname_options($all_residents) {
	$option_string = '';
	foreach($all_residents as $resident) {
		$option_string .='<option data-value= "'.$resident["LastName"].'">'.$resident["LastName"].'</option>';
	}
	return $option_string;
}

function firstname_options($all_residents) {
	$option_string = '';
	foreach($all_residents as $resident) {
		$option_string .='<option data-value= "'.$resident["ResidentID"].'">'.$resident["FirstName"].'</option>';
	}
	return $option_string;
}

function organisation_options($all_facilities) {
	$option_string = '';
	foreach($all_facilities as $facility) {
		$option_string .='<option data-value "'.$facility["Organisation"]. '">'.$facility["Organisation"].'</option>';
	}
	return $option_string;
}

function clinic_options($all_clinics) {
	$option_string = '';
	foreach($all_clinics as $clinic) {
		$option_string .='<option data-value "'.$clinic["Name"]. '">'.$clinic["Name"].'</option>';
	}
	return $option_string;
}

?>

<script>

function get_datalist_value(resident_input, resident_name) {
	var shown_value = document.getElementById(resident_input).value;
	var return_value = document.querySelector("#" + resident_name + " option[value='" + shown_value + "']").dataset.value;
	alert(return_value);
	return return_value;
}



</script>
</script>