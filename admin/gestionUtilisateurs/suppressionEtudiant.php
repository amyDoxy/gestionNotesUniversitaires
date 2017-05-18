<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_etud = $_GET['id_etud'];
	$table = "UDM_etudiant";

	if($id_etud){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_etudiant = $id_etud LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_etudiant_desactiv' value= '".$id_etud."'> ".sqlSousTable(executeSql($conn, $sql));
			
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