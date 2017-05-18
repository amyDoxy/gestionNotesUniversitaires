
 function stockerFaculte(){

   		var nom_faculte = $("#nom_faculte").val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/creationFaculte.php?nom_faculte="+nom_faculte, true);
		xhttp.send();
  		

       
         
    	$("#ajouterFaculte").modal("hide");
  }


   function stockerProgramme(){

   		var faculte = $("#faculte").val();
   		var dept = $("#dept").val();
   		var intitule_prog = $("#intitule_prog").val();
   		var cursus = $("#cursus_prog").val();
   		var titre_prog = $("#titre_prog").val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/creationProgramme.php?faculte="+faculte+"&dept="+dept+"&intitule_prog="+intitule_prog+"&cursus="+cursus+"&titre_prog="+titre_prog, true);
		xhttp.send();
  		

       
         
    	$("#ajoutProgramme").modal("hide");
  }

  function stockerDept(){

   		var nom_faculte = $("#faculte_modalDept").val();
   		var nom_dept = $("#nom_dept").val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/creationDept.php?nom_dept="+nom_dept+"&nom_faculte="+nom_faculte, true);
		xhttp.send();
  		

       
         
    	$("#ajoutDept").modal("hide");
  }


  


 function modifierProgramme(){
 	
 		$('.edit' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_prog = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#progrAModifier').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/modificationProgramme.php?id_prog="+id_prog, true);
			xhttp.send();
		

		});
		   
 }

  function modifierDept(){
 	
 		$('.edit' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_dept = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	
						$('#deptAModifier').html(this.responseText);	
				}
			};
			xhttp.open("GET", "./gestionProgrammes/modificationDept.php?id_dept="+id_dept, true);
			xhttp.send();
		

		});
		   
 }

   function modifierFaculte(){
 	
 		$('.edit' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_faculte = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	
						$('#faculteAModifier').html(this.responseText);	
				}
			};
			xhttp.open("GET", "./gestionProgrammes/modificationFac.php?id_faculte="+id_faculte, true);
			xhttp.send();
		

		});
		   
 }




    function updateProgramme(){

   		var id_unique_prog = $("#id_unique_prog").val();
   		var intitule_programme = $('#intitule_programme').val();
 		var cursus = $('#cursus').val();
 		var titre = $('#titre').val();
	

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/updateProgramme.php?id_unique_prog="+id_unique_prog+"&intitule_programme="+intitule_programme+"&cursus="+cursus+"&titre="+titre, true);
		xhttp.send();
  		

       
         
    	$("#edit").modal("hide");
    	$("#modifierProgramme").modal("hide");
    	//$("#modifierProgramme").modal("show");
  }

    function updateDept(){

   		var id_unique_dept = $("#id_unique_dept").val();
   		var nom_departement= $('#nom_departement').val();
 		var faculte_du_dept = $('#faculte_du_dept').val();
		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/updateDept.php?id_unique_dept="+id_unique_dept+"&nom_departement="+nom_departement+"&faculte_du_dept="+faculte_du_dept, true);
		xhttp.send();
  		

       
         
    	$("#editDept").modal("hide");
    	$("#modifierDept").modal("hide");
    	//$("#modifierProgramme").modal("show");
  }
      function updateFac(){

   		
 		var id_unique_fac = $("#id_unique_fac").val();
   		var nom_de_faculte= $('#nom_de_faculte').val();
		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/updateFac.php?id_unique_fac="+id_unique_fac+"&nom_de_faculte="+nom_de_faculte, true);
		xhttp.send();
  		

       
         
    	$("#editFac").modal("hide");
    	$("#modifierFaculte").modal("hide");
    	//$("#modifierProgramme").modal("show");
  }

    function supprimerProgramme(){
 	
 		
 		$('.delete' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_prog = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#progrASupprimer').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/suppressionProgramme.php?id_prog="+id_prog, true);
			xhttp.send();
		

		});
}

   function deleteProgramme(){

   		var id_prog_suppr = $("#id_prog_suppr").val();
   		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/deleteProgramme.php?id_prog_suppr="+id_prog_suppr, true);
		xhttp.send();
  		

       
         
    	$("#delete").modal("hide");
    	$("#supprimerProgramme").modal("hide");
    	
  }

      function supprimerDept(){
 	
 		
 		$('.delete' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_dept = trid;

		      var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#deptASupprimer').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/suppressionDept.php?id_dept="+id_dept, true);
			xhttp.send();
		

		});
}

   function deleteDept(){

   		var id_dept_suppr = $("#id_dept_suppr").val();
   		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/deleteDept.php?id_dept_suppr="+id_dept_suppr, true);
		xhttp.send();
  		

       
         
    	$("#deleteDept").modal("hide");
    	$("#supprimerDept").modal("hide");
    	
  }

      function supprimerFac(){
 	
 		
 		$('.delete' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_fac = trid;

		      var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#facASupprimer').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/suppressionFac.php?id_fac="+id_fac, true);
			xhttp.send();
		

		});
}

   function deleteFac(){

   		var id_fac_suppr = $("#id_fac_suppr").val();
   		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/deleteFac.php?id_fac_suppr="+id_fac_suppr, true);
		xhttp.send();
  		

       
         
    	$("#deleteFac").modal("hide");
    	$("#supprimerFac").modal("hide");
    	
  }

//La fonction getFaculte pour remplir la place vide de Faculte du formulaire de creation d'un nouveau programme
function getFaculte(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			
		 	getListOfFacultes(this);
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeFaculte.php", true);
	xhttp.send();
}

