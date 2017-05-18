<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";

	
     
	
	$id_unique_module =$_GET['id_unique_module']; 
	$libelle_module = $_GET['libelle_module'];
    $notation_cours = isset($_GET['notation_cours'] )?$_GET['notation_cours']: 0;
    $notation_tp = isset($_GET['notation_tp'] )?$_GET['notation_tp']: 0 ;
   	$notation_td = isset( $_GET['notation_td'] )?$_GET['notation_td']: 0;
    $notation_ds = isset ($_GET['notation_ds'] )? $_GET['notation_ds']: 0;
    $credit_module = $_GET['credit_module'];
    $nb_heure = $_GET['nb_heure'];
	$table = "UDM_module";

	if( $id_unique_module && $libelle_module && $credit_module && $nb_heure)
	{
		
		try
		{

				$sqlUpdateModule = "UPDATE $table SET  `libelle_module`= :libelle_module, `notation_cours` = :notation_cours, `notation_tp` = :notation_tp , `notation_td` = :notation_td, `notation_ds` = :notation_ds , `credit_module` = :credit_module, `nb_heure` = :nb_heure WHERE `id_module` = ".$id_unique_module	;
				


				//Mise à jour de la table UDM_module
				$resultUpdateModule= $conn->prepare($sqlUpdateModule);
				$resultUpdateModule->bindParam(':libelle_module', $libelle_module);
				$resultUpdateModule->bindParam(':notation_cours', $notation_cours);
				$resultUpdateModule->bindParam(':notation_tp', $notation_tp);
				$resultUpdateModule->bindParam(':notation_td', $notation_td);
				$resultUpdateModule->bindParam(':notation_ds', $notation_ds);
				$resultUpdateModule->bindParam(':credit_module', $credit_module);
				$resultUpdateModule->bindParam(':nb_heure', $nb_heure);
				$resultUpdateModule->execute();


				echo "Mise à jour dans la base de donnée avec succes du module \"".$libelle_module."\"";
			
		} 
			
		
		catch(PDOException $e)
		{
			echo "\nEchec de mise à jour: ".$e->getMessage()."\nRéessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	