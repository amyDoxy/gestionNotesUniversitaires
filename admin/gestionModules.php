<?php
	require_once "./includes/header.html";
?>
	<title>Gestion des modules UDM</title>
	<script type="text/javascript" src ="./Scripts/functions.js"></script>
	<script type="text/javascript" src ="./Scripts/functionsModules.js"></script>
	<script type="text/javascript" src ="./Scripts/functionsSemestre.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<?php require_once "./navigation.php";?>
			<div class= "col-sm-8 " >
		
				<section class= "section-aside" >
					<legend>Liste des modules</legend>
					<div class="well well-sm">
						<a  data-toggle="modal" href='#listeModules' onclick="getAllProgrammes(); return false;">Gestion des modules par programmes/semestres</a>
					</div>
					
					
				</section>
			
				<section class= "section-aside" >

					<!--Modal d'ajout des etudiants-->
					<legend>Ajout des modules</legend>
					<div class="well well-sm">
						<a a  data-toggle="modal" href='#ajoutModule'  onclick="getFaculte(); return false;">Ajouter un nouveau module</a><br>
						
					</div>
					
					
	 			</section>

	 		


				
			</div>


					
					
					<?php
					 require_once "modalsgestionModules.html";
					 
					?>


					
	
				</section> 
			
		</div>
	</div>

		
	




</body>
</html>