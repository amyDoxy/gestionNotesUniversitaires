<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$nom_faculte = $_GET['nom_faculte'];
	$nom_dept = $_GET['nom_dept'];
	$table = "UDM_departement";

	if( $nom_dept && $nom_faculte)
	{
		
		try
		{
			$sqlVerif = "SELECT nom_departement FROM $table WHERE nom_departement =:nom_dept";
			$resultVerif = $conn->prepare($sqlVerif);
			$resultVerif->bindParam(':nom_dept', $nom_dept);
			$resultVerif->execute();
			
			
			$departements = $resultVerif->fetchAll(PDO::FETCH_ASSOC);
			$countDept = count( $departements );

				if($countDept == 0){
			
			
					$sql = "SELECT DISTINCT id_faculte FROM UDM_faculte WHERE nom_de_faculte ='".$nom_faculte."'";
					$listeFac = array();
					$listeFac = executeSql($conn, $sql);
					$count = count($listeFac);
					if( $count == 1){
						$id_faculte = "";
						foreach($listeFac as $row){
							$id_faculte = $row['id_faculte'];
						}
						$sqlInsert = "INSERT INTO $table VALUES (null, :nom_dept, :id_faculte) ";
						$resultInsert= $conn->prepare($sqlInsert);
						$resultInsert->bindParam(':nom_dept', $nom_dept);
						$resultInsert->bindParam(':id_faculte', $id_faculte);

						$resultInsert->execute();

						echo "Insertion dans la base de donnée avec succes du département \"".$nom_dept."\"";
					}else{ echo " Selectionnez une faculté s'il vous plait!";}	
					
				}
				else{
					echo "Le département '".$nom_dept."' existe déjà dans le système.";
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