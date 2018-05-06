<!doctype html>

<html lang="en">

<head>
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" href="<?php echo WWW_ROOT . '/stylesheets/home.css'; ?>" />

</head>

<body>

	<nav>
		<div class="grid-container">
			<div class="nav1">
			<img src="<?php echo WWW_ROOT. '/img/medirev.png'; ?>" style="height:60px;"></div>
			<div class="nav2">
			<a href="<?php echo url_to('/index.php'); ?>">HOME</a></div>
			<div class="nav3">
			<a href="<?php echo url_to('/all_residents/index.php'); ?>">RESIDENTS</a></div>
			<div class="nav4">
			<a href="<?php echo url_to('/all_facilities/index.php'); ?>">FACILITIES</a></div>
			<div class="nav5">
			<a href="<?php echo url_to('/all_doctors/index.php'); ?>">DOCTORS</a></div>
			<div class="nav6">
			<a href="<?php echo url_to('/due/index.php'); ?>">REPORTS</a></div>
		</div>
	</nav>

