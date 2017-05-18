<?php
	require_once "../../../includes/header.html";
?>
<title>Page d'accueil- Professeur</title>
</head>
<body>
	<div class="container">
			
			<?php
				
				require_once "navigation.php";
				
			?>

			<div class="jumbotron text-center">
			  <h2>Bienvenue  sur Notes UDM,</h2>
			  <p> <?php echo $prenom_utilisateur." ".$nom_utilisateur;?> !!!</p> 
			</div>
			  
			<div class="container">
			  <div class="row">
			  	<div class="col-sm-2"></div>
			    <div class="col-sm-4">
			      <h3>Evaluations</h3>
			      <p><a href="nouvelle_eval.php">Créer une évaluation</a></p>
				  <p><a href="consulter_eval.php">Consulter une évaluation</a></p>
					<p><a href="gestion_eval.php">Gestion des évaluations</a></p>
			    </div>
			    
			    <div class="col-sm-4">
			      <h3>Notes des étudiants</h3>
			      <p><a href="notes_publiees.php">Notes publiées</a></p>
			    </div>
			    <div class="col-sm-2"></div>
			    
			  </div>
			</div>
			
	</div>



<?php
	require_once "../../includes/footer.html";
?>
