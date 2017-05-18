<?php
	require_once "requiredFiles.php";
	
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$moduleSelected = $_GET['moduleSelected'];

	if ($moduleSelected) {
		
		try {

			$sql = "SELECT DISTINCT M.notation_cours, M.notation_tp, M.notation_td, M.notation_ds, M.credit_module, E.*
			FROM UDM_module M, UDM_evaluation E 
			WHERE M.id_module = E.module
			
			AND M.id_module = '".$moduleSelected."'
			AND E.type_eval = 'td'

            AND M.dispensateur in (SELECT id_professeur 
										FROM UDM_professeur 
										WHERE universitaire in (SELECT id_universitaire FROM UDM_universitaire WHERE username = '".$username."')) ";


			$result= $conn ->query($sql);
			$json_response = array();
			
			
			while($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
					foreach ($rows as $row) {
						$listeEvaluations = array();
						
						$listeEvaluations["notation_cours"] = $row["notation_cours"];
						$listeEvaluations["notation_tp"] = $row["notation_tp"];
						$listeEvaluations["notation_td"] = $row["notation_td"]; 
						$listeEvaluations["notation_ds"] = $row["notation_ds"];
						$listeEvaluations["credit_module"] = $row["credit_module"];
						$listeEvaluations["id_evaluation"]= $row["id_evaluation"];
						$listeEvaluations["libelle_evaluation"] = $row["libelle_evaluation"];
						$listeEvaluations["coeff_evaluation"] = $row["coeff_evaluation"];
						$listeEvaluations["cotation_evaluation"] = $row["cotation_evaluation"];
						$listeEvaluations["date_evaluation"] = $row["date_evaluation"];
						$listeEvaluations["type_eval"] = $row["type_eval"];
						$listeEvaluations["participants"] = array();
						$id_evaluation = $row["id_evaluation"];
						
						$sqlEt = "SELECT N.id_etudiant, U.username 
								FROM UDM_universitaire U,UDM_etudiant ET, UDM_evaluation E, UDM_notes N 
								WHERE N.id_evaluation = E.id_evaluation 
								AND ET.id_etudiant = N.id_etudiant 
								AND U.id_universitaire = ET.universitaire
								AND  E.id_evaluation = ".$id_evaluation;

						$resultat = $conn->query($sqlEt);
						while ($etudiants = $resultat->fetchAll(PDO::FETCH_ASSOC) ){
							foreach ($etudiants as $etud) {
								$listeEvaluations["participants"][] = array("id_etudiant" => $etud['id_etudiant'], "username_etudiant"=> $etud['username'],);
							}
						}
						array_push($json_response, $listeEvaluations);
					}
			}
			



			//envoie des donnees sous Jason
			echo json_encode($json_response);			
		} catch (PDOException $e) {
			echo "Erreur : ".$e->getMessage();
		}
	}
	else{
		echo "Entrée invalide";
	}

	 


?>	