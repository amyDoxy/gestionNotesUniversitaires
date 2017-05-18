<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	
	
	
	$nom_faculte = $_GET['nom_faculte'];
	$table = "UDM_faculte";

	if($nom_faculte){ 
		//Verification d'abord si le nom envoyé n'existe pas dans la base de données
		try{
			$sqlVerif = "SELECT nom_de_faculte FROM $table WHERE nom_de_faculte =:nom_faculte ";
			$resultVerif = $conn->prepare($sqlVerif);
			$resultVerif->bindParam(':nom_faculte', $nom_faculte);
			if($resultVerif->execute()){
			
				$facultes = $resultVerif->fetchAll(PDO::FETCH_ASSOC);
				$count = count( $facultes );

				if($count == 0){
					//Si le nom n'existe pas dans la base de données, on l'insere
					$sqlInsert = "INSERT INTO $table VALUES (null, :nom_faculte) ";
					$resultInsert= $conn->prepare($sqlInsert);
					$resultInsert->bindParam(':nom_faculte', $nom_faculte);

					if($resultInsert->execute() ) {
						echo "Insertion dans la base de donnée avec succes de la faculté ".$nom_faculte;
					}
					else
					{
						echo "Echec d'insertion.<br/>Réessayer";
					}
				}
				else{
					echo "La faculté que vous avez inserée existe déjà dans le systeme!";
				}
				
				
			}

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