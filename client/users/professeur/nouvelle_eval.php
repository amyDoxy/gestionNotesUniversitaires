<?php
	require_once "../../../includes/header.html";
	

?> 
	<script type="text/javascript" src="../../Scripts/functions.js"></script>
	  <script>
		  $( function() {
	    	$( "#dateEval" ).datepicker(  { minDate: -0, maxDate: "+1M +10D" ,changeMonth: true, changeYear: true
    });
  		
    		});
	  	
	  </script>
	
	<title>Nouvelle évaluation</title>
</head>
<body>
	<div class="container"> 
			
			<?php require_once "navigation.php"; ?>
			
			<form action="creationEval.php" method="POST" role="form" id="creationEvaluation">
				<legend class = "col-sm-12">Plannification d'une nouvelle évaluation</legend>
			
				<div class="form-group col-sm-6">
					<label for="programme">Programme</label>
					<select name="programme" id="programme" class="form-control" required="required" onchange="getSemestresSpecified()">
						<!--Liste des programmes-->
					</select>
				
				</div>

				<div class="form-group col-sm-6">
					<label for="semestre">Semestre</label>
					<select name="semestre" id="semestre" class="form-control" required="required" onchange="getModule()">
						<!--Liste des semestre-->
					</select>
				 
				</div>
				

				<div class="form-group col-sm-12">
					<label for="">Module</label>
					<select name="moduleEvaluation" id="moduleEvaluation" class="form-control" required="required">
						<option value=""></option>
					</select>

				</div>

				<div class="form-group col-sm-12">
					<label for="typeEval">Type d'évaluation</label>
					<select name="typeEval" id="typeEval" class="form-control" required="required">
						<!--Liste des types d'evaluations presentes dans la BD-->
					</select>
				</div>

				<div class="form-group col-sm-12">
					<label for="coeffEval">Coefficient de l'évaluation</label>
					<input type="number" step="0.01" name="coeffEval" id="coeffEval" class="form-control" required="required" min="0" max = "20">
				</div>

				<div class="form-group col-sm-12">
					<label for="cotationEval">Cotation de l'évaluation</label>
					<input type="number" name="cotationEval" id="cotationEval" class="form-control" required="required" min= "1" max="100">
				</div>

				<div class="form-group">
					<label for="libelleEval" class="col-sm-4 control-label">Libéllé de l'évaluation:</label>
					<div class="col-sm-8">
						<input type="text" name="libelleEval" id="libelleEval" class="form-control"  required="required">
					</div>
				</div>

				<div class="form-group col-sm-12">
					<label>Type d'étudiants</label>:
					<div class="radio-inline">

						<input type="radio" name="type-etudiant" value="temps_plein" checked="checked">
							Temps plein
						
					</div>
					<div class="radio-inline">

							<input type="radio" name="type-etudiant" value="temps_partiel" >
							Temps partiel
						
					</div>
				</div>

				<div class="form-group col-sm-12">
					<button type="button" class="btn btn-info btn-md" onclick="affichageEtudiant()" data-toggle="modal" data-target="#modalEtudiants" required="required">Selection des participants à l'évaluation</button> 
				</div>

				<!--Modal-->

				<div class="modal fade" id="modalEtudiants">
					<div class="modal-dialog modal-lg">

						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Selectionnez les étudiants qui vont prendre part à l'évaluation</h4>
							</div>

							<div class="modal-body">

								<div id="listeEtudiant" class="form-group"></div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								<button type="button" class="btn btn-primary" onclick="stockerEtudiant();">Sauvegarder les informations</button>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" id="etudiantParticipants">

				
				<div class="form-group">
					<label for="dateEval" class="col-sm-2">Proposition de date de l'evaluation</label>
					<input type="text" name="dateEval" id="dateEval">
				</div>

				
   			

			
				<div class="form-group">
			
					<button type="button" data-toggle="modal" href='#ajoutModule' onclick="getDataInserted(); return false;" class="btn btn-primary" >Créer</button>
				</div>
			</form>


			<div class="modal fade" id="ajoutModule">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Récapitulatif</h4>
						</div>
						<div class="modal-body">
							<p>Vous êtes sur le point d'ajouter ce module:</p>

							<div id='data_module'></div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							<button type="button" class="btn btn-primary" onclick="sendForm();">Créer l'évaluation</button>
						</div>
					</div>
				</div>
			</div>


<?php
	require_once "../../../includes/footer.html";
?>