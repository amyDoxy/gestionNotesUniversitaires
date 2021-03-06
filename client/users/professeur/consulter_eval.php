<?php
	require_once "../../../includes/header.html";
	
	
	
?>
	<script type="text/javascript" src="../../Scripts/functions.js"></script>
	<title>Consulter une évaluation</title>
	</head>
	<body>
		<div class="container">
			
			<?php require_once "navigation.php"; ?>

			
				<div class='col-sm-1'>
				
				</div>
				
				<section class="col-sm-10">
					<div class="form-group col-sm-6">
						<label for="programme">Programme: </label>
						<select name="programme" id="programme" class="form-control" required="required"onchange="getSemestresSpecified()">
								
						</select>
					</div>
					<div class="form-group col-sm-6">
						<label for="semestre">Semestre: </label>
						<select name="semestre" id="semestre" class="form-control" required="required" onchange="getPole(); getModule()">
								
						</select>
					</div>
					<div class="form-group col-sm-6">
						<label for="pole">Pole: </label>
						<select name="pole" id="pole" class="form-control" required="required" onchange=" getModuleParPole()">
								
						</select>
					</div>

					<div class="form-group col-sm-6">
						<label for="moduleEvaluation">Module: </label>
						<select name="moduleEvaluation" id="moduleEvaluation" class="form-control" required="required" onchange="affichageEvaluations()">
								
						</select>
					</div>
				</section>

				<div class='col-sm-1'>
				
				</div>
				
			
			
				
					
					<div class="col-sm-12">
					
								<div class="panel panel-warning col-sm-3">
									<div class="panel-heading">
										<h3 class="panel-title">Toutes les catégories</h3>
									</div>
									<div class="panel-body">
										<div class="radio">
											<label>
												<input type="radio" name="typeEvaluation" id="all" value="all" >
											Afficher toutes les évaluations
											</label>
										</div>
										
									</div>
									
								</div>
							
								<div class="panel panel-info col-sm-3">
									<div class="panel-heading">
										<h3 class="panel-title">TPs</h3>
									</div>
									<div class="panel-body">
										<div class="radio">
											<label>
												<input type="radio" name="typeEvaluation" id="tp" value="tp" >
											Afficher les Travaux pratiques
											</label>
										</div>
										
									</div>
									
								</div>
								
							
							
								<div class="panel panel-primary col-sm-3">
									<div class="panel-heading">
										<h3 class="panel-title">TDs</h3>
									</div>
									<div class="panel-body">
										<div class="radio">
											<label>
												<input type="radio" name="typeEvaluation" id="td" value="td" >
											Afficher les Travaux dirigés
											</label>
										</div>
									</div>
									
								</div>
								
							
								<div class="panel panel-success col-sm-3">
									<div class="panel-heading">
										<h3 class="panel-title">DS</h3>
									</div>
									<div class="panel-body">
										<div class="radio">
											<label>
												<input type="radio" name="typeEvaluation" id="ds" value="ds" >
											Afficher les Devoirs surveillés
											</label>
										</div>
									</div>
									
								</div>
							</div>
				

							
							<section id = "listeEvaluations" class="table-responsive col-sm-12">
					
							</section>
								
							
		</div>

		<!--Modals de modification des évaluations-->


		<div class="modal fade" id="editEval" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		      <div class="modal-dialog ">
		   		 <div class="modal-content">
		         	 <div class="modal-header">
		      		 	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		       			 <h4 class="modal-title custom_align" id="Heading">Mettre à jour une évaluation</h4>
		      		</div>

		         	 <div class="modal-body">
		        	  

		      		  <div id='evalAModifier'></div>
		      </div>
		          <div class="modal-footer ">
		        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onclick="updateEval()"><span class="glyphicon glyphicon-ok-sign"></span> Mettre à jour</button>
		      </div>
		    </div> <!-- /.modal-content -->
		    
		  </div> <!-- /.modal-dialog --> 
		      
		 </div>
	
		
		

<?php
	require_once "../../../includes/footer.html";
?>