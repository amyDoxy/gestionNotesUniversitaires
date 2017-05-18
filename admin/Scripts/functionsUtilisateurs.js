
 function stockerUtilisateur(){

   		var nom_utilisateur = $("#nom_utilisateur").val();
   		var prenom_utilisateur = $("#prenom_utilisateur").val();
   		var deuxieme_prenom_utilisateur = $("#deuxieme_prenom_utilisateur").val();
   		var email_utilisateur = $("#email_utilisateur").val();
   		var statut_utilisateur = $("#statut_utilisateur").val();
   		var telephone_utilisateur= $("#telephone_utilisateur").val();
   		var adresse_utilisateur= $("#adresse_utilisateur").val();
   		var region_utilisateur = $("#region_utilisateur").val();
   		var ville_utilisateur = $("#ville_utilisateur").val();
   		var pays_utilisateur = $("#pays_utilisateur").val();
   		var departement_utilisateur = $("#departement_utilisateur").val();
   		var type_temps_etude = $("#type_temps_etude").val();
   		var grade_du_professeur =$("#grade_du_professeur").val();
   		var specialite_du_professeur =$("#specialite_du_professeur").val();
      var progr_semestre = $('#progr_semestre').val();
      var semestre_programme =$('#semestre_programme').val();


   		
 
   		var xhttp = new XMLHttpRequest();
   		var lien = "./gestionUtilisateurs/insertUtilisateur.php";

   		//Parametres envoyés à la page PHP 
   		var params = "nom_utilisateur="+nom_utilisateur+"&prenom_utilisateur="+prenom_utilisateur;
   		params += "&deuxieme_prenom_utilisateur="+deuxieme_prenom_utilisateur+"&email_utilisateur="+email_utilisateur;
   		params +="&statut_utilisateur="+statut_utilisateur+"&telephone_utilisateur="+telephone_utilisateur;
   		params += "&adresse_utilisateur="+adresse_utilisateur+"&region_utilisateur="+region_utilisateur;
   		params += "&ville_utilisateur="+ville_utilisateur+"&pays_utilisateur="+pays_utilisateur;
   		params += "&departement_utilisateur="+departement_utilisateur+"&type_temps_etude="+type_temps_etude;
   		params += "&grade_du_professeur="+grade_du_professeur+"&specialite_du_professeur="+specialite_du_professeur;
      params += "&progr_semestre="+progr_semestre+"&semestre_programme="+semestre_programme;

   		xhttp.open("POST", lien, true);

   						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.send(params);
  		

       
         
    	$("#modal-confirmation_creation_utilisateur").modal("hide");
  }



  


 function modifierEtudiant(){
 	
 		$('.edit' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_etud = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#etudiantAModifier').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionUtilisateurs/modificationEtudiant.php?id_etud="+id_etud, true);
			xhttp.send();
		

		});
		   
 }






    function updateEtudiant(){

   		var id_unique_etudiant = $("#id_unique_etudiant").val();
   		var username = $('#username').val();
 		var type = $('#type').val();
 		var departement = $('#departement').val();
		var nom_departement = $('#nom_departement').val();

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionUtilisateurs/updateEtudiant.php?id_unique_etudiant="+id_unique_etudiant+"&username="+username+"&type="+type+"&departement="+departement+"&nom_departement="+nom_departement, true);
		xhttp.send();
  		

       
         
    	$("#editEtudiant").modal("hide");
    	$("#modifierEtudiant").modal("hide");
    	
  }


    function desactiverEtudiant(){
 	
 		
 		$('.desactivate' ).click(function() {
		      var bid, trid; // Declare variables if you don't use var 
		                             // you will bind bid and trid 
		                             // to the window, since you make them global variables.
		      bid = (this.id) ; 	// button ID 
		      trid = $(this).closest('tr').attr('id'); // table row ID 
		      var id_etud = trid;

		      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200)
				{
				 	$('#etudiantADesactiver').html(this.responseText);
								
				}
			};
			xhttp.open("GET", "./gestionUtilisateurs/suppressionEtudiant.php?id_etud="+id_etud, true);
			xhttp.send();
		

		});
}

   function desactivateEtudiant(){

   		var id_etudiant_desactiv = $("#id_etudiant_desactiv").val();
   		

   		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.open("GET", "./gestionUtilisateurs/desactivateEtudiant.php?id_etudiant_desactiv="+id_etudiant_desactiv, true);
		xhttp.send();
  		

       
         
    	$("#desactivate").modal("hide");
    	$("#desactiverEtudiant").modal("hide");
    	
  }


