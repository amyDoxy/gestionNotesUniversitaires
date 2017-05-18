<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	$id_prog = $_GET['id_prog'];
	$table = "UDM_programme";

	if($id_prog){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_programme = $id_prog LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_prog_suppr' value= '".$id_prog."'> ".sqlSousTable(executeSql($conn, $sql));
			
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