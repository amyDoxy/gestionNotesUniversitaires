


   function stockerModule(){

      var libelle_du_module = $("#libelle_du_module").val();
      var pole_du_module = $("#pole_du_module").val();
      var credit_du_module = $("#credit_du_module").val();
      var notation_du_cours = $("#notation_du_cours").val();
      var notation_des_tp = $("#notation_des_tp").val();
      var notation_des_td = $("#notation_des_td").val();
      var notation_des_ds = $("#notation_des_ds").val();

      var nb_heure_module = $("#nb_heure_module").val();
      var dispensateur_du_module = $("#dispensateur_du_module").val();

      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200)
      {
        alert(this.responseText);
              
      }
    };
    xhttp.open("GET", "./gestionModules/creationModule.php?libelle_du_module="+libelle_du_module+"&pole_du_module="+pole_du_module+"&credit_du_module="+credit_du_module+"&nb_heure_module="+nb_heure_module+"&dispensateur_du_module="+dispensateur_du_module+"&notation_du_cours="+notation_du_cours+"&notation_des_tp="+notation_des_tp+"&notation_des_td="+notation_des_td+"&notation_des_ds="+notation_des_ds, true);
    xhttp.send();
      

       
         
      $("#ajoutModule").modal("hide");
  }

   function modifierModule(id_module){


          var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200)
        {
          $('#moduleAModifier').html(this.responseText);
          
                
        }
      };
      xhttp.open("GET", "./gestionModules/modificationModule.php?identifiant_module="+id_module, true);
      xhttp.send();
    

   
       
 }

     function updateModule(){

      var id_unique_module = $("#id_unique_module").val();
      var libelle_module = $('#libelle_module').val();
      var notation_cours = $('#notation_cours').val();
      var notation_tp = $('#notation_tp').val();
      var notation_td = $('#notation_td').val();
      var notation_ds = $('#notation_ds').val();
      var credit_module = $('#credit_module').val();
      var nb_heure = $('#nb_heure').val();


      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200)
      {
        alert(this.responseText);
              
      }
    };
    xhttp.open("GET", "./gestionModules/updateModule.php?id_unique_module="+id_unique_module+"&libelle_module="+libelle_module+"&notation_cours="+notation_cours+"&notation_tp="+notation_tp+"&notation_td="+notation_td+"&notation_ds="+notation_ds+"&credit_module="+credit_module+"&nb_heure="+nb_heure, true);
    xhttp.send();
      

       
         
      $("#editModule").modal("hide");
      $("#listeModules").modal("hide");
    
  }

   function supprimerModule( id_module){
  
    
    

          var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200)
        {
          $('#moduleASupprimer').html(this.responseText);
                
        }
      };
      xhttp.open("GET", "./gestionModules/suppressionModule.php?identifiant_module="+id_module, true);
      xhttp.send();
    

   
}

   function deleteModule(){

      var id_module_suppr = $("#id_module_suppr").val();
      

      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200)
      {
        alert(this.responseText);
              
      }
    };
    xhttp.open("GET", "./gestionModules/deleteModule.php?id_module_suppr="+id_module_suppr, true);
    xhttp.send();
      

       
         
      $("#deleteModule").modal("hide");
      $("#listeModules").modal("hide");
      
  }



//Function getAllProgrammes pour afficher tous les programmes sur la page de création de modules
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
//Functions getSemestreSousSelect

