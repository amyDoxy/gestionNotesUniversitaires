<?php
	require_once "../../includes/header.html";
?>
<title>Page d'accueil- Secretaire</title>
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
			      <h3>Saisie des notes</h3>
			   
				  
			    </div>
			    
			    <div class="col-sm-4">
			      <h3>Compilation</h3>
			 
			    </div>
			    <div class="col-sm-2"></div>
			    
			  </div>
			</div>
			
	</div>



<?php
	require_once "../../includes/footer.html";
?>
