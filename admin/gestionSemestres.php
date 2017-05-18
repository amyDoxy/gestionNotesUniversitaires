<?php
	require_once "../includes/header.html";
?>
	<title>Gestion des semestres UDM</title>
	<script type="text/javascript" src ="./Scripts/functionsSemestre.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<?php require_once "./navigation.php";?>
		
			
			<section class= "col-sm-8 section-aside" >

					<!--Modal d'ajout de semestres-->
					<legend>Gestion des Semestres</legend>
					<div class="well well-sm">
						<a  data-toggle="modal" href='#ajoutSemestre' onclick="getFaculte(); return false;">Ajouter un semestre</a>
					</div>
					

					<div class="well well-sm">
						<a  data-toggle="modal" href='#modifierSemestre' onclick="getSemestres(); return false;">Mettre à jour un semestre</a>
					</div>

					<div class="well well-sm">
						<a  data-toggle="modal" href='#supprimerSemestre' onclick="getSemestresToDel(); return false;">Supprimer un semestre</a>
					</div>

					
					<div class="well well-sm">
						<a  data-toggle="modal" href='#affichSemestreProg' onclick="getAllProgrammes(); return false;">Liste des semestres par programme</a>
					</div>
					

					


					<!--Modals de gestion des semestres-->

					<div class="modal fade" id="ajoutSemestre">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Ajouter un semestre</h4>
								</div>

								<div class="modal-body">

								<!--Formulaire d'ajout de semestre-->

									<form action="" method="POST" role="form" id="creationProgrammes">
												
										<div class="form-group col-sm-12">

											<label for="faculte">Faculté</label>
												<select name="faculte" id="faculte" class="form-control" required="required" onchange="getDept()">
														<!--Liste des facultes-->
												</select>
													
										</div>
													

										<div class="form-group col-sm-12">
											<label for="dept">Departement</label>
												<select name="dept" id="dept" class="form-control" required="required" onchange="getProgr()">
													
												</select>

										</div>

										<div class="form-group col-sm-12">
											<label for="intitule_prog">Intitulé du programme</label>

											<select name="intitule_prog" id="intitule_prog" class="form-control" required="required">

											</select>
											
										</div>


										<div class="form-group col-sm-12">
											<label for="libelle_du_semestre">Libellé Semestre</label>

											<select name="libelle_du_semestre" id="libelle_du_semestre" class="form-control">
													<option disabled selected="selected">--Choisissez un identifiant du semestre--</option>
													<option value="se1">SEMESTRE 1</option>
													<option value="se2">SEMESTRE 2</option>
													<option value="se3">SEMESTRE 3</option>
													<option value="se4">SEMESTRE 4</option>
													<option value="se5">SEMESTRE 5</option>
													<option value="se6">SEMESTRE 6</option>
													<option value="se7">SEMESTRE 7</option>
													<option value="se8">SEMESTRE 8</option>

											</select>
										</div>


										<div class="form-group col-sm-12">
											<label for="detail_du_semestre">Détail du semestre</label>
											<textarea name="detail_du_semestre" id="detail_du_semestre" class="form-control" required="required">
											</textarea>
										</div>


										<div class="form-group col-sm-12">
											<label for="annee_du_semestre">Année de ce semestre</label>
											<input type="number" name="annee_du_semestre" id="annee_du_semestre" min="2000" max="<?php echo (date("Y")); ?>" value="<?php echo date("Y"); ?>" required="required">
										</div>
										
									</form>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
									<button type="button" class="btn btn-primary" onclick="stockerSemestre()">Ajouter le semestre</button>
								</div>
								</div>
								</div>
							</div>


							<!--Modals de modification de semestre-->
							<div class="modal fade" id="modifierSemestre">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Mettre à jour un semestre</h4>
										</div>
										<div class="modal-body">
											
											<div id="modifSemestre"></div>
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
											
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="editSemestre" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
							      <div class="modal-dialog">
							   		 <div class="modal-content">
							         	 <div class="modal-header">
							      		 	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
							       			 <h4 class="modal-title custom_align" id="Heading">Mettre à jour</h4>
							      		</div>

							         	 <div class="modal-body">
							        	  

							      		  <div id='semestreAModifier'></div>
							      </div>
							          <div class="modal-footer ">
							        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onclick="updateSemestre()"><span class="glyphicon glyphicon-ok-sign"></span> Mettre à jour</button>
							      </div>
							    </div> <!-- /.modal-content -->
							    
							  </div> <!-- /.modal-dialog --> 
							      
							 </div>


							  <!--Modals de suppression de programmes-->    


							<div class="modal fade" id="supprimerSemestre">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Suppression d'un semestre</h4>
										</div>
										<div class="modal-body">
											<div id="suppSemestre"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
											
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="deleteSemestre" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
							      <div class="modal-dialog">
							   		 <div class="modal-content">
							         	 <div class="modal-header">
							      		 	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
							       			 <h4 class="modal-title custom_align" id="Heading">Suppression</h4>
							      		</div>

							         	 <div class="modal-body">

							         	 		 <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtez-vous que vous voulez supprimer cet élément ?</div>
							         	 		 <div id= "semestreASupprimer"></div>
							        	 		
							     		 </div>
							          <div class="modal-footer ">
							        	<button type="button" class="btn btn-success" onclick="deleteSemestre()"><span class="glyphicon glyphicon-ok-sign"></span> Supprimer</button>
							        	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
							      	</div>
							       </div><!-- /.modal-content --> 
							    
							  </div> <!-- /.modal-dialog --> 
							     
							</div>

							<!--Modals d'affichage de programmes-->    


							<div class="modal fade" id="affichSemestreProg">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Affichage de semestres par programme</h4>
										</div>
										<div class="modal-body">
											<div class="form-group col-sm-12">

												<label for="progr_semestre">Sélectionnez un programme:</label>
												<select name="progr_semestre" id="progr_semestre" class="form-control" required="required" onchange="getSemestresSpecified()">
														<!--Liste des programmes-->
												</select>
													
											</div>
											<div class="form-group col-sm-12">
												<div id="affichSemestre"></div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
											
										</div>
									</div>
								</div>
							</div>

							
					


					
	
				</section> 
			
		</div>
	</div>

		
	




</body>
</html>