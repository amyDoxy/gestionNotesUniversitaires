<?php
	require_once "../../includes/header.html";
	require "../../connexionDB.php";
	require "../../includes/functions.php";
	require_once "../../includes/verificationSession.php";
?>
	<script type="text/javascript" src ="../../Scripts/functions.js"></script>
	<title>Gestion des evaluations évaluation</title>
	
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
						<select name="semestre" id="semestre" class="form-control" required="required" onchange="getAllEvaluations();">
								
						</select>
					</div>

			</section>
			
			<div class='col-sm-1'>
				
			</div>



		</div>
	

<?php
	require_once "../../includes/footer.html";
?>

