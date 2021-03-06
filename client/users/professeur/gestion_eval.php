<?php
	require_once "../../../includes/header.html";
	require "../../../connexionDB.php";
	require "../../../includes/functions.php";
	require_once "../../../includes/verificationSession.php";
?>
	<script type="text/javascript" src ="../../Scripts/functions.js"></script>
	<title>Gestion des evaluations</title>
	
	</head>
	<body>
		<div class="container">
			
			<?php require_once "navigation.php"; ?>
				
			<div class='col-sm-1'>
				
			</div>
				
			<section class="col-sm-10">
				<div class="form-group col-sm-4">
						<label for="programme">Programme: </label>
						<select name="programme" id="programme" class="form-control" required="required"onchange="getSemestresSpecified()">
								
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="semestre">Semestre: </label>
						<select name="semestre" id="semestre" class="form-control" required="required" onchange=" getModule();getAllEvaluations();">
								
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="moduleEvaluation">Module: </label>
						<select name="moduleEvaluation" id="moduleEvaluation" class="form-control" required="required" onchange="getAllEvaluations();">
								
						</select>
					</div>

			</section>
			
			<div class='col-sm-1'>
				
			</div>

			<div id="listeEvaluations"   class="col-sm-12">
				
			</div>
				
				

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

