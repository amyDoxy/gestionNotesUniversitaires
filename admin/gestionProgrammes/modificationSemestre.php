<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	
	$id_semestre = $_GET['id_semestre'];
	$table = "UDM_semestre";

	if($id_semestre){
		
		try{
			$sql = "SELECT libelle_semestre,detail_semestre, annee, programme  FROM $table WHERE id_semestre= $id_semestre";

			$resultat = "<input type = 'hidden' id='id_unique_semestre' value= '".$id_semestre."'> ".sqlSousInput(executeSql($conn, $sql));
			
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