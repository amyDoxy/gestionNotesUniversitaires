<?php
	require_once "../includes/header.html";
?>
	<title>Gestion des utilisateurss UDM</title>
	<script type="text/javascript" src ="./Scripts/functionsUtilisateurs.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<?php require_once "./navigation.php";?>
			<div class= "col-sm-8 " >
		
				<section class= "section-aside" >
					<legend>Nouveau utilisateur</legend>
					<div class="well well-sm">
						<a href="./creationUtilisateur.php">Ajouter un nouvel utilisateur</a><br>
						
					</div>
					
				</section>
			
				<section class= "section-aside" >

					<!--Modal d'ajout des etudiants-->
					<legend>Gestion des Etudiants</legend>

					

					<div class="well well-sm">
						<a  data-toggle="modal" href='#modifierEtudiant' onclick="getEtudiants(); return false;">Mettre à jour un etudiant</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#desactiverEtudiant' onclick="getEtudiantToDesact(); return false;"">Désactiver un étudiant</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#listeEtudiants' onclick="getAllProgrammes(); return false;">Lister les étudiants par programmes/semestres</a>
					</div>
	 			</section>

	 		


				
			</div>


					
					
					<?php
					 require_once "modalsgestionEtudiants.html";
					 
					?>


					
	
				</section> 
			
		</div>
	</div>

		
	




</body>
</html>