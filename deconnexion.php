<?php session_start(); 
session_destroy(); /* Destruction de la session */
header("location:main.php");
exit;
?>
