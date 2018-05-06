<?php require_once('../private/init.php'); ?>
<?php 
$resident_data = resident_names_facilities();
$wd = "'%'";
$facility_data = select_all_facilities($wd, $wd);
$organisation_data = select_all_organisations();
$clinic_data = select_all_clinics_doctors($wd, $wd, $wd);
?>

<?php $page_title = 'Medication Management Reviews'; ?>

<?php include(SHARED_PATH . '/landing.php'); ?>


<div>
	<img src="<?php echo WWW_ROOT. '/img/meds.jpg'; ?>" 
	style="
	position: absolute; 
	min-width: 1024px; 
	width: 100%; 
	height: auto;
	z-index: -1;">
</div>

<div id="content" class="grid-content">
	<div class="left1"></div>
	
	<div class="left2">
		RESIDENTS<br><br>
		<form method="post" class="front_page" id="resident_search" autocomplete="off" action="<?php echo url_to('/all_residents/index.php'); ?>">

			<input class="front_input" list="last_names" id="last_name" name="lastname" placeholder="Last Name" onblur="update_firstnames(this.value);" autocomplete="off">
					<?php $lastname_string = lastname_options($resident_data); ?>
					<datalist id="last_names"></datalist>
					<script language="javascript">
						var lastname_list=document.getElementById("last_names");
						lastname_list.innerHTML = '<?php echo $lastname_string;?>';
					</script>

	
			<input class="front_input" list="first_names" id="first_name" name="firstname" placeholder="First Name" type="text" onblur="update_facilities(this.value, last_name.value);" autocomplete="off">
					<datalist id="first_names"><option></option></datalist>
					<script language="javascript">
						function update_firstnames(value) {
							var firstname_list = document.getElementById("first_names")
							var residents = <?php echo json_encode($resident_data);?>;
							console.log(value) // error checking
							var firstname_options = ""
							for (idx in residents) {
								if (residents[idx].LastName == value)
									firstname_options += "<option>" + residents[idx].FirstName + "</option>"
							}
							console.log(firstname_options) // error checking
							firstname_list.innerHTML = firstname_options
						}
					</script>

			<input class="front_input" list="facilities" id="facility" name="facility" placeholder="All Facilities" autocomplete="off">
					<datalist id="facilities"><option></option></datalist>
					<script language="javascript">
						function update_facilities(firstname, lastname) {
							var facility_list = document.getElementById("facilities")
							var residents = <?php echo json_encode($resident_data);?>;
							console.log(firstname, lastname) // error checking
							var facility_options = ""
							for (idx in residents) {
								if (residents[idx].FirstName == firstname && residents[idx].LastName == lastname)
									facility_options += "<option>" + residents[idx].Name + "</option>"
							}
							console.log(facility_options)
							facility_list.innerHTML = facility_options
						}
					</script>
			<input class="submit" type="submit" value="Search">
		</form>
		</form>
		<form method="post" class="front_page" id="new_resident" action="">
			<input class="centre" type="submit" value="Enter New Resident">
		</form>

	</div>
	
	<div class="middle1" id="facilities">
		FACILITIES<br><br>
		<form method="post" class="front_page" id="facility_search" autocomplete="off" action="<?php echo url_to('/all_facilities/index.php'); ?>">

			<input class="front_input" list="organisations" id="organisation" name="organisation" placeholder="Organisation" onblur="" autocomplete="off">
				<?php $organisation_string = organisation_options($organisation_data); ?>
				<datalist id="organisations"></datalist>
				<script language="javascript">
					var organisation_list=document.getElementById("organisations");
					organisation_list.innerHTML = '<?php echo $organisation_string;?>';
				</script>

			<input class="front_input" list="facility_names" id="facility_name" name="facility_name" placeholder="All Facilities" type="text" onblur="" autocomplete="off" onfocus="update_facility_names(organisation.value)">
					<datalist id="facility_names"><option></option></datalist>
					<script language="javascript">
						function update_facility_names(value) {
							console.log(value) // error checking
							var facility_list = document.getElementById("facility_names")
							var facilities = <?php echo json_encode($facility_data);?>;
							var facility_name_options = ""
							if (value.length == 0) 
								for (idx in facilities) {
									facility_name_options += "<option>" + facilities[idx].Name + "</option>"
								}
							else {
								for (idx in facilities) {
									if (facilities[idx].Organisation == value)
										facility_name_options += "<option>" + facilities[idx].Name + "</option>"
								}
							}
							console.log(facility_name_options) // error checking
							facility_list.innerHTML = facility_name_options
						}
					</script>
			<input class="submit" type="submit" value="Search">
		</form>

	</div>
	
	<div class="middle2">
		DOCTORS<br><br>
		<form method="post" class="front_page" id="doctor_search" autocomplete="off" action="<?php echo url_to('/all_doctors/index.php'); ?>">

			<input class="front_input" list="clinics" id="clinic" name="clinic" placeholder="All Clinics" onblur="" autocomplete="off">
				<?php $clinic_string = clinic_options($clinic_data); ?>
				<datalist id="clinics"></datalist>
				<script language="javascript">
					var clinic_list=document.getElementById("clinics");
					clinic_list.innerHTML = '<?php echo $clinic_string;?>';
				</script>

			<input class="front_input" list="doctors" id="doctor" name="doctor" placeholder="Doctors Name" type="text" onblur="" autocomplete="off" onfocus="update_doctor_names(clinic.value)">
					<datalist id="doctors"><option></option></datalist>
					<script language="javascript">
						function update_doctor_names(value) {
							console.log(value) // error checking
							var doctor_list = document.getElementById("doctors")
							var doctors = <?php echo json_encode($clinic_data);?>;
							var doctor_options = ""
							if (value.length == 0) 
								for (idx in doctors) {
									doctor_options += "<option>" + doctors[idx].FirstName + " " + doctors[idx].LastName + "</option>"
								}
							else {
								for (idx in doctors) {
									if (doctors[idx].Name == value)
										doctor_options += "<option>" + doctors[idx].FirstName + " " + doctors[idx].LastName + "</option>"
								}
							}
							console.log(doctor_options) // error checking
							doctor_list.innerHTML = doctor_options
						}
					</script>
			<input class="submit" type="submit" value="Search">
		</form>
	</div>
	
	<div class="right1">
		REPORTS <br><br><br>

		<form method="post" class="front_page" id="reports" autocomplete="off" action="<?php echo url_to('/due/index.php'); ?>">
			<input class="centre" type="submit" value="Drug Use Evaluations">
			<input class="centre" type="submit" value="Pharmacist Reports">
			<input class="centre" type="submit" value="Doctor Reports">
		</form>



	</div>
	
	<div class="right2"></div>

	
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>