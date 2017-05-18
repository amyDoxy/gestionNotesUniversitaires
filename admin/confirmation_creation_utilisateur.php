

<?php
		if (isset($_POST['btn_creation_User'] ) ) {
			echo "<script type=\"text/javascript\">
		
					$(document).ready(function(){
					$('#modal-confirmation_creation_utilisateur').modal('show')
					});
				</script>";


				$nom_d_utilisateur = $_POST['nom_d_utilisateur'];
				
				$email_d_utilisateur = $_POST['email_d_utilisateur'];
				$statut_d_utilisateur = $_POST['statut_d_utilisateur'];
				$ville_d_utilisateur = $_POST['ville_d_utilisateur'];

				//Si les informations requises ont été insérées, verifier les autres champs

				if ($nom_d_utilisateur && $email_d_utilisateur && $statut_d_utilisateur) {

					$prenom_d_utilisateur = (isset ( $_POST['prenom_d_utilisateur'] ))? $_POST['prenom_d_utilisateur']: "";
					$deuxieme_prenom_d_utilisateur = (isset ( $_POST['deuxieme_prenom_d_utilisateur']))?$_POST['deuxieme_prenom_d_utilisateur']:"";
					$telephone_d_utilisateur = (isset ( $_POST['telephone_d_utilisateur']) )?$_POST['telephone_d_utilisateur']:"";
					$adresse_d_utilisateur = (isset ( $_POST['adresse_d_utilisateur']) )?$_POST['adresse_d_utilisateur']: "";
					$region_d_utilisateur = (isset ( $_POST['region_d_utilisateur'] ) )? $_POST['region_d_utilisateur']: "";
					$pays_d_utilisateur = (isset ( $_POST['pays_d_utilisateur'] ))? $_POST['pays_d_utilisateur']: "140";

					
					$affichageData = "<p style=\"color:#120A8F\">Vous êtes sur le point de créer un utilisateur avec les informations suivantes: </p><br>";

					$affichageData .= "<p><span style=\"color:#7ec0ee\">Nom de l'utilisateur</span>: ".$nom_d_utilisateur. " ".$prenom_d_utilisateur. " ".$deuxieme_prenom_d_utilisateur."</p> ";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Email</span>: ".$email_d_utilisateur."</p>";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Numéro de téléphone</span>: ".$telephone_d_utilisateur." </p>";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Adresse</span>: ".$adresse_d_utilisateur."</p>";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Région</span>: ".$region_d_utilisateur."</p>";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Ville</span>: ".$ville_d_utilisateur."<p>";
					$affichageData .= "<p><span style=\"color:#7ec0ee\">Pays</span>: ".$pays_d_utilisateur."</p><br>";

					if ($statut_d_utilisateur == '1' || $statut_d_utilisateur == '2' || $statut_d_utilisateur == '3') {


							$affichageData .= "<p>L'utilisateur est un universitaire.</p><br>";
							$affichageData .= "<div class=\"form-group\"><label for='departement_utilisateur'>Choisissez son département:</label><select name='departement_utilisateur' id='departement_utilisateur' class ='form-control' required='required' onchange='getProgrParDept();'>";
							$affichageData .='<option selected disabled="disabled"> -- Choisissez une département --</option>';

							$listesDept = array();
							$tableDept = "UDM_departement";
							$listesDept = getAll($conn, $tableDept);
							$countDept= count($listesDept);
								
							foreach ($listesDept as $list) {
								$affichageData .= "<option value = \"".$list['id_departement'] ."\" >".$list['nom_departement']."</option>";
							}

							$affichageData .= "</select></div><br>";

							
						if ($statut_d_utilisateur == '1'){
							$affichageData .= "<p>L'utilisateur est un étudiant.</p><br>";
							$affichageData .= "<div class=\"form-group\"><label for='progr_semestre'>Choisissez un programme de l'étudiant:</label><select name='progr_semestre' id='progr_semestre' class ='form-control' required='required' onchange='getSemestresSpecified()'></select></div>";

							$affichageData .= "<div class=\"form-group\"><label for='affichSemestre'>Ajoutez l'étudiant à un semestre</label><div id='affichSemestre'></div></div>";
							$affichageData .= "<div class=\"form-group\"><label for='type_temps_etude'>Quel est le temps d'étude de l'étudiant:</label><select name='type_temps_etude' id='type_temps_etude' class ='form-control' required='required'>";
							$affichageData .='<option selected disabled="disabled"> -- Choisissez le temps d\'étude de l\'étudiant --</option>';
							$affichageData .= "<option value = \"temps_plein\" >Temps plein</option>";
							$affichageData .= "<option value = \"temps_partiel\" >Temps partiel</option>";

							$affichageData .= "</select></div>";
						}
						elseif ($statut_d_utilisateur == '2' || $statut_d_utilisateur == '3') {
							

							$affichageData .= "<p>L'utilisateur est un professeur.</p><br>";
							$affichageData .= "<div class=\"form-group\"><label for='grade_du_professeur'>Grade du professeur:</label><select name='grade_du_professeur' id='grade_du_professeur' class ='form-control' required='required'>";
							$affichageData .='<option selected disabled="disabled"> -- Choisissez le grade du professeur --</option>';
							
							$affichageData .= "<option value = \"bac+4\" >Equivalent Niveau Bac +4ans </option>";
							$affichageData .= "<option value = \"bac+5\" >Equivalent Niveau Bac +5ans </option>";
							$affichageData .= "<option value = \"bac+6\" >Equivalent Niveau Bac +6ans </option>";
							$affichageData .= "<option value = \"bac+7\" >Equivalent Niveau Bac +7ans </option>";
							$affichageData .= "<option value = \"bac+8\" >Equivalent Niveau Bac +8ans </option>";
							$affichageData .= "<option value = \"bac+9\" >Equivalent Niveau Bac +9ans </option>";
							$affichageData .= "<option value = \"bac10+\" >Equivalent Niveau Bac +10 ans et plus</option>";

							$affichageData .= "</select></div><br>";

							$affichageData .= "<div class=\"form-group\"><label for='specialite_du_professeur'>Spécialité du professeur:</label><input type=\"text\" name='specialite_du_professeur' id='specialite_du_professeur' class ='form-control' required='required' maxlenght='30'></div>";

							if ($statut_d_utilisateur == '3') { //Dans le cas $statut_d_utilisateur est 3, c-a-d un chef de departement
								$affichageData .= "<p>L'utilisateur est un chef de département.Une entrée dans la table 'Chef de département' sera ajoutée après confirmation</p>";
							}
							

						}
					}
					elseif ($statut_d_utilisateur == '4') {
							$affichageData .= "<p>L'utilisateur est un secrétaire.Une entrée dans la table 'Secrétaire' sera ajoutée après confirmation</p>";
						}	

					elseif ($statut_d_utilisateur == '5') {
						$affichageData .= "<p>L'utilisateur est un admin.Une entrée dans la table 'Admin' sera ajoutée après confirmation</p>";
					}
					else{
						$affichageData .= "<p style=\"color:red;\">Le statut du nouveau utilisateur n'est pas reconnu.Veuillez réesayer";
					}

					/*Des input de type hidden pour pouvoir les recuperer dans la fonction JavaScript stockerUtilisateur() et à part de cette fonction JS , les envoyer en parametres sur une page PHP qui va inserer les informations dans la base de données
					*/

					$affichageData .= '<input type="hidden" name="nom_utilisateur" id="nom_utilisateur" class="form-control" value="'.$nom_d_utilisateur.'"">';
					$affichageData .= '<input type="hidden" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" value="'.$prenom_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="deuxieme_prenom_utilisateur" id="deuxieme_prenom_utilisateur" class="form-control" value="'.$deuxieme_prenom_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="email_utilisateur" id="email_utilisateur" class="form-control" value="'.$email_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="statut_utilisateur" id="statut_utilisateur" class="form-control" value="'.$statut_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="telephone_utilisateur" id="telephone_utilisateur" class="form-control" value="'.$telephone_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="adresse_utilisateur" id="adresse_utilisateur" class="form-control" value="'.$adresse_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="region_utilisateur" id="region_utilisateur" class="form-control" value="'.$region_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="ville_utilisateur" id="ville_utilisateur" class="form-control" value="'.$ville_d_utilisateur.'">';
					$affichageData .= '<input type="hidden" name="pays_utilisateur" id="pays_utilisateur" class="form-control" value="'.$pays_d_utilisateur.'">';

						
					$affichageData .= "<div class=\"form-group col-sm-12 text-center\"> 
						<button type=\"button\" class=\"btn btn-primary\"  style=\"width: 50%;\" onclick=\"stockerUtilisateur();\">Créer l'utilisateur</button></div></form>";
					
					echo $affichageData;

				}
				else{
					echo "<p>Veuillez toutes les informations requises</p>";
				}




		}


?>