<?php require_once('../../private/init.php'); ?>
<?php
$get = explode(",", isset($_GET['id']) ? $_GET['id'] : "1,1");
$id = $get[0];
$rev = $get[1];

$res_info = get_resident_info($id);
$diagnoses = resident_Dx($id);
$medications = resident_Rx($rev);
$recommendations = get_recommendations($rev);

echo $rev;
echo $id;
echo json_encode($recommendations);


?>

<?php $page_title = 'Residential Medication Management Review'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<header class='review'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="resident">

		<a class="back-link" href="<?php echo url_to('/all_residents/resident/view.php?id='.h(u($id)));?>">&laquo; Resident Details</a>

		<section id="resident_details">
			<p>Resident Details:</p>
			<table>
			<tr>
				<td>Name:</td>
				<td><?php echo h($res_info['FirstName']); ?></td>
				<td><?php echo h($res_info['LastName']); ?></td>
				<td>DOB:</td>
				<td><?php echo h($res_info['DOB']); ?></td>
				<td>Medicare:</td>
				<td><?php echo h($res_info['Medicare']); ?></td>
			</tr>
			<tr>
				<td>Facility:</td>
				<td colspan="2"><?php echo h($res_info['Name']); ?></td>
				<td>Organisation:</td>
				<td><?php echo h($res_info['Organisation']); ?></td>
				<td>Admission Date:</td>
				<td><?php echo h($res_info['AdminDate']); ?></td>
			</tr>
		</table>
		</section>

		<section id="diagnosis">
			<p>Diagnoses:</p>
			<table>
				<?php echo disease_string($diagnoses); ?>
			</table>
		</section>

		<section id="medications">
			<p>Current medications:</p>
			<table>
				<?php echo medication_string($medications); ?>
			</table>
		</section>

		<section id="reviews">
			<p>Recommendations:</p>
			<table>
				<tr>
					<th>Title</th>
					<th>Information</th>
					<th>Options</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($recommendations as $rec) { ?>
					<tr>
						<td><?php echo h($rec['Title']); ?></td>
						<td><?php echo h($rec['Information']); ?></td>
						<td><?php echo h($rec['Options']); ?></td>
						<td><a class="action" href="">Edit</a></td>
					</tr>
				<?php } ?>

			</table>
		</section>

	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>