//La fonction getEtudiants pour remplir  le formulaire de mise à jour d'un étudiant
function getEtudiants(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfEtudiant(this);			 
		}
	};
	xhttp.open("GET", "./gestionUtilisateurs/listeEtudiant.php", true);
	xhttp.send();
	return true;
}
  function getListeOfEtudiant(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("ETUDIANT");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID de l'étudiant</th><th>Nom d'utilisateur</th><th>Temps d'étude</th><th>Id du Département</th><th>Département</th><th>Mettre à jour</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('USERNAME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('TYPE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"MODIFIER\"><button id = 'btnModifEtudiant"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-xs edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editEtudiant\"  onclick=\"modifierEtudiant()\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#modifEtudiant").html(table);
      		
      	}
      else{
        $("#modifEtudiant").html("<p style=\"color:red\">Aucun étudiant n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }


 

 

  //Fonction getEtudiantToDesact()  pour supprimer un étudiant

function getEtudiantToDesact(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfEtudiantToDesact(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionUtilisateurs/listeEtudiant.php", true);
	xhttp.send();
	return true;
}
  function getListeOfEtudiantToDesact(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("ETUDIANT");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID de l'étudiant</th><th>Nom d'utilisateur</th><th>Temps d'étude</th><th>Id du Département</th><th>Département</th><th>Désactiver</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('USERNAME')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('TYPE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOM_DEPARTEMENT')[0].childNodes[0].nodeValue+"</td><td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"DESACTIVER\"><button id = 'btnDesactEtudiant"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"' class=\"btn btn-default btn-xs desactivate\" data-title=\"Desactiver\" data-toggle=\"modal\" data-target=\"#desactivate\"  onclick=\"desactiverEtudiant()\"><span class=\"glyphicon glyphicon-eye-close\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 
      		 $("#desactEtudiant").html(table);
      	}
      else{
        $("#desactEtudiant").html("<p style=\"color:red\">Aucun étudiant n'a pu être séléctionné.</p><br/><a href=\"gestionProgrammes.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

//Function getAllProgrammes pour afficher tous les programmes sur le modal d'affichage des etudiants par programmes
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

  function getProgrParDept(){
  var deptSelected = $('#departement_utilisateur').val();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200)
    {
      getListeOfProgr(this);
      
      
       
             
    }
  };
  xhttp.open("GET", "./gestionUtilisateurs/listeProgSpecified.php?deptSelected="+deptSelected, true);
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
           $("#progr_semestre").html(listeProgr);
          
        }
        else{
        alert("Aucun programme n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!\n");
      }
      

  }
//Functions getSemestre

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
        	var data_semestre = "<select name= 'semestre_programme' id= 'semestre_programme' class='form-group col-sm-12' onchange='getEtudiantParSem();'><option selected='selected' disabled> --Choississez un semestre --</option>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			data_semestre +="<option value='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'class='form-control'>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</option>"
       			
           		
        	}

        	data_semestre += "</select>";
      		 $("#affichSemestre").html(data_semestre);
      		
      	}
      else{
        $("#affichSemestre").html("<p style=\"color:red\">Aucun semestre n'a pu être séléctionné.</p><br/><a href=\"gestionSemestres.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }


      

  }

  function getEtudiantParSem(){

  		var semestSelected = $("#semestre_programme").val();

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
				getListeOfEtudiantParSem(this);
				
				
			 	 
							 
			}
		};
		xhttp.open("GET", "./gestionUtilisateurs/listeEtudiantParSem.php?semestSelected="+semestSelected, true);
		xhttp.send();
		return true;

  }
  function getListeOfEtudiantParSem(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("ETUDIANT");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>ID Etudiant</th><th>Type</th><th>Semestre</th><th>Username</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('ID_ETUDIANT')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('TYPE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('USERNAME')[0].childNodes[0].nodeValue+"</td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#affichEtudiant").html(table);
      		
      	}
      else{
        $("#affichEtudiant").html("<p style=\"color:red\">Aucun étudiant n'a pu être séléctionné.</p><br/><a href=\"gestionUtilisateurs.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }



		   