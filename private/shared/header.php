<!doctype html>

<html lang="en">

<head>
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" href="<?php echo WWW_ROOT . '/stylesheets/home.css'; ?>" />
</head>

<body>
	<header>
		<h1><?php echo $page_title ?></h1>
	</header>

	<nav>
		<ul>
			<li><a href="<?php echo url_to('/index.php'); ?>">Home</a></li>
			<li><a href="<?php echo url_to('/all_residents/index.php'); ?>">Residents</a></li>
			<li><a href="<?php echo url_to('/all_facilities/index.php'); ?>">Facilities</a></li>
			<li><a href="<?php echo url_to('/all_doctors/index.php'); ?>">Doctors</a></li>
			<li><a href="<?php echo url_to('/due/index.php'); ?>">Drug Use Evaluations</a></li>
		</ul>
	</nav>
