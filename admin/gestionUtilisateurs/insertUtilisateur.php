<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";

	$nom_utilisateur = strtolower( $_POST["nom_utilisateur"] );
   	$prenom_utilisateur = strtolower( $_POST["prenom_utilisateur"] );
   	$deuxieme_prenom_utilisateur = strtolower( $_POST["deuxieme_prenom_utilisateur"] );
   	$email_utilisateur = $_POST["email_utilisateur"];
   	$statut_utilisateur = $_POST["statut_utilisateur"];
   	$telephone_utilisateur= $_POST["telephone_utilisateur"];
   	$adresse_utilisateur= strtolower( $_POST["adresse_utilisateur"] );
   	$region_utilisateur = $_POST["region_utilisateur"];
   	$ville_utilisateur = strtolower( $_POST["ville_utilisateur"] );
   	$pays_utilisateur = strtolower( $_POST["pays_utilisateur"]);
   	$departement_utilisateur = $_POST["departement_utilisateur"];
   	$type_temps_etude = $_POST["type_temps_etude"];
   	$grade_du_professeur =$_POST["grade_du_professeur"];
   	$specialite_du_professeur =strtolower( $_POST["specialite_du_professeur"]);
      $semestre_programme = $_POST['semestre_programme'];
      $progr_semestre = $_POST['progr_semestre'];

   	

   	if ($nom_utilisateur && $email_utilisateur && $statut_utilisateur) {
   		
   		$table1 = "UDM_infosUtilisateur";
   		$table2 = "UDM_profileUtilisateur";
   		$table3 = "UDM_universitaire";
   		$table4 = "UDM_etudiant";
   		$table5 = "UDM_professeur";
   		$table6 = "UDM_chef_de_departement";
   		$table7= "UDM_secretaire";
   		$table8 = "UDM_administrateur_systeme";

   		try{
   			$sqlInsert = "INSERT INTO $table1  values (null, :nom_utilisateur, :prenom_utilisateur, :deuxieme_prenom_utilisateur, :email_utilisateur, :statut_utilisateur, :telephone_utilisateur, :adresse_utilisateur, :ville_utilisateur, :region_utilisateur, :pays_utilisateur)";
   			$resultInsert = $conn->prepare($sqlInsert);
   			$resultInsert->bindParam(':nom_utilisateur', $nom_utilisateur);
   			$resultInsert->bindParam(':prenom_utilisateur', $prenom_utilisateur);
   			$resultInsert->bindParam(':deuxieme_prenom_utilisateur', $deuxieme_prenom_utilisateur);
   			$resultInsert->bindParam(':email_utilisateur', $email_utilisateur);
   			$resultInsert->bindParam(':statut_utilisateur', $statut_utilisateur);
   			$resultInsert->bindParam(':telephone_utilisateur', $telephone_utilisateur);
   			$resultInsert->bindParam(':adresse_utilisateur', $adresse_utilisateur);
   			$resultInsert->bindParam(':region_utilisateur', $region_utilisateur);
   			$resultInsert->bindParam(':ville_utilisateur',$ville_utilisateur);
   			$resultInsert->bindParam(':pays_utilisateur', $pays_utilisateur);

   			$resultInsert->execute();

   			$response = "\nInsertion des informations sur l'utilisateur dans le système avec succes.";

   			$username = substr($prenom_utilisateur, 0, 5);

   			//Verification de l'existence d'utilisateur ayant le meme nom d'utilisateur que celui que nous sommes sur le point d'insérer
   			$sqlVerif = "SELECT  * FROM $table2 where `username` = '".$username."' ";
   			$listeUser = array();
			$listeUser = executeSql($conn, $sqlVerif);
			$countUser = count($listeUser);

			// Récuperation de l'id de l'utilisateur qu'on vient de stocker
			$sqlVerifUser = "SELECT  * FROM $table1 where `nom_utilisateur`= '".$nom_utilisateur."' AND `email_utilisateur` = '".$email_utilisateur."'";
			$users =executeSql($conn, $sqlVerifUser);
			$id_user='';
			
			foreach ($users as $user) {
				$id_user = $user['id_infosUtilisateur'];
			}
			
			if ($countUser != 0)
			{
				//Si il existe un autre utilisateur avec le meme username, on récupere l'id de l'utilisateur qu'on vient de stocker et on le colle à le nom d'utilisateur pour le rendre unique
				
				$username = $username."".$id_user;
			}
			$motDePasse = $username."1234";
			$password = md5($motDePasse);
			$sqlInsertionProfilUser = "INSERT INTO $table2 VALUES ('".$username."', '".$password."',1,".$id_user.")";
			$conn->query($sqlInsertionProfilUser);

			$response .= "\nLe nom d'utilisateur est ".$username." et le mot de passe par  défaut est ".$motDePasse;
   			if ($statut_utilisateur == 1 || $statut_utilisateur == 2 || $statut_utilisateur == 3){

   				//Si le statut est etudiant ou professeur ou chef de département, on inserer les informations dans la table universitaire

   				$sqlInsertionUniv = "INSERT INTO $table3 VALUES (null,'".$username."',".$departement_utilisateur.")";
   				$conn->query($sqlInsertionUniv);
   				$response .= "\nCréation de l'universitaire avec succès.\n";

   				//on récupere l'id de l'universitaire qu'on vient de stocker et on l'utilise pour faire une liaison dans les autres tables

   				$sqlVerifUniv = "SELECT DISTINCT `id_universitaire` FROM $table3 WHERE `username` = '".$username."' ";
				$universitaires =executeSql($conn, $sqlVerifUniv);

				$id_univ='';
				 
				foreach ($universitaires as $univ) {
					$id_univ = $univ['id_universitaire'];
				}
				
   				if($statut_utilisateur == 1)
   				{
   					$sqlInsertionEtudiant = "INSERT INTO $table4 VALUES (null, '".$type_temps_etude."','".$id_univ."', '".$semestre_programme."')";
   					$conn->query($sqlInsertionEtudiant);

   					$response .= "\nAjout avec de l'utilisateur comme étudiant";
   				}

   				
   				else{	//$statut_utilisateur == 2 || $statut_utilisateur == 3 

   					$sqlInsertionProf = "INSERT INTO $table5 VALUES (null, '".$grade_du_professeur."', '".$specialite_du_professeur."','".$id_univ."')";
   					$conn->query($sqlInsertionProf);
   					$response .= "\nAjout avec de l'utilisateur comme professeur";

   					if($statut_utilisateur == 3 )//si le professeur est un chef de département
   					{
   						//on récupere l'id du professeur qu'on vient de stocker et on l'utilise pour faire une liaison avec la table des chefs des départements

		   				$sqlVerifProf = "SELECT DISTINCT id_professeur FROM $table5 WHERE `universitaire` = '".$id_univ."' ";
						$profs =executeSql($conn, $sqlVerifProf);

						$id_prof='';
						
						foreach ($profs as $prof) {
							$id_prof = $prof['id_professeur'];
						}
						
   						$sqlInsertionChefDept = "INSERT INTO $table6 VALUES (null, ".$id_prof.")";
   						$conn->query($sqlInsertionChefDept);
   						$response .= "\nAjout avec de l'utilisateur comme chef de département";
   					}
   				}



   			}
   			elseif ($statut_utilisateur == 4) {
   				# Utilisateur est un secrétaire
   				$sqlInsertionSec = "INSERT INTO $table7 VALUES (null, '".$username."')";
   				$conn->query($sqlInsertionSec);
   				$response .= "\nCréation du secrétaire $username avec succès.";
   			}
   			elseif ($statut_utilisateur == 5) {
   				//utilisateur est un admin
   				$sqlInsertionAdmin = "INSERT INTO $table8 VALUES (null, '".$username."')";
   				$conn->query($sqlInsertionAdmin);
   				$response .= "\nCréation de l'administrateur du systeme $username avec succès.\n";
   			}
   			else{
   				$response .= "\nUne erreur est survenue pendant la création de l'utilisateur";
   			}

   			echo $response;


   		}
   		catch(PDOException $e){

   			echo "Erreur d'insertion". $e->getMessage();

   		}



   	}
   	else{
   		echo "Entrée invalide";
   	}
?>