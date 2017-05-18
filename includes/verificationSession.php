<?php
	if (!isset($_SESSION['UserData'])) {
    	exit(header("location:main.php"));
	}
?>