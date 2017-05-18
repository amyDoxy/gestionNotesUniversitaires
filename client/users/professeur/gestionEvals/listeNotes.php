<?php
	require_once "../../../connexionDB.php";
	require_once "../../../includes/functions.php";
	
	
	$evalSelected = $_GET['evalSelected'];

	if ($evalSelected) {
		
		try {

			$sql = "SELECT DISTINCT N.*,EV.*, U.username
			FROM  UDM_notes N,UDM_evaluation EV, UDM_etudiant E, UDM_universitaire U
			WHERE E.universitaire = U.id_universitaire
			AND N.id_etudiant = E.id_etudiant
			AND EV.id_evaluation =N.id_evaluation
			AND N.id_evaluation= '".$evalSelected."' ORDER BY points DESC";


			$result= $conn ->query($sql);
			$json_response = array(); 

			
			while($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
					foreach ($rows as $row) {
						
						$listenotes = array();
						$listenotes["coeff_evaluation"] = $row["coeff_evaluation"];
						$listenotes["cotation_evaluation"] = $row["cotation_evaluation"];
						$listenotes["id_notes"] = $row["id_notes"];
						$listenotes["id_evaluation"] = $row["id_evaluation"];
						$listenotes["id_etudiant"] = $row["id_etudiant"];
						$listenotes["username_etudiant"] = $row["username"];
						$listenotes["points"] = $row["points"];


						array_push($json_response, $listenotes);
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