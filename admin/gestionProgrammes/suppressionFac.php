<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	$id_fac = $_GET['id_fac'];
	$table = "UDM_faculte";

	if($id_fac){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_faculte = $id_fac LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_fac_suppr' value= '".$id_fac."'> ".sqlSousTable(executeSql($conn, $sql));
			
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