<?php require_once('../../../private/init.php'); ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '1'; // get ResidentID
$res_info = find_resident_info($id); // SQL query on Resident for ResidentID
?>

<?php $page_title = 'Resident'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='resident'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="resident">

		<a class="back-link" href="<?php echo url_to('/all_residents/index.php'); ?>">&laquo; Residents List</a>

		<secition id="resident_details">
			Resident ID = <?php echo h($res_info['ResidentID']); ?> </br>
			Resident Name = <?php echo h($res_info['FirstName'].' '.$res_info['LastName']) ;?> </br>
			Medicare = <?php echo h($res_info['Medicare']); ?> </br>
			DOB = <?php echo h($res_info['DOB']); ?> </br>
		</section>
	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>