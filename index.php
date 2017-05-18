<?php
require "connexionDB.php";
require "./includes/functions.php";
require "./includes/verificationSession.php";

$data = get_user_data($conn, $_SESSION['UserData']['username']);
//print_r($data);
$statut ="";
foreach ($data as $row) {
	$statut = $row['statut'];
}
switch ($statut) {
	case '1':
		exit(header("Location: /client/users/etudiant/index.php"));
		
		break;
	case '2':
		exit(header("Location: /client/users/professeur/index.php") );
		
		break;
	case '3':
		exit(header("Location: /client/users/chef_departement/index.php") );
		
		break;		
	case '4':
		exit ( header("Location: /client/users/secretaire/index.php"));
		
		break; 
	case '5':
		exit ( header("Location: /admin/index.php"));
		
		break;

	default:
		exit(header("location:./main.php"));
		break;
}
?>