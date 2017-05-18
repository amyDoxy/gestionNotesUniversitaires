<?php
	require "../../../connexionDB.php";
	require "../../../includes/verificationSession.php";
	$semestreSelected = $_GET['semestreSelected'];
	$type = $_GET['type'];
	$tbname1 = "UDM_etudiant";
	$tbname2 = "UDM_universitaire";
	$tbname3 = "UDM_profileUtilisateur";
	$tbname4 = "UDM_infosutilisateur";
	

	$stmt = $conn->prepare("SELECT IU.nom_utilisateur, IU.prenom_utilisateur,U.username FROM $tbname1 E,$tbname2 U,$tbname3 PU,$tbname4 IU WHERE E.universitaire= U.id_universitaire AND U.username = PU.username AND PU.id_infosUtilisateur = IU.id_infosUtilisateur AND E.semestre= :semestreSelected AND E.type= :type"); 
		$stmt->bindParam(':semestreSelected', $semestreSelected);
		$stmt->bindParam(':type', $type);
		$stmt->execute();
		$result = '{ "etudiants": [ ';
		if($stmt){
    		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    			$result .= '{"nom_utilisateur": "'.$row['nom_utilisateur'].'", "prenom_utilisateur" : "'.$row['prenom_utilisateur'].'","username": "'.$row['username'].'"},';
    		}
    		$result	= substr($result, 0, -1);
		}
		else
		{
			echo 'erreur';
		}

		$result.= ' ] }';
		echo $result;

	

	

?>