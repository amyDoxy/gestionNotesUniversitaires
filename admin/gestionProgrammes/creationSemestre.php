<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$faculte = $_GET['faculte'];
	$dept = $_GET['dept'];
	$identifiant_prog = $_GET['identifiant_prog'];
	$libelle_du_semestre = $_GET["libelle_du_semestre"];
   	$detail_semestre = $_GET["detail_semestre"];
   	$annee_semestre = $_GET["annee_semestre"];
	$table = "UDM_semestre";

	if( $faculte && $dept && $identifiant_prog && $libelle_du_semestre && $detail_semestre && $annee_semestre )
	{
		
		try
		{
			$sqlVerif = "SELECT libelle_semestre, annee FROM $table WHERE libelle_semestre =:libelle_du_semestre AND annee = :annee_semestre AND programme =:identifiant_prog";
			$resultVerif = $conn->prepare($sqlVerif);
			$resultVerif->bindParam(':libelle_du_semestre', $libelle_du_semestre);
			$resultVerif->bindParam(':annee_semestre', $annee_semestre);
			$resultVerif->bindParam(':identifiant_prog', $identifiant_prog);
			$resultVerif->execute();
			
			
			$semestres = $resultVerif->fetchAll(PDO::FETCH_ASSOC);
			$countSemestres = count( $semestres );

				if($countSemestres == 0){
			
			
					$sql = "SELECT DISTINCT id_programme FROM UDM_programme WHERE id_programme ='".$identifiant_prog."'";
					$listeProg = array();
					$listeProg = executeSql($conn, $sql);
					$count = count($listeProg);
					if( $count == 1){
						$id_prog = "";
						foreach($listeProg as $row){
							$id_prog = $row['id_programme'];
						}
						$sqlInsert = "INSERT INTO $table VALUES (null, :libelle_du_semestre, :detail_semestre, :annee_semestre, :id_prog) ";
						$resultInsert= $conn->prepare($sqlInsert);
						$resultInsert->bindParam(':libelle_du_semestre', $libelle_du_semestre);
						$resultInsert->bindParam(':detail_semestre', $detail_semestre);
						$resultInsert->bindParam(':annee_semestre', $annee_semestre);
						$resultInsert->bindParam(':id_prog', $id_prog);

						$resultInsert->execute();

						echo "Insertion dans la base de donnée avec succes du semestre \"".$libelle_du_semestre." ".$annee_semestre."\"";
					}else{ echo "Selectionnez un programme s'il vous plait!";}	
					
				}
				else{
					echo "Le semestre '".$libelle_du_semestre." ".$annee_semestre."' existe déjà dans le système.";
				}

			

		

		}
		catch(PDOException $e)
		{
			echo "Echec d'insertion.<br/>Réessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	