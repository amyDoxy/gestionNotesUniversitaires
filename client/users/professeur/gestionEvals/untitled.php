$listeEvaluations = '{"evaluations": [ ';
			while($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
					foreach ($rows as $row) {
						
						$listeEvaluations .= '{ "id_ue": '.$row["id_ue"].',"ue" : "'.$row["description_ue"].'","pole" : [{ "id_pole": '.$row["id_pole"].', "description_pole": "'.$row["description_pole"].'", "modules": [ {"id_module": '.$row["id_module"].', "libelle_module": "'.$row["libelle_module"].'", "notation_cours": "'.$row['notation_cours'].'", "notation_tp": "'.$row['notation_tp'].'", "notation_td": '.$row['notation_td'].', "notation_ds": '.$row['notation_ds'].', "credit_module": '.$row['credit_module'].', "nb_heure":'.$row['nb_heure'].' , "evaluation": [{ "id_evaluation" : '.$row['id_evaluation'].', "libelle_evaluation": "'.$row['libelle_evaluation'].'", "coeff_evaluation" : '.$row['coeff_evaluation'].', "cotation_evaluation" : '.$row['cotation_evaluation'].', "date_evaluation" : '.$row['date_evaluation'].', "type_eval" : "'.$row['type_eval'].'"  }] }]
						}] },';
					}
			}
			$listeEvaluations = substr($listeEvaluations, 0, -1);
			$listeEvaluations .= ']}';