function getSemestreSousSelect(){
  	var progrSelected = $("#progr_semestre").val();

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfSemestreSousSelect(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./gestionProgrammes/listeSemestreSpecified.php?progrSelected="+progrSelected, true);
	xhttp.send();
	return true;
}

  function getListeOfSemestreSousSelect(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("SEMESTRE");

 		
    	if(x.length != 0){
        	var data_semestre = "<select name= 'semestre_programme' id= 'semestre_programme' class='form-group col-sm-12' onchange='getModuleParSem();'><option selected='selected' disabled> --Choississez un semestre --</option>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			data_semestre +="<option value='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'class='form-control'>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</option>";
       			
           		
        	}

        	data_semestre += "</select>";
      		 $("#affichSemestre").html(data_semestre);
             
      		
      	}
      else{
        alert("\nAucun semestre n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }


      

  }
  function getSemestresProg(){
    var progrSelected = $("#intitule_prog").val();

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200)
    {
      getListeOfSemestreProg(this);
      
      
       
             
    }
  };
  xhttp.open("GET", "./gestionProgrammes/listeSemestreSpecified.php?progrSelected="+progrSelected, true);
  xhttp.send();
  return true;
}

  function getListeOfSemestreProg(xml){

      var xmlDoc=xml.responseXML;
    var x = xmlDoc.getElementsByTagName("SEMESTRE");

    
      if(x.length != 0){
          var data_semestre = "<select name= 'semestre_programme' id= 'semestre_programme' class='form-group col-sm-12' onchange='getModuleParSem();'><option selected='selected' disabled> --Choississez un semestre --</option>";
          
        for (i = 0; i < x.length; i++)
          {
            data_semestre +="<option value='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'class='form-control'>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</option>"
            
              
          }

          data_semestre += "</select>";
           $("#affichSemestre").html(data_semestre);
             $("#semestre_du_module").html(data_semestre);
          
        }
      else{
        alert("\nAucun semestre n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }


      

  }

  function getModuleParSem(){

  		var semestSelected = $("#semestre_programme").val();

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
				getListeOfModuleParSem(this);
				
				
			 	 
							 
			} 
		};
		xhttp.open("GET", "./gestionModules/listeModuleParSem.php?semestSelected="+semestSelected, true);
		xhttp.send();
		return true;

  }
  function getListeOfModuleParSem(xml){

    	var xmlDoc=xml.responseXML;
 		var x = xmlDoc.getElementsByTagName("MODULE");

 		
    	if(x.length != 0){
        	var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th>Unité d'enseignement</th><th>Pole</th><th>ID du module</th><th>Libéllé du module</th><th>Cours</th><th>TP</th><th>TD</th><th>DS</th><th>Crédit</th><th>Nombre d'heure</th><th>Dispensateur du module</th><th>Modifier</th><th>Supprimer</th></tr></thead><tbody>";
       		
    		for (i = 0; i < x.length; i++)
       		{
       			
           		table += "<tr id='"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"'><td>"+x[i].getElementsByTagName('DESCRIPTION_UE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DESCRIPTION_POLE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('LIBELLE_MODULE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOTATION_COURS')[0].childNodes[0].nodeValue+"</td>";
              table += "<td>"+x[i].getElementsByTagName('NOTATION_TP')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOTATION_TD')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NOTATION_DS')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('CREDIT_MODULE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('NB_HEURE')[0].childNodes[0].nodeValue+"</td><td>"+x[i].getElementsByTagName('DISPENSATEUR')[0].childNodes[0].nodeValue+"</td>";
              table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"MODIFIER\"><button id = 'btnModifModule"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"' class=\"btn btn-primary btn-md edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editModule\"  onclick=\"modifierModule('"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"')\"><span class=\"glyphicon glyphicon-edit\"></span></button></p></td>";
              table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"SUPPRIMER\"><button id = 'btnSuppModule"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"' class=\"btn btn-danger btn-md delete\" data-title=\"Supprimer\" data-toggle=\"modal\" data-target=\"#deleteModule\"  onclick=\"supprimerModule('"+x[i].getElementsByTagName('ID_MODULE')[0].childNodes[0].nodeValue+"')\"><span class=\"glyphicon glyphicon-eye-close\"></span></button></p></td></tr>";
        	}

        	table += "</tbody></table>";
      		 $("#affichModule").html(table);
      		
      	}
      else{
        $("#affichModule").html("<p style=\"color:red\">Aucun module n'a pu être séléctionné.</p><br/><a href=\"gestionUtilisateurs.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }

//La fonction getPole qui affiche la liste des poles selon le semestre selectionné
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

  function getUniteEns(){
    var semestSelected = $("#semestre_du_module").val();

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200)
    {
      getListeOfUniteEns(this);
      
      
       
             
    }
  };
  xhttp.open("GET", "./gestionModules/listeUniteEns.php?semestSelected="+semestSelected, true);
  xhttp.send();
  return true;
}

  function getListeOfUniteEns(xml){

      var xmlDoc=xml.responseXML;
      var x = xmlDoc.getElementsByTagName("UE");

     
      if(x.length != 0){
          var data_ue = "<option selected='selected' disabled> --Choississez une unité d'enseignement--</option>";
          
        for (i = 0; i < x.length; i++)
          {
            data_ue +="<option value='"+x[i].getElementsByTagName('ID_UE')[0].childNodes[0].nodeValue+"'class='form-control'>UE "+x[i].getElementsByTagName('ID_UE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('DESCRIPTION_UE')[0].childNodes[0].nodeValue+"</option>";
            
              
          }

          
           $("#ue_du_module").html(data_ue);
            
          
        }
      else{
        alert("\nAucune unité d'enseignement n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }


      

  }

  function getPoleModules(){
    var ueSelected = $("#ue_du_module").val();

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200)
    {
      getListeOfPoleModules(this);
      
      
       
             
    }
  };
  xhttp.open("GET", "./gestionModules/listePoleSpecified.php?ueSelected="+ueSelected, true);
  xhttp.send();
  return true;
}

  function getListeOfPoleModules(xml){

      var xmlDoc=xml.responseXML;
    var x = xmlDoc.getElementsByTagName("POLE");

    
      if(x.length != 0){
          var data_pole = "<option selected='selected' disabled> --Choississez un pole --</option>";
          
        for (i = 0; i < x.length; i++)
          {
            data_pole +="<option value='"+x[i].getElementsByTagName('ID_POLE')[0].childNodes[0].nodeValue+"'class='form-control'>"+x[i].getElementsByTagName('DESCRIPTION_POLE')[0].childNodes[0].nodeValue+"</option>";
            
              
          }

          
           $("#pole_du_module").html(data_pole);
            
          
        }
      else{
        alert("\nAucun pole n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }


      

  }
  

  //La fonction getProfModule() qui affiche la liste des professeurs selon le departement selectionné
function getProfModule(){
  var deptSelected = $('#dept').val();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200)
    {
      getListeOfProfModule(this);
      
      
       
             
    }
  };
  xhttp.open("GET", "./gestionModules/listeProf.php?deptSelected="+deptSelected, true);
  xhttp.send();
  return true;
}
  function getListeOfProfModule(xml){

      var xmlDoc=xml.responseXML;
    var x = xmlDoc.getElementsByTagName("PROFESSEUR");

    
      if(x.length != 0){
          var listeProgr ="<option disabled selected hidden>   --  Choississez un dispensateur du module  --  </option>";  
      for (i = 0; i < x.length; i++){
          listeProgr += "<option value='" + x[i].getElementsByTagName("ID_PROFESSEUR")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("PRENOM_UTILISATEUR")[0].childNodes[0].nodeValue+" "+ x[i].getElementsByTagName('NOM_UTILISATEUR')[0].childNodes[0].nodeValue+"</option>";
      }
           $("#dispensateur_du_module").html(listeProgr);
          
        }
        else{
        alert("Aucun professeur n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!\n");
      }
      

  }





		   