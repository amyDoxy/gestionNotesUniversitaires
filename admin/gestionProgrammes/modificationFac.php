<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	
	$id_faculte = $_GET['id_faculte'];
	$table = "UDM_faculte";

	if($id_faculte){
		
		try{
			$sql = "SELECT nom_de_faculte  FROM $table WHERE id_faculte = $id_faculte";

			$resultat = "<input type = 'hidden' id='id_unique_fac' value= '".$id_faculte."'> ".sqlSousInput(executeSql($conn, $sql));
			
			echo $resultat;

		}
		catch(PDOException $e)
		{
			echo "Erreur: ".$e->getMessage();
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	