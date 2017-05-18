<?php
	require_once "requiredFiles.php";
		
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$moduleSelected = $_GET['moduleSelected'];

	if ($moduleSelected) {
		
		try {

			$sql = "SELECT DISTINCT M.*, (SUM(notation_cours)+SUM(notation_tp)+SUM(notation_td)+SUM(notation_ds)) AS total_module
			FROM  UDM_module M
			WHERE  M.id_module= '".$moduleSelected."'";
			$sqlTotal = "SELECT type_eval,SUM(coeff_evaluation) as coeff_eval, SUM(cotation_evaluation) as cotation FROM UDM_evaluation WHERE module = '".$moduleSelected."' GROUP BY type_eval";

			$result= $conn ->query($sql);
			$resultat = $result->setFetchMode(PDO::FETCH_ASSOC);
			$resultatTotal = $conn->query($sqlTotal);
			$total_ds = "";
			$total_td = "";
			$total_tp = "";
			$coeff_ds = "";
			$coeff_td = "";
			$coeff_tp = "";

			while ( $resultsTotal = $resultatTotal->fetchAll(PDO::FETCH_ASSOC) ) {
				foreach($resultsTotal as $resultTotal){
				
					if(strtolower($resultTotal['type_eval']) == 'ds'){
						$coeff_ds = $resultTotal['coeff_eval'];
						$total_ds = $resultTotal['cotation'];

					}else if(strtolower($resultTotal['type_eval']) == 'tp'){
						$coeff_tp = $resultTotal['coeff_eval'];
						$total_tp = $resultTotal['cotation'];
					}else if(strtolower($resultTotal['type_eval']) == 'td'){
						$coeff_td = $resultTotal['coeff_eval'];
						$total_td = $resultTotal['cotation'];
					}
				}
			}
			$json_response = array(); 

			
			
			while($rows = $result->fetchAll()) {
				//print_r($rows);
				
					foreach ($rows as $row) {
						$listeEvaluations = array();
						
						$listeEvaluations["id_module"] = $row["id_module"];
						$listeEvaluations["libelle_module" ] = $row["libelle_module"];
						$listeEvaluations["notation_cours"] = $row["notation_cours"];
						$listeEvaluations["notation_tp"] = $row["notation_tp"];
						$listeEvaluations["notation_td"] = $row["notation_td"];
						$listeEvaluations["notation_ds"] = $row["notation_ds"];
						$listeEvaluations["credit_module"] = $row["credit_module"];
						$listeEvaluations[ "nb_heure"] = $row["nb_heure"];
						$listeEvaluations[ "total_module"] = $row["total_module"];
						$listeEvaluations['coeff_tp'] = $coeff_tp;
						$listeEvaluations['coeff_td'] = $coeff_td;
						$listeEvaluations['coeff_ds'] = $coeff_ds;
						$listeEvaluations['total_tp'] = $total_tp;
						$listeEvaluations['total_td'] = $total_td;
						$listeEvaluations['total_ds'] = $total_ds;

						$listeEvaluations[ "evaluations"] = array();
						$id_module = $row['id_module'];

						$sqlEval = "SELECT * FROM UDM_evaluation WHERE module =".$id_module." ORDER BY type_eval";
						
						$resultEval= $conn ->query($sqlEval);
						while ($evals = $resultEval->fetchAll() ) {
							foreach ($evals as $eval) {
								$listeEvaluations['evaluations'][] = array( 'id_evaluation' => $eval['id_evaluation'], 'libelle_evaluation' => $eval["libelle_evaluation"],'coeff_evaluation' => $eval["coeff_evaluation"],"cotation_evaluation" => $eval["cotation_evaluation"], "date_evaluation" => $eval["date_evaluation"], "type_eval" => $eval["type_eval"],
									);
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