<?php
	require_once "../../../verification.php";
	require_once "../../../includes/functions.php";
	require_once "../../../includes/verificationSession.php";
	
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$semestSelected = $_GET['semestSelected'];

	if ($semestSelected) {
		
		try {

			$sql = "SELECT DISTINCT UE.*,P.*,M.*, E.* 
			FROM UDM_module M, UDM_evaluation E, UDM_pole P, UDM_ue UE
			WHERE UE.id_ue = P.unite_enseignement
			AND P.id_pole = M.pole
			AND M.id_module = E.module
			AND UE.semestre= '".$semestSelected."'
           a in (SELECT id_professeur 
										FROM UDM_professeur 
										WHERE universitaire in (SELECT id_universitaire FROM UDM_universitaire WHERE username = '".$username."'))";


			$result= $conn ->query($sql);
			
			$listeEvaluations = '{"evaluations": [ ';
			while($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
				print_r($rows);

					foreach ($rows as $row) {
						
						$listeEvaluations .= '{ "id_ue": '.$row["id_ue"].',"ue" : "'.$row["description_ue"].'","id_pole": '.$row["id_pole"].', "description_pole": "'.$row["description_pole"].'", "id_module": '.$row["id_module"].', "libelle_module": "'.$row["libelle_module"].'", "notation_cours": "'.$row['notation_cours'].'", "notation_tp": "'.$row['notation_tp'].'", "notation_td": '.$row['notation_td'].', "notation_ds": '.$row['notation_ds'].', "credit_module": '.$row['credit_module'].', "nb_heure":'.$row['nb_heure'].' , "id_evaluation" : '.$row['id_evaluation'].', "libelle_evaluation": "'.$row['libelle_evaluation'].'", "coeff_evaluation" : '.$row['coeff_evaluation'].', "cotation_evaluation" : '.$row['cotation_evaluation'].', "date_evaluation" : "'.$row['date_evaluation'].'", "type_eval" : "'.$row['type_eval'].'"},';
					}
			}
			$listeEvaluations = substr($listeEvaluations, 0, -1);
			$listeEvaluations .= ']}';


			//envoie des donnees sous Jason
			echo $listeEvaluations;
			
		} catch (PDOException $e) {
			echo "Erreur : ".$e->getMessage();
		}
	}
	else{
		echo "Entrée invalide";
	}

	 


?>	