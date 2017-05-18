<?php
	//Recuperation des types d'evaluation dans la base de donnees
	require "../../../verification.php";
	require "../../../includes/functions.php";
	require "../../../includes/verificationSession.php";
	header("Content-Type:text/xml");
	$tablename = "UDM_type_evaluation";
	$result= $conn->query("SELECT * FROM $tablename");
	
	$listType = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$listType .= "<TYPES>";
	while($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
			foreach ($rows as $row) {
				$listType .= "<TYPE><CODE>".$row['type_code']."</CODE><NOM>".$row['nom_type']."</NOM></TYPE>";
			}
	}
	$listType .="</TYPES>";

	//envoie des donnees XML
	echo $listType; 


?>	