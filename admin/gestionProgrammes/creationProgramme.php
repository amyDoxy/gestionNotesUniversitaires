<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$faculte = $_GET['faculte'];
	$dept = $_GET['dept'];
	$intitule_prog = $_GET['intitule_prog'];
	$cursus = $_GET['cursus'];
	$titre_prog = $_GET['titre_prog'];
	$table = "UDM_programme";

	if( $faculte && $dept && $intitule_prog && $cursus && $titre_prog )
	{
		
		try
		{
			$sqlVerif = "SELECT intitule_programme, titre FROM $table WHERE intitule_programme =:intitule_prog AND titre = :titre_prog ";
			$resultVerif = $conn->prepare($sqlVerif);
			$resultVerif->bindParam(':intitule_prog', $intitule_prog);
			$resultVerif->bindParam(':titre_prog', $titre_prog);
			$resultVerif->execute();
			
			
			$programmes = $resultVerif->fetchAll(PDO::FETCH_ASSOC);
			$countProgramme = count( $programmes );

				if($countProgramme == 0){
			
			
					$sql = "SELECT DISTINCT id_departement FROM UDM_departement WHERE nom_departement ='".$dept."'";
					$listeDept = array();
					$listeDept = executeSql($conn, $sql);
					$count = count($listeDept);
					if( $count == 1){
						$id_departement = "";
						foreach($listeDept as $row){
							$id_departement = $row['id_departement'];
						}
						$sqlInsert = "INSERT INTO $table VALUES (null, :intitule_prog, :cursus, :titre_prog, :id_departement) ";
						$resultInsert= $conn->prepare($sqlInsert);
						$resultInsert->bindParam(':intitule_prog', $intitule_prog);
						$resultInsert->bindParam(':cursus', $cursus);
						$resultInsert->bindParam(':titre_prog', $titre_prog);
						$resultInsert->bindParam(':id_departement', $id_departement);

						$resultInsert->execute();

						echo "Insertion dans la base de donnée avec succes du programme \"".$titre_prog." ".$intitule_prog."\"";
					}else{ echo "Selectionnez un département s'il vous plait!";}	
					
				}
				else{
					echo "Le programme '".$titre_prog." ".$intitule_prog."' existe déjà dans le système.";
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