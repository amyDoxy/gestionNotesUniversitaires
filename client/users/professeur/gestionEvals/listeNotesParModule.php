<?php
	require_once "requiredFiles.php";
	
	
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$moduleSelected = $_GET['moduleSelected'];
	

	if ($moduleSelected) {
		
		try {

			$sql = "SELECT DISTINCT N.id_etudiant,IU.nom_utilisateur, IU.prenom_utilisateur,IU.deuxieme_prenom_utilisateur, M.notation_tp, M.notation_td, M.notation_ds
			FROM  UDM_module M,UDM_evaluation E, UDM_notes N, UDM_etudiant ET, UDM_universitaire U, UDM_profileUtilisateur PU, UDM_infosUtilisateur IU
			WHERE IU.id_infosUtilisateur = PU.id_infosUtilisateur
			AND PU.username = U.username
			AND U.id_universitaire = ET.universitaire
			AND ET.id_etudiant = N.id_etudiant
			AND M.id_module = E.module
            AND E.id_evaluation = N.id_evaluation
            AND M.id_module= ".$moduleSelected."
			AND N.points IS NOT NULL ORDER BY N.id_etudiant";
			

			$result= $conn ->query($sql);
			$resultat = $result->setFetchMode(PDO::FETCH_ASSOC);
			

			
			$json_response = array(); 

			
			
			while($rows = $result->fetchAll()) {
				//print_r($rows);
				
					foreach ($rows as $row) {
						$listeNotes = array();

						
						$listeNotes["id_etudiant"] = $row["id_etudiant"];
						$listeNotes["nom_utilisateur"] = $row["nom_utilisateur"];
						$listeNotes["prenom_utilisateur"] = $row["prenom_utilisateur"]." ".$row["deuxieme_prenom_utilisateur"];
						$listeNotes["notation_tp"] = $row["notation_tp"];
						$listeNotes["notation_td"] = $row["notation_td"];
						$listeNotes["notation_ds"] = $row["notation_ds"];
						$listeNotes["notes"] = array();
						$id_etudiant = $row['id_etudiant'];
						$sqlNotes = " SELECT DISTINCT E.type_eval,SUM(E.coeff_evaluation) as total_coeff,
								 (ROUND((SUM((N.points*20 / E.cotation_evaluation )* E.coeff_evaluation)/SUM(E.coeff_evaluation)  ),2) ) AS total_type
									FROM  UDM_module M,UDM_evaluation E, UDM_notes N
									WHERE  N.id_etudiant = ".$id_etudiant."
									AND M.id_module = E.module
						            AND E.id_evaluation = N.id_evaluation
						            AND M.id_module= ".$moduleSelected."
									AND N.points IS NOT NULL
						            GROUP BY  type_eval ";

						   $resultNotes= $conn ->query($sqlNotes);
						
			
						   $total_coeff_tp = 0;
							$total_tp = 0;
							$moyenne_tp = 0 ;
							$total_coeff_td = 0;
							$total_td = 0;
							$moyenne_td = 0 ;
							$total_coeff_ds = 0;
							$total_ds = 0;
							$moyenne_ds = 0 ;

						while($notes = $resultNotes->fetchAll()) {
							
				
							foreach ($notes as $note) {
								switch (strtolower($note['type_eval']) ) {
									case 'tp':{
										$total_coeff_tp = $note['total_coeff'];
										$total_tp = $note['total_type'];
										$moyenne_tp = round(($note['total_type']*$listeNotes['notation_tp']/20),2);
										break;
									}
										
									case 'td':{
										$total_coeff_td = $note['total_coeff'];
										$total_td = $note['total_type'];
										$moyenne_td = round(($note['total_type']*$listeNotes['notation_td']/20),2);
										break;
									}
									case 'ds':{
										$total_coeff_ds = $note['total_coeff'];
										$total_ds = $note['total_type'];
										$moyenne_ds = round(($note['total_type']*$listeNotes['notation_ds']/20),2);
										break;
									}

							}

								

							}	
							$listeNotes["notes"][] = array( "total_coeff_tp" => $total_coeff_tp  ,"total_tp"=> $total_tp, "moyenne_tp" => $moyenne_tp, "total_coeff_td" => $total_coeff_td ,"total_td"=> $total_td, "moyenne_td" => $moyenne_td,"total_coeff_ds" => $total_coeff_ds ,"total_ds"=> $total_ds, "moyenne_ds" => $moyenne_ds);
						}
						

						array_push($json_response, $listeNotes);
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