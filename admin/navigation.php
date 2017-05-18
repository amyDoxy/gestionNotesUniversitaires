<?php
	require_once "./includes/header.html";
	require_once "./connexionDB.php";
	require_once "./includes/verificationSession.php";
	require_once "./includes/functions.php";
	$data =  get_user_data($conn, $_SESSION['UserData']['username']) ;
	foreach ($data  as $row) {
			$nom_utilisateur = $row['nom_utilisateur'];
			$prenom_utilisateur = $row['prenom_utilisateur'];
	}
	
	
?>


	<nav class="navbar navbar-default" role="navigation" style="background-color: #3dc8d6;">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">UDM <small>Gestion Des Notes</small></a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						
						
						<ul class="nav navbar-nav navbar-right">
      						<li>
      							<a id ="profileUser" href="#"><span class="glyphicon glyphicon-user"></span><?php echo $prenom_utilisateur." ".$nom_utilisateur;?> </a>
      						</li>
     						 <li><a href="../../../deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
    					</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>

			<!--Un menu vertical-->
			<div class="clearfix">
				<ul class="menu-vertical col-sm-4">
					<li class="active">	<a href="index.php" >Accueil</a></li>
					<li class="dropdown">
			 			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des cours <b class="caret"></b></a>
			 					<ul class="dropdown-menu">
			 						<li><a href="./gestionProgrammes.php">Programmes</a></li>
			 						<li><a href="gestionSemestres.php">Semestres</a></li>
			 						<li><a href="gestionModules.php">Modules</a></li>
			 					</ul>
			 		</li>
					
					<li><a href="gestionUtilisateurs.php">Gestion des utilisateurs</a></li>
					<li><a href="#">Gestion des erreurs</a></li>
					
					
				</ul>
			 <div>
			 
			 		
			 
			 		
			
			 	
			
		 	 	


		 	 	
			  	
			 	 
			

