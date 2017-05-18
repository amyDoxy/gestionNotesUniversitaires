<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	
	$id_dept = $_GET['id_dept'];
	$table = "UDM_departement";

	if($id_dept){
		
		try{
			$sql = "SELECT nom_departement, faculte_du_dept  FROM $table WHERE id_departement = $id_dept";

			$resultat = "<input type = 'hidden' id='id_unique_dept' value= '".$id_dept."'> ".sqlSousInput(executeSql($conn, $sql));
			
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