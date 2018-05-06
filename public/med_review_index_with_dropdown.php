<?php require_once('../private/init.php'); ?>


<?php
	$all_residents = select_all_residents();
	// $all_residents = [
	// ['ResidentID' => '1', 'FirstName' => 'Mavis', 'LastName' => 'Brown', 'Medicare' => '40011111111', 'DOB' => '01/01/1910'],
	// ['ResidentID' => '2', 'FirstName' => 'John', 'LastName' => 'Smith', 'Medicare' => '40022222222', 'DOB' => '02/02/1920'],
	// ['ResidentID' => '3', 'FirstName' => 'Jack', 'LastName' => 'Masters', 'Medicare' => '40033333333', 'DOB' => '03/03/1930'],
	// ['ResidentID' => '4', 'FirstName' => 'Lyla', 'LastName' => 'Sands', 'Medicare' => '40044444444', 'DOB' => '04/04/1915'],
	// ['ResidentID' => '5', 'FirstName' => 'Beth', 'LastName' => 'Royal', 'Medicare' => '40055555555', 'DOB' => '05/05/1925'],
	// ['ResidentID' => '6', 'FirstName' => 'Mavis', 'LastName' => 'Brown', 'Medicare' => '40011111111', 'DOB' => '01/01/1910'],
	// ];

?>

<?php $page_title = 'Medication Management Reviews'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
	
	<div id="Main Menu">
		<a href="<?php echo url_to('/resident/index.php'); ?>">New Resident</a><br />
			
		<div id="search">
			
			<form id="resident_search">
				<input list="test" id="option" placeholder="Search Residents">
				<?php $option_string = resident_options($all_residents); ?>
				<datalist id="test"></datalist>
				
				<script language="javascript">
					var option_list=document.getElementById("test");
					option_list.innerHTML = '<?php echo $option_string;?>';
				</script>
				<input type="hidden" name="ResidentID" id="option-hidden">
				<input type="submit" formaction="<?php echo url_to('/all_residents/resident/index.php'); ?>">
			</form>

			<p>Submitted value (for debugging):</p>
			<pre id="result"></pre>

			<script>
			document.querySelector('input[list]').addEventListener('input', function(e) {
    			var input = e.target,
        		list = input.getAttribute('list'),
        		options = document.querySelectorAll('#' + list + ' option'),
        		hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'), label = input.value;

    			hiddenInput.value = label;

    			for(var i = 0; i < options.length; i++) {
        			var option = options[i];

        			if(option.innerText === label) {
            			hiddenInput.value = option.getAttribute('data-value');
            			break;
        			}
    			}
			});

			// // For debugging purposes
			// document.getElementById("myForm").addEventListener('submit', function(e) {
   //  		var value = document.getElementById('answer-hidden').value;
   //  		document.getElementById('result').innerHTML = value;
   //  		e.preventDefault();
			// });
			</script>
			<br />
			
			<form autocomplete="off" action="<?php echo url_to('facility/index.php'); ?>" method="post">
				<input id="facility_search" type="test" name="facility_name" placeholder="Search Facilities">
				<a href="<?php echo url_to('/facility/index.php'); ?>">Select Facility</a><br />
			</form><br />

			<form autocomplete="off" action="<?php echo url_to('doctor/index.php'); ?>" method="post">
				<input id="doctor_search" type="test" name="doctor_name" placeholder="Search Doctors">
				<a href="<?php echo url_to('/doctor/index.php'); ?>">Select Doctor</a><br />
			</form><br />

		</div>
	</div>
	<div id="DUEs">
		<a href="<?php echo url_to('/due/index.php'); ?>">Drug Use Evaluations</a>
	</div>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>