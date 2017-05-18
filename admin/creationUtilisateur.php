<?php
	require_once "./includes/header.html";
	require_once "./connexionDB.php";
	require_once "./includes/functions.php";

?>
	<title>Ajout d'un utilisateur</title>
	<script type="text/javascript" src ="./Scripts/functionsUtilisateurs.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<?php require_once "./navigation.php";?>
		
			<section class= "col-sm-8 section-aside" >
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" role="form">
					<legend>Ajout d'un utilisateur</legend>
				
					<div class="form-group">
						<label for="nom_d_utilisateur">Nom <span style="color:red">*</span></label>
						<input type="text" class="form-control" id="nom_d_utilisateur" name="nom_d_utilisateur" placeholder="--  Entrez votre nom ici  --" minlength="2" maxlength="25" required="required">
					</div>

					<div class="form-group">
						<label for="prenom_d_utilisateur">Prénom </label>
						<input type="text" class="form-control" id="prenom_d_utilisateur" name="prenom_d_utilisateur" placeholder="--  Entrez votre prénom ici  --" maxlength="25">
					</div>

					<div class="form-group">
						<label for="deuxieme_prenom_d_utilisateur">Deuxième Prénom</label>
						<input type="text" class="form-control" id="deuxieme_prenom_d_utilisateur" name="deuxieme_prenom_d_utilisateur" placeholder="--  Entrez votre deuxième prénom ici  --" maxlength="25">
					</div>

					<div class="form-group">
						<label for="email_d_utilisateur"> Email <span style="color:red">*</span></label>
						<input type="email" class="form-control" id="email_d_utilisateur" name="email_d_utilisateur" placeholder="nom@xyz.com" required="required">
					</div>

					<div class="form-group">
						<label for="statut_d_utilisateur">Statut <span style="color:red">*</span></label>
						<select class="form-control" id="statut_d_utilisateur" name="statut_d_utilisateur" required="required">
							<option selected disabled="disabled"> -- Choisissez un statut --</option>

							<?php
								$listes = array();
								$table = "UDM_statut";
								$listes = getAll($conn, $table);
								$count= count($listes);
								
									foreach ($listes as $liste) {
										echo "<option value = \"".$liste['id_statut'] ."\" >".$liste['libelle_statut']."</option>";
									}
								
							?>


						</select>
					</div>

					<div class="form-group">
						<label for="telephone_d_utilisateur">Numéro de téléphone</label>
						<input type="tel" class="form-control" id="telephone_d_utilisateur" name="telephone_d_utilisateur" maxlength="10">
					</div>
					<div class="form-group">
						<label for="adresse_d_utilisateur">Adresse</label>
						<input type="text" class="form-control" id="adresse_d_utilisateur" name="adresse_d_utilisateur" placeholder="-- Votre Adresse --" maxlength="80">
					</div>

					<div class="form-group">
						<label for="region_d_utilisateur">Region</label>
						<select class="form-control" id="region_d_utilisateur" name="region_d_utilisateur">
							<option selected disabled="disabled"> -- Choisissez une région --</option>

							<?php
								$listes = array();
								$table = "UDM_region";
								$listes = getAll($conn, $table);
								$count= count($listes);
								
									foreach ($listes as $liste) {
										echo "<option value = \"".$liste['id_region'] ."\" >".$liste['region_name']."</option>";
									}
								
							?>


						</select>
					</div>

					<div class="form-group">

						<label for="ville_d_utilisateur">Ville <span style="color:red">*</span></label>
							
							<input type="text" name="ville_d_utilisateur" id="ville_d_utilisateur" class="form-control" required="required" maxlength="40">
							
						</div>

					
					<div class="form-group">
						<label for="pays_d_utilisateur">Pays d'origine</label>
						<select class="form-control" id="pays_d_utilisateur" name="pays_d_utilisateur">
							<option selected disabled="disabled"> -- Choisissez un pays --</option>

							<?php
								$listes = array();
								$table = "UDM_countries";
								$listes = getAll($conn, $table);
								$count= count($listes);
								
									foreach ($listes as $liste) {
										echo "<option value = \"".$liste['id'] ."\" >".$liste['country_name']."</option>";
									}
								
							?>


						</select>
					</div>
				
					<div class="form-group">
						<p> <span style="color:red">*</span> Champs obligatoires</p>
					</div>

					<div class="form-group col-sm-12 text-center"> 
						<button type="submit" class="btn btn-primary" name="btn_creation_User" style="width: 50%;">Envoyer</button>
					</div>
					
				</form>

				<div class="modal fade" id="modal-confirmation_creation_utilisateur">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								<?php include_once "confirmation_creation_utilisateur.php";?>
							</div>
							<div class="modal-footer">
								 
							</div>
						</div>
					</div>
				</div>

			</section>
			<div class="clearfix">
				
				
			</div>
		</div>
	</div>
	
</body>
</html>

