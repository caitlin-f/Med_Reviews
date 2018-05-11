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

function disease_string($diagnoses) {
	$disease_string = '';
	$n = 1; 
	foreach($diagnoses as $diagnosis) {
		if ($n == sizeof($diagnoses)) { // if last item in array append </tr> to very end of string
			if ($n == 1) { // first and final item in row
				$disease_string .= '<tr><td>'.$diagnosis['Disease'].',</td></tr>';
			} else { // final item in row
				$disease_string.='<td>'.$diagnosis['Disease'].'</tr>';
			}
		} else {
			if ($n == 1) { // if item in row, open <tr> flag
				$disease_string .= '<tr><td>'.$diagnosis['Disease'].',</td>';
				$n += 1;
			} elseif ($n == 8) { // if last item in row, close <tr> flag
				$disease_string.='<td>'.$diagnosis['Disease'].'</td></tr>';
				$n = 1;
			} else { // any other item in row
				$disease_string.='<td>'.$diagnosis['Disease'].',</td>';
				$n += 1;
			}
		}
	}
	return $disease_string;
}

function medication_string($medications) {
	$medication_string = '';
	foreach($medications as $medication) {
		$medication_string .= '<tr><td>'.$medication['GenericName'].'<td>';
		$medication_string .= '<td>'.$medication['Form'].'</td>';
		$medication_string .= '<td>'.$medication['Strength'].'</td>';
		$medication_string .= '<td>'.$medication['Dose'].'</td>';
		$medication_string .= '<td>'.$medication['Frequency'].'</td></tr>';
	}
	return $medication_string;
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