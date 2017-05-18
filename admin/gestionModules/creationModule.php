<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";

	$libelle_du_module = $_GET['libelle_du_module'];
	$pole_du_module = $_GET['pole_du_module'];
	$credit_du_module = $_GET['credit_du_module'];
	$notation_du_cours = (isset ($_GET['notation_du_cours']) )?$_GET['notation_du_cours']:0;
	$notation_des_tp = (isset ($_GET['notation_des_tp']) )?$_GET['notation_des_tp']:0;
	$notation_des_td = (isset ($_GET['notation_des_td']) )?$_GET['notation_des_td']:0;
	$notation_des_ds = (isset ($_GET['notation_des_ds']) )?$_GET['notation_des_ds']:0;
	$nb_heure_module = $_GET["nb_heure_module"];
   	$dispensateur_du_module  = $_GET["dispensateur_du_module"];
   
	$table = "UDM_module";

	if( $libelle_du_module && $pole_du_module && $credit_du_module && $nb_heure_module && $dispensateur_du_module  )
	{
		
		try
		{
			$sqlVerif = "SELECT * FROM $table WHERE libelle_module =:libelle_du_module AND pole = :pole_du_module ";
			$resultVerif = $conn->prepare($sqlVerif);
			$resultVerif->bindParam(':libelle_du_module', $libelle_du_module);
			$resultVerif->bindParam(':pole_du_module', $pole_du_module);
			$resultVerif->execute();
			
			
			$modules = $resultVerif->fetchAll(PDO::FETCH_ASSOC);
			$countModules = count( $modules );

				if($countModules == 0){
			
		
						$sqlInsert = "INSERT INTO $table VALUES (null, :libelle_du_module, :pole_du_module, :notation_du_cours, :notation_des_tp, :notation_des_td, :notation_des_ds, :credit_du_module, :nb_heure_module, :dispensateur_du_module) ";
						$resultInsert= $conn->prepare($sqlInsert);
						$resultInsert->bindParam(':libelle_du_module', $libelle_du_module);
						$resultInsert->bindParam(':pole_du_module', $pole_du_module);
						$resultInsert->bindParam(':notation_du_cours', $notation_du_cours);
						$resultInsert->bindParam(':notation_des_tp', $notation_des_tp);
						$resultInsert->bindParam(':notation_des_td', $notation_des_td);
						$resultInsert->bindParam(':notation_des_ds', $notation_des_ds);
						$resultInsert->bindParam(':credit_du_module', $credit_du_module);
						$resultInsert->bindParam(':nb_heure_module', $nb_heure_module);
						$resultInsert->bindParam(':dispensateur_du_module', $dispensateur_du_module);

						$resultInsert->execute();

						echo "Insertion dans la base de donnée avec succes du module \"".$libelle_du_module." dans le pole ".$pole_du_module."\"";	
					
				}
				else{
					echo "Le module '".$libelle_du_module." du pole ".$pole_du_module."' existe déjà dans le système.";
				}

			

		

		}
		catch(PDOException $e)
		{
			echo "Echec d'insertion.".$e->getMessage()."<br/>Réessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	