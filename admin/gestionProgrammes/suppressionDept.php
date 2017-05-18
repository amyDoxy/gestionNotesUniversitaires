<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_dept = $_GET['id_dept'];
	$table = "UDM_departement";

	if($id_dept){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_departement = $id_dept LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_dept_suppr' value= '".$id_dept."'> ".sqlSousTable(executeSql($conn, $sql));
			
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