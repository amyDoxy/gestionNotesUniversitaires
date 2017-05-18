<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	$id_semestre = $_GET['id_semestre'];
	$table = "UDM_semestre";

	if($id_semestre){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_semestre = $id_semestre LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_semestre_suppr' value= '".$id_semestre."'> ".sqlSousTable(executeSql($conn, $sql));
			
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