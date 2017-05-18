<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	
	$id_prog = $_GET['id_prog'];
	$table = "UDM_programme";

	if($id_prog){
		
		try{
			$sql = "SELECT intitule_programme,cursus, titre  FROM $table WHERE id_programme = $id_prog";

			$resultat = "<input type = 'hidden' id='id_unique_prog' value= '".$id_prog."'> ".sqlSousInput(executeSql($conn, $sql));
			
			echo $resultat;

		}
		catch(PDOException $e)
		{
			echo "Erreur: ".$e->getMessage();
		}
		
		
		
	}
	else{
		echo "Nom invalide";
	}
		
	

?>	