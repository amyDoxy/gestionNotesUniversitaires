<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_etudiant_desactiv = $_GET['id_etudiant_desactiv'];
	
	$table1 = "UDM_etudiant";
	$table2 = "UDM_universitaire";
	$table3 = "UDM_profileUtilisateur";

	if( $id_etudiant_desactiv)
	{
		
		try
		{
			$sqlUniv = "SELECT username FROM $table1 E, $table2 U WHERE E.universitaire = U.id_universitaire AND E.id_etudiant =" .$id_etudiant_desactiv;
			$univs = $conn->query($sqlUniv);
			$username_etud ="";
			foreach ($univs as $univ) {
				$username_etud = $univ['username'];
			}
			
			$sqlDesact = "UPDATE  $table3 SET `active` = '0' WHERE username = '".$username_etud."'";
			
			
			
			$resultDesact= $conn->prepare($sqlDesact);
			

			$resultDesact->execute();

				echo "Désactivation avec succes de l'étudiant ";
			
		

		}
		catch(PDOException $e)
		{
			echo "Echec de désactivation: ".$e->getMessage()."<br/>Réessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	