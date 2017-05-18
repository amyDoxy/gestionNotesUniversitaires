


   function stockerSemestre(){

   		var faculte = $("#faculte").val();
   		var dept = $("#dept").val();
   		var identifiant_prog = $("#intitule_prog").val();
   		var libelle_du_semestre = $("#libelle_du_semestre").val();
   		var detail_semestre = $("#detail_du_semestre").val();
   		var annee_semestre = $("#annee_du_semestre").val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/creationSemestre.php?faculte="+faculte+"&dept="+dept+"&identifiant_prog="+identifiant_prog+"&libelle_du_semestre="+libelle_du_semestre+"&detail_semestre="+detail_semestre+"&annee_semestre="+annee_semestre, true);
		xhttp.send();
  		

       
         
    	$("#ajoutSemestre").modal("hide");
  }




  


 function modifierSemestre(){
 	
 		$('.edit' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_semestre = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#semestreAModifier').html(this.responseText);
				 	$('#semestreAffichAModifier').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/modificationSemestre.php?id_semestre="+id_semestre, true);
			xhttp.send();
		

		});
		   
 }





    function updateSemestre(){

   		var id_unique_semestre = $("#id_unique_semestre").val();
   		var libelle_semestre = $('#libelle_semestre').val();
 		var detail_semestre = $('#detail_semestre').val();
 		var annee = $('#annee').val();
		var programme = $('#programme').val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/updateSemestre.php?id_unique_semestre="+id_unique_semestre+"&libelle_semestre="+libelle_semestre+"&detail_semestre="+detail_semestre+"&annee="+annee+"&programme="+programme, true);
		xhttp.send();
  		

       
         
    	$("#edit").modal("hide");
    	$("#modifierProgramme").modal("hide");
    	//$("#modifierProgramme").modal("show");
  }



    function supprimerSemestre(){
 	
 		
 		$('.delete' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_semestre = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#semestreASupprimer').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionProgrammes/suppressionSemestre.php?id_semestre="+id_semestre, true);
			xhttp.send();
		

		});
}

   function deleteSemestre(){

   		var id_semestre_suppr = $("#id_semestre_suppr").val();
   		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionProgrammes/deleteSemestre.php?id_semestre_suppr="+id_semestre_suppr, true);
		xhttp.send();
  		

       
         
    	$("#deleteSemestre").modal("hide");
    	$("#supprimerSemestre").modal("hide");
    	
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
		//$("#faculte_modalDept").html(listeFaculte);

}

//La fonction getDept pour remplir la place vide de Departement du formulaire de creation d'un nouveau semestre
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


function getProgr(){
	var deptSelected = $('#dept').val();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfProgr(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeProgSpecified.php?deptSelected="+deptSelected, true);
	xhttp.send();
	return true;
}
  function getListeOfProgr(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("PROGRAMME");

 		
    	if(x.length != 0){
        	var listeProgr ="<option disabled selected hidden>   --  Choississez un programme  --  </option>";	
			for (i = 0; i < x.length; i++){
					listeProgr += "<option value='" + x[i].getElementsByTagName("ID_PROGRAMME")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("INTITULE_PROGRAMME")[0].childNodes[0].nodeValue+"</option>";
			}
      		 $("#intitule_prog").html(listeProgr);
      		
      	}
      	else{
        alert("Aucun programme n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!\n");
      }
      

  }

//La fonction getSemestre pour remplir  le formulaire de mise à jour d'un  semestre
function getSemestres(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfSemestre(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeSemestre.php", true);
	xhttp.send();
	return true;
}
  function getListeOfSemestre(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("SEMESTRE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Semestre</th><th>Libellé du semestre</th><th>Détail du semestre</th><th>Année</th><th>Programme</th><th>Mettre à jour</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DETAIL_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('PROGRAMME')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Modifier\"><button id = 'btnModifSemestre"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-xs edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editSemestre\"  onclick=\"modifierSemestre()\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#modifSemestre").html(table);
      		
      	}
      else{
        $("#modifSemestre").html("<p style=\"color:red\">Aucun semestre n'a pu être séléctionné.</p><br/><a href=\"gestionSemestre.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
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

  function getAllProgrammes(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfAllProgrammes(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeProgramme.php", true);
	xhttp.send();
	return true;
}
  function getListeOfAllProgrammes(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("PROGRAMME");

 		
    	if(x.length != 0){
        	var listeProgr ="<option disabled selected hidden>   --  Choississez un programme  --  </option>";	
			for (i = 0; i < x.length; i++){
					listeProgr += "<option value='" + x[i].getElementsByTagName("ID_PROGRAMME")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("INTITULE_PROGRAMME")[0].childNodes[0].nodeValue+"</option>";
			}
      		 $("#progr_semestre").html(listeProgr);
      		
      	}
      	else{
        	alert("Aucun programme n'a pu être séléctionné.<br/><a href=\"gestionSemestre.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      	}
      		

     
      

  }

  //Fonction getProgrammesToDel() 'version modifiée de getProgramme()' pour supprimer un programme

function getSemestresToDel(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfSemestreToDel(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeSemestre.php", true);
	xhttp.send();
	return true;
}
  function getListeOfSemestreToDel(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("SEMESTRE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Semestre</th><th>Libellé du semestre</th><th>Detail du semestre</th><th>Année</th><th>Programme</th><th>Supprimer</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DETAIL_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('PROGRAMME')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Supprimer\"><button id = 'btnDelSemestre"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"' class=\"btn btn-danger btn-xs delete\" data-title=\"Supprimer\" data-toggle=\"modal\" data-target=\"#deleteSemestre\"  onclick=\"supprimerSemestre()\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 
      		 $("#suppSemestre").html(table);
      	}
      else{
        $("#suppSemestre").html("<p style=\"color:red\">Aucun semestre n'a pu être séléctionné.</p><br/><a href=\"gestionSemestres.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

  function getSemestresSpecified(){
  	var progrSelected = $("#progr_semestre").val();

  

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfSemestreSpecified(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeSemestreSpecified.php?progrSelected="+progrSelected, true);
	xhttp.send();
	return true;
}
  function getListeOfSemestreSpecified(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("SEMESTRE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Semestre</th><th>Libellé du semestre</th><th>Détail du semestre</th><th>Année</th><th>Programme</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DETAIL_SEMESTRE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('PROGRAMME')[0].childNodes[0].nodeValue+"</td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#affichSemestre").html(table);
      		
      		
      	}
      else{
        alert ("\nAucun semestre n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }
      

  }

  
		   