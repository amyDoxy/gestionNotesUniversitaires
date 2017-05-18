<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$id_unique_etudiant =$_GET['id_unique_etudiant']; 
	$username = $_GET['username'];
 	$type = $_GET['type'];
	$departement= $_GET['departement'];
	$nom_departement= $_GET['nom_departement'];
	$table = "UDM_etudiant";

	if( $id_unique_etudiant && $username && $type && ($nom_departement || $departement))
	{
		
		try
		{

			$sqlVerif ="SELECT id_departement FROM UDM_departement WHERE `id_departement` = '".$departement."' AND `nom_departement` = '".$nom_departement."'";
			$depts = executeSql($conn, $sqlVerif);

			$countDept = count($depts);

			if($countDept == 1 ){
				$id_dept ='';
				foreach ($depts as $dept) {
					$id_dept = $dept['id_departement'];
				}
				
				
				$sqlUpdateEtud = "UPDATE $table SET  `type`= :type WHERE `id_etudiant` = ".$id_unique_etudiant	;
				$sqlUpdateUniv = "UPDATE UDM_universitaire
					SET  `departement` = ".$id_dept."
					WHERE `username` = :username";


				//Mise à jour de la table UDM_etudiant
				$resultUpdateEtud= $conn->prepare($sqlUpdateEtud);
				$resultUpdateEtud->bindParam(':type', $type);
				$resultUpdateEtud->execute();


				//Mise à jour de la table UDM_universitaire
				$resultUpdateUniv = $conn->prepare($sqlUpdateUniv);
				$resultUpdateUniv->bindParam(':username', $username);
				$resultUpdateUniv->execute();


				echo "Mise à jour dans la base de donnée avec succes de l'étudiant \"".$username."\"";
			}
			else{
				echo "Echec de mise à jour.Vérifier les entrées que vous avez faites";
			}
		} 
			
		
		catch(PDOException $e)
		{
			echo "\nEchec de mise à jour: ".$e->getMessage()."\nRéessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	