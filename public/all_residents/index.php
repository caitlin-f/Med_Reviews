<?php require_once('../../private/init.php'); ?>

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

<?php $page_title = 'Residents'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
	<article id="resident">
		<section id="resident_list">
			<table class="list">
				<tr>
					<th>ResidentID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Medicare</th>
					<th>DOB</th>
					<th>&nbsp;</th>
	  	    		<th>&nbsp;</th>
				</tr>
				<?php foreach($all_residents as $resident) { ?>
					<tr>
						<td><?php echo h($resident['ResidentID']); ?></td>
						<td><?php echo h($resident['FirstName']); ?></td>
						<td><?php echo h($resident['LastName']); ?></td>
						<td><?php echo h($resident['Medicare']); ?></td>
						<td><?php echo h($resident['DOB']); ?></td>
						<td><a class="action" href="<?php echo url_to('/all_residents/resident/index.php?id='.h(u($resident['ResidentID'])));?>">Edit</a></td>
						<td><a class="action" href="">Print</a></td>
					</tr>
				<?php } ?>
			</table>
		</section>
	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>


