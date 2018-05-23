<?php

	define("DB_SERVER", "localhost");
	define("DB_NAME", "med_reviews");
	define("DB_USER", "root"); // Need this line for the local site
	// define("DB_USER", "caitlin"); // Need this line for the hosted site
	// define("DB_PASS", "password"); // Need this line for the hosted site

	define("DB_DSN", "mysql:host=".DB_SERVER.";dbname=".DB_NAME);

?>
