<?php
	require_once "./includes/header.html";
?>
		<title>Bienvenue sur Gestion Des Notes UDM</title>
		

 

		

	</head>

	<body> 
		<div class="container" style="bg-color: rgb(128,103,187);""" >
			<div class="page-header">
			  	<h1>UDM <small>Gestion Des Notes</small></h1>
			</div>
			
				<form action="verification.php" method="POST" role="form" id='formLogin'>
					<legend>Connexion</legend>
		
					<div id="error" class="form-group" style="color:red"> </div>
					<div class="form-group">
						<label for="username">Nom d'utilisateur</label>
						<input type="text" class="form-control" name ="username" id="username"  required="required" placeholder="Entrez votre nom d'utilisateur">
				
					</div>
					<div class="form-group">
						<label for="motDePasse">Mot de passe</label>
						<input type="password" name="motDePasse" id="motDePasse" class="form-control" required="required" title="" placeholder="Entrez votre mot de passe">
					</div>
					
					

					<div class="form-group">
			     
						<button class="btn btn-primary" id="btn-connexion"   onClick="verificationIdent();return false;"> <span class="glyphicon glyphicon-log-in"></span> &nbsp;Se Connecter</button>

							
					</div>
			</form>
		</div>
		
	</body>

</html>
