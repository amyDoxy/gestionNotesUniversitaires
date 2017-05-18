<?php
	require_once "../../includes/header.html";
?>
<title>Page d'accueil- Chef de département</title>
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
			  
		
			  <div class="row">
			  	<div class="col-sm-2"></div>
			    <div class="col-sm-4">
			      <h3>Validation</h3>
			      <p><a href="#">Faire valider une évaluation</a></p>
				
			    </div>
			    
			    <div class="col-sm-4">
			      <h3>Publication des résultat</h3>
			      
			    </div>
			    <div class="col-sm-2"></div>
			    
			  </div>
			
			
	</div>
	



<?php
	require_once "../../includes/footer.html";
?>
