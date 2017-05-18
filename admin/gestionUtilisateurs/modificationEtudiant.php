<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	
	$id_etud = $_GET['id_etud'];
	
	$table1 = "UDM_etudiant";
	$table2 = "UDM_universitaire";
	$table3 = "UDM_departement";

	

	if($id_etud){
		
		try{
			$sql = "SELECT  U.username, E.type,U.departement, D.nom_departement FROM $table1 E, $table2 U,$table3 D WHERE E.universitaire = U.id_universitaire AND U.departement = D.id_departement AND E.id_etudiant = $id_etud";

			$resultat = "<input type = 'hidden' id='id_unique_etudiant' value= '".$id_etud."'> ".sqlSousInput(executeSql($conn, $sql));
			
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