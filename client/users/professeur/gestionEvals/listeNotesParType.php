<?php
	require_once "../../../verification.php";
	require_once "../../../includes/functions.php";
	
	
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$moduleSelected = $_GET['moduleSelected'];
	$typeSelected = $_GET['typeSelected'];

	if ($moduleSelected && $typeSelected) {
		
		try {

			$sql = "SELECT DISTINCT N.id_etudiant,IU.nom_utilisateur, IU.prenom_utilisateur,IU.deuxieme_prenom_utilisateur,SUM(E.coeff_evaluation) as total_coeff,E.type_eval, ROUND((SUM((N.points*20 / E.cotation_evaluation )* E.coeff_evaluation) ),2) AS total
			FROM  UDM_module M,UDM_evaluation E, UDM_notes N, UDM_etudiant ET, UDM_universitaire U, UDM_profileUtilisateur PU, UDM_infosUtilisateur IU
			WHERE IU.id_infosUtilisateur = PU.id_infosUtilisateur
			AND PU.username = U.username
			AND U.id_universitaire = ET.universitaire
			AND ET.id_etudiant = N.id_etudiant
			AND M.id_module = E.module
            AND E.id_evaluation = N.id_evaluation
            AND M.id_module= ".$moduleSelected."
			AND E.type_eval = '".$typeSelected."'
			AND N.points IS NOT NULL
            GROUP BY id_etudiant
            ORDER BY total DESC";
			

			$result= $conn ->query($sql);
			$resultat = $result->setFetchMode(PDO::FETCH_ASSOC);
			

			
			$json_response = array(); 

			
			
			while($rows = $result->fetchAll()) {
				//print_r($rows);
				
					foreach ($rows as $row) {
						$listeNotes = array();

						$listeNotes["type_eval"] = $row["type_eval"];
						$listeNotes["id_etudiant"] = $row["id_etudiant"];
						$listeNotes["nom_utilisateur"] = $row["nom_utilisateur"];
						$listeNotes["prenom_utilisateur"] = $row["prenom_utilisateur"]." ".$row["deuxieme_prenom_utilisateur"];
						$listeNotes["total_coeff"] = $row["total_coeff"];
						$listeNotes["total"] = $row["total"];
						$listeNotes["moyenne"] = round( ($row["total"] / $row["total_coeff"]) , 2);

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