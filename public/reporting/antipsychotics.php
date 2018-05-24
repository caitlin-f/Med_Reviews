<?php require_once('../../private/init.php'); ?>

<?php $page_title = 'Drug Use Evaluation - Antipsychotic usage'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>

<div id="main">
	<?php
echo '<table class="list" style="border: ;">';
echo '<tr><th colspan="2">Resident</th><th colspan="2">Pharmacist</th><th colspan="2">Doctor</th><th>Referral Date</th><th>Review Date</th><th>Medication Class</th>';

cLass TableRows extends RecursiveIteratorIterator {
	function __construct($it){
		parent::__construct($it, self::LEAVES_ONLY);
	}

	function current(){
		return "<td style='width:150px:border:1px solid black';>" .parent::current()."</td>";   
	}

	function beginChildren() {
		echo "<tr>";
	}

	function endChildren() {
		echo "</tr>";
	}
}

try {
     $conn = db_connect();
	 $stmt = $conn-> prepare("SELECT Res.FirstName as ResFirst, Res.LastName as ResLast, P.FirstName as PFirst, P.LastName as PLast, D.FirstName as DFirst, D.LastName as DLast, Rev1.ReferralDate, Rev1.ReviewDate, Med.Class
	 	FROM Review Rev1, ResidentRx Rx, Medication Med, Resident Res, Pharmacist P, Doctor D
	 	WHERE Rev1.RevID = Rx.RevID 
	 	AND Res.ResidentID = Rev1.ResidentID
	 	AND P.PharmID = Rev1.PharmID
	 	AND D.DoctorID = Rev1.DoctorID
	 	AND Rx.MedID = Med.MedID 
	 	AND Med.Class = 'Antipsychotic' 
	 	AND Rev1.ReviewDate = (
	 		SELECT MAX(ReviewDate)
	 		FROM Review Rev2
	 		WHERE Rev1.ResidentID = Rev2.ResidentID);");
	$stmt ->execute();

	//set the resulting array to associative
	$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchALL())) as $k=>$v){
		echo $v;
		}
}
catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
	

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>