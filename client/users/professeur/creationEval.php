<?php
		require "../../connexionDB.php";

			
			//Noms des tables de la base de donnees que nous allons utiliser pour stocker les informations de la nouvelle evaluation créée
			$table = "UDM_evaluation";
			

			
			$id_module= $_POST['moduleEvaluation'];
			$libelle_eval = $_POST['libelleEval'];
			$coeff_eval = $_POST['coeffEval'];
			$cotation_eval = $_POST['cotationEval'];
			$date_eval = $_POST['dateEval'];
			$type_eval = $_POST['typeEval'];
			$participants = json_decode($_POST['etudiantParticipants']);

			if ($id_module && $libelle_eval && $cotation_eval && $type_eval && $date_eval && $participants){

				try {

					$sqlVerif="SELECT * FROM $table WHERE libelle_evaluation = '".$libelle_eval."'";
					$stmt = $conn->prepare($sqlVerif);
					$stmt->execute();

					$evals = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$countEval = count( $evals );

					if($countEval == 0){
						$sqlInsert = "INSERT INTO $table(id_evaluation,libelle_evaluation, coeff_evaluation, cotation_evaluation, date_evaluation, type_eval, module)
								VALUES 
								(null, :libelle_eval, :coeff_eval,:cotation_eval , :date_eval, :type_eval, :id_module)";
						$insertionEval = $conn->prepare($sqlInsert);
						$insertionEval->bindParam(':libelle_eval', $libelle_eval);
						$insertionEval->bindParam(':coeff_eval', $coeff_eval);
						$insertionEval->bindParam(':cotation_eval', $cotation_eval);
						$insertionEval->bindParam(':date_eval', $date_eval);
						$insertionEval->bindParam(':id_module', $id_module);
						$insertionEval->bindParam(':type_eval', $type_eval);

						
						$insertionEval->execute();


						//Requete pour avoir l'identifiant de l'evaluation qui vient d'etre créée
						$sqlGet = "SELECT id_evaluation FROM $table WHERE libelle_evaluation = '".$libelle_eval."'";
						$stmt = $conn->prepare($sqlGet);
						$stmt->execute();

						$evals = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$id_eval = "";
						foreach ($evals as $eval) {
							$id_eval = $eval['id_evaluation'];
						}
						

						foreach($participants as $participant){

							$sql = "SELECT E.id_etudiant FROM UDM_etudiant E, UDM_universitaire U WHERE U.id_universitaire = E.universitaire AND U.username = '".$participant."'";
							$stmt = $conn->prepare($sql);
							$stmt->execute();

							$etuds = $stmt->fetchAll(PDO::FETCH_ASSOC);
							$id_etud = "";
							foreach ($etuds as $etud) {
								$id_etud = $etud['id_etudiant'];
							}

							$sqlInsert2 = "INSERT INTO UDM_notes(id_evaluation, id_etudiant) VALUES ('".$id_eval."','".$id_etud."')";
							$stmt = $conn->prepare($sqlInsert2);
							$stmt->execute();
								
						}
						


						echo "L'évaluation a été ajoutée avec succès";
					}
					else{
						echo "Une évaluation avec le même nom existe dans le système.\nVeuillez changer le nom de l'évaluation";
					}
					

					
				} catch (PDOException $e) {
					echo "Erreur: ".$e->getMessage();
				}

				
				
			}
			else{
				echo("Entrée invalide.");
			}


	

	
?>


