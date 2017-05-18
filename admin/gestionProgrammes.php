<?php
	require_once "./includes/header.html";
?>
	<title>Gestion des programmes UDM</title>
	<script type="text/javascript" src ="./Scripts/functions.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<?php require_once "./navigation.php";?>
		
			
			<section class= "col-sm-8 section-aside" >

					<!--Modal d'ajout de programmes-->
					<legend>Programmes</legend>
					<div class="well well-sm">
						<a  data-toggle="modal" href='#ajoutProgramme' id="btn_ajoutProgramme" onclick="getFaculte(); return false;">Ajouter un programme</a>
					</div>
					

					<div class="well well-sm">
						<a  data-toggle="modal" href='#modifierProgramme' onclick="getProgrammes(); return false;">Modifier un programme</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#supprimerProgramme' onclick="getProgrammesToDel(); return false;">Supprimer un programme</a>
					</div>

					<!--Modals de gestion des departements-->
					<legend>Départements</legend>
					<div class="well well-sm">
						<a  data-toggle="modal" href='#ajoutDept' onclick="getFaculte(); return false;">Ajouter un departement</a>
					</div>
					

					<div class="well well-sm">
						<a  data-toggle="modal" href='#modifierDept' onclick="getDepartements(); return false;">Modifier un département existant</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#supprimerDept' onclick="getDeptToDel(); return false;">Supprimer un departement</a>
					</div>

					<!--Modals de gestion des facultes-->
					<legend>Facultés</legend>
					<div class="well well-sm">
						<a  data-toggle="modal" href='#ajouterFaculte'>Ajouter une faculté</a>
					</div>
					

					<div class="well well-sm">
						<a  data-toggle="modal" href='#modifierFaculte' onclick="getAllFacultes(); return false;">Modifier une faculté existante</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#supprimerFac' onclick="getFaculteToDel(); return false;">Supprimer une faculté</a>
					</div>


					
					
					<?php
					 require_once "modalsgestionProgrammes.html";
					 require_once "modalsgestionFacultes.html";
					 require_once "modalsgestionDept.html";
					?>


					
	
				</section> 
			
		</div>
	</div>

		
	




</body>
</html>