function getListOfFacultes(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("FACULTE");
		//alert("Le nombre de faculte est " +x.length);
		var listeFaculte ="<option disabled selected hidden>   --  Choississez une faculté  --  </option>";	
		for (i = 0; i < x.length; i++){
				listeFaculte += "<option value='" + x[i].getElementsByTagName("NOM_DE_FACULTE")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("NOM_DE_FACULTE")[0].childNodes[0].nodeValue+"</option>";
		}
			
		$("#faculte").html(listeFaculte);
		$("#faculte_modalDept").html(listeFaculte);

}

//La fonction getDept pour remplir la place vide de Departement du formulaire de creation d'un nouveau programme
function getDept(){
	var facSelected = $('#faculte').val();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			
		 	getListOfDept(this);
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeDept.php?facSelected="+facSelected, true);
	xhttp.send();
}

function getListOfDept(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("DEPARTEMENT");
		//alert("Le nombre de departement est " +x.length);
		var listeDept ="<option disabled selected hidden>   --  Choississez un département  --  </option>";	
		for (i = 0; i < x.length; i++){
				listeDept += "<option value='" + x[i].getElementsByTagName("NOM_DEPARTEMENT")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("NOM_DEPARTEMENT")[0].childNodes[0].nodeValue+"</option>";
		}
			
		$("#dept").html(listeDept);
}

//La fonction getProgramme pour remplir  le formulaire de mise à jour d'un  programme
function getProgrammes(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfProgramme(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeProgramme.php", true);
	xhttp.send();
	return true;
}
  function getListeOfProgramme(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("PROGRAMME");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Programme</th><th>Intitulé du programme</th><th>Cursus</th><th>Titre</th><th>Departement</th><th>Mettre à jour</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('INTITULE_PROGRAMME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('CURSUS')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('TITRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DEPT')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button id = 'btnModifProg"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-xs edit\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"#edit\"  onclick=\"modifierProgramme()\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#modifProgramme").html(table);
      		
      	}
      else{
        $("#modifProgramme").html("<p style=\"color:red\">Aucun programme n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }


 //La fonction getDepartements pour remplir  le formulaire de mise à jour d'un departement
function getDepartements(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfDepartement(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeAllDept.php", true);
	xhttp.send();
	return true;
}
  function getListeOfDepartement(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("DEPARTEMENT");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Departement</th><th>Nom du département</th><th>Faculté</th><th>Mettre à jour</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('FACULTE_DU_DEPT')[0].childNodes[0].nodeValue+"</td>";

           		//Ajour de l'icone 'crayon' symbole de modifier

           		table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Modifier\"><button id = 'btnModifDept"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-xs edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editDept\"  onclick=\"modifierDept()\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#modifDept").html(table);
      		
      	}
      else{
        $("#modifDept").html("<p style=\"color:red\">Aucun département n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

  function getAllFacultes(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfAllFacultes(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeAllFaculte.php", true);
	xhttp.send();
	return true;
}
  function getListeOfAllFacultes(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("FACULTE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Faculté</th><th>Nom de la faculté</th><th>Mettre à jour</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DE_FACULTE')[0].childNodes[0].nodeValue+"</td>";

           		//Ajour de l'icone 'crayon' symbole de modifier

           		table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Modifier\"><button id = 'btnModifFac"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-xs edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editFac\"  onclick=\"modifierFaculte()\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#modifFaculte").html(table);
      		
      	}
      else{
        $("#modifFac").html("<p style=\"color:red\">Aucune faculté n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

  //Fonction getProgrammesToDel() 'version modifiée de getProgramme()' pour supprimer un programme

function getProgrammesToDel(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfProgrammeToDel(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeProgramme.php", true);
	xhttp.send();
	return true;
}
  function getListeOfProgrammeToDel(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("PROGRAMME");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Programme</th><th>Intitulé du programme</th><th>Cursus</th><th>Titre</th><th>Departement</th><th>Supprimer</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('INTITULE_PROGRAMME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('CURSUS')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('TITRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DEPT')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button id = 'btnDelProg"+x[i].getElementsByTagName('ID_PROGRAMME')[0].childNodes[0].nodeValue+"' class=\"btn btn-danger btn-xs delete\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\"  onclick=\"supprimerProgramme()\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 
      		 $("#suppProgramme").html(table);
      	}
      else{
        $("#suppProgramme").html("<p style=\"color:red\">Aucun programme n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

  function getDeptToDel(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfDeptToDel(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeAllDept.php", true);
	xhttp.send();
	return true;
}
  function getListeOfDeptToDel(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("DEPARTEMENT");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID DEPARTEMENT</th><th>Nom du département</th><th>Faculté</th><th>Supprimer</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('FACULTE_DU_DEPT')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button id = 'btnDelDept"+x[i].getElementsByTagName('ID_DEPARTEMENT')[0].childNodes[0].nodeValue+"' class=\"btn btn-danger btn-xs delete\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#deleteDept\"  onclick=\"supprimerDept()\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 
      		 $("#suppDept").html(table);
      	}
      else{
        $("#suppDept").html("<p style=\"color:red\">Aucun département n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }
function getFaculteToDel(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfFaculteToDel(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeAllFaculte.php", true);
	xhttp.send();
	return true;
}
  function getListeOfFaculteToDel(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("FACULTE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Faculté</th><th>Nom de la Faculté</th><th>Supprimer</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DE_FACULTE')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button id = 'btnDelFac"+x[i].getElementsByTagName('ID_FACULTE')[0].childNodes[0].nodeValue+"' class=\"btn btn-danger btn-xs delete\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#deleteFac\"  onclick=\"supprimerFac()\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 
      		 $("#suppFac").html(table);
      	}
      else{
        $("#suppFac").html("<p style=\"color:red\">Aucune faculté n'a pu être séléctionnée.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }


		   