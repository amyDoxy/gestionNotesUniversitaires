
   function modifierEval(id_eval){


          var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200)
        {
          $('#evalAModifier').html(this.responseText);
          
                
        }
      };
      xhttp.open("GET", "./gestionEvals/modificationEval.php?identifiant_eval="+id_eval, true);
      xhttp.send();
    

   
       
 }

     function updateEval(){

      var id_unique_eval = $("#id_unique_eval").val();
      var libelle_evaluation = $('#libelle_evaluation').val();
      var coeff_evaluation = $('#coeff_evaluation').val();
      var cotation_evaluation= $('#cotation_evaluation').val();
      var date_evaluation = $('#date_evaluation').val();



      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200)
      {
        alert(this.responseText);
        location.reload(false); 
              
      }
    };
    xhttp.open("GET", "./gestionEvals/updateEval.php?id_unique_eval="+id_unique_eval+"&libelle_evaluation="+libelle_evaluation+"&coeff_evaluation="+coeff_evaluation+"&cotation_evaluation="+cotation_evaluation+"&date_evaluation="+date_evaluation, true);
    xhttp.send();
      

       
         
      $("#editEval").modal("hide");
   
  }



//La fonction getBatch pour remplir la place vide de Batch du formulaire de creation d'une nouvelle evaluation
function getProgramme(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
		 	getListOfProgrammes(this);
						
		}
	};
	xhttp.open("GET", "./listeProgramme.php", true);
	xhttp.send();
}

function getListOfProgrammes(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("PROGRAMME");
		
		var listProg ="<option disabled selected hidden>   --  Choississez un programme  --  </option>";	
		for (i = 0; i < x.length; i++){
				listProg += "<option value='" + x[i].getElementsByTagName("ID_PROGRAMME")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("INTITULE_PROGRAMME")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#programme").html(listProg);
}

  function getSemestresSpecified(){
  	var progrSelected = $("#programme").val();

  

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
			getListeOfSemestreSpecified(this);
			
			
		 	 
						 
		}
	};
	xhttp.open("GET", "./listeSemestreSpecified.php?progrSelected="+progrSelected, true);
	xhttp.send();
	return true;
}
  function getListeOfSemestreSpecified(xml){

  		var xmlDoc=xml.responseXML;
    	var x = xmlDoc.getElementsByTagName("SEMESTRE");

    
      if(x.length != 0){
          var data_semestre = "<select name= 'semestre_programme' id= 'semestre_programme' class='form-group col-sm-12' onchange='getModuleParSem();'><option selected='selected' disabled> --Choississez un semestre --</option>";
          
        for (i = 0; i < x.length; i++)
          {
            data_semestre +="<option value='"+x[i].getElementsByTagName('ID_SEMESTRE')[0].childNodes[0].nodeValue+"'class='form-control'>"+x[i].getElementsByTagName('LIBELLE_SEMESTRE')[0].childNodes[0].nodeValue+" - "+x[i].getElementsByTagName('ANNEE')[0].childNodes[0].nodeValue+"</option>"
            
              
          }

          data_semestre += "</select>";
           $("#semestre").html(data_semestre);
            
          
        }
      else{
        alert("\nAucun semestre n'a pu être séléctionné.\nVeuillez recommencer s'il vous plait!!!");
      }
      

  }


//Fonction pour recuperer les types d'evaluations existant dans la BD
function getType(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
		 	getListOfTypes(this);
						
		}
	};
	xhttp.open("GET", "./listeTypeEval.php", true);
	xhttp.send();
}

function getListOfTypes(xml){
				
		var i;
		var xmlDoc = xml.responseXML;;
		var x = xmlDoc.getElementsByTagName("TYPE");
		var listType ="<option disabled selected hidden>   --  Choississez le type de cette evaluation  --  </option>";	
		for (i = 0; i < x.length; i++){
				listType += "<option value='" + x[i].getElementsByTagName("CODE")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("CODE")[0].childNodes[0].nodeValue+" - "+ x[i].getElementsByTagName("NOM")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#typeEval").html(listType);
}



//Fonction recuperant la liste des modules selon le semestre selectionné

function getModule(){
	var xhttp = new XMLHttpRequest();
	var semestSelected = $('#semestre').val();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
		 	getListOfModules(this);
						
		}
	};
	xhttp.open("GET", "./listeModule.php?semestSelected="+semestSelected, true);
	xhttp.send();
}

function getListOfModules(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("MODULE");
		//alert("Le nombre de batch est " +x.length);
		var listModule ="<option disabled selected hidden>   --  Choississez un module  --  </option>";	
		if (x.length != 0){
			for (i = 0; i < x.length; i++){
			listModule += "<option value='" + x[i].getElementsByTagName("ID_MODULE")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("LIBELLE_MODULE")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#moduleEvaluation").html(listModule);
		}
		else{
			alert("Aucun module pour le semestre selectionné!\nVous ne dispensez peut etre aucun module dans le programme séléctionné!\nVeuillez signaler ce probleme!");
		}
		
		
}

//Fonction recuperant la liste des modules selon le semestre selectionné

function getModuleParPole(){
	var xhttp = new XMLHttpRequest();
	var poleSelected = $('#pole').val();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200)
		{
		 	getListModulesParPoles(this);
						
		}
	};
	xhttp.open("GET", "./listeModulePole.php?poleSelected="+poleSelected, true);
	xhttp.send();
}

function getListModulesParPoles(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("MODULE");
		//alert("Le nombre de batch est " +x.length);
		var listModule ="<option disabled selected hidden>   --  Choississez un module  --  </option>";	
		if (x.length != 0){
			for (i = 0; i < x.length; i++){
			listModule += "<option value='" + x[i].getElementsByTagName("ID_MODULE")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("LIBELLE_MODULE")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#moduleEvaluation").html(listModule);
		}
		else{
			alert("Aucun module pour le pole selectionné!\nVous ne dispensez peut etre aucun module dans le pole séléctionné!\nVeuillez signaler ce probleme!");
		}
		
		
}


//Fonction recuperant la liste des etudiants selon le semestre et le type(temps partiel ou temps plein) selectionnés

function affichageEtudiant(){
	var xhttp = new XMLHttpRequest();
	var semestreSelected = $('#semestre').val();
	var type = $('input[name=type-etudiant]:checked', '#creationEvaluation').val()
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEtudiant(this);
     }

    
  };
  xhttp.open("GET", "./listeEtudiant.php?semestreSelected="+semestreSelected+"&type="+type, true);
  xhttp.send();
}

  function getListeEtudiant(json){

      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.etudiants.length;         
      //alert(data.etudiants[0].nom);
      //alert("le nombre d'etudiants est: " +length);

      if(length != 0){
        var table = "<table class = 'table table-hover table-bordered table-striped'><thead><tr><th><input type = 'checkbox' id='selectAll' onchange=\"checkAll()\">  Tout Séléctionné </th><th>Nom</th><th>Prenom</th></tr></thead><tbody>";
        for (i = 0; i < length; i++)
        {
        	var j = i+1;
           table += "<tr><td><input type = 'checkbox' class = 'selection' name = 'selectionEtudiant[]' value= '"+data.etudiants[i].username+"'></td><td>"+data.etudiants[i].nom_utilisateur+"</td><td class=\"text-right\">"+data.etudiants[i].prenom_utilisateur+"</td></tr>";
        }

        	table += "</tbody></table>";
      	 $("#listeEtudiant").html(table);
      }
      else{
        $("#listeEtudiant").html("<p style=\"color:red\">Aucun étudiant n'a pu être séléctionné.</p><br/><a href=\"nouvelle_eval.php\">Veuillez recommencer s'il vous plait!!!</a><br/><br/>");
      }
      

  }


function affichageEvaluations(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEvaluations(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeEvaluations.php?moduleSelected="+moduleSelected, true);
  xhttp.send();

  function getListeEvaluations(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>    <th class="col-sm-1">Identifiant</th>                <th class="col-sm-1">Catégories</th>     <th class="col-sm-1">Libellé de l\'évaluation</th>                 <th class="col-sm-1">Cotation</th>     <th class="col-sm-1">Coefficient de l\'évaluation</th>    <th  class="col-sm-2">Echeance de l\'évaluation</th>  <th class="col-sm-1">Crédit du module</th>     <th class="col-sm-1">Participants</th>    <th class="col-sm-1">Modifier</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
          var now = new Date();
          var dateEval = new Date((data[i].date_evaluation));
          var couleur = ""; 
          if (now < dateEval) { couleur = "#e6e6fa";}else if(now == dateEval) {couleur ="#F2D4F1" ;}else{couleur = "#fcfcfc"; }
          
           table += "<tr bgcolor="+couleur+"><td>"+data[i].id_evaluation+"</td><td>"+data[i].type_eval+"</td><td>"+data[i].libelle_evaluation+"</td><td>"+data[i].cotation_evaluation+"</td><td>"+data[i].coeff_evaluation+"</td><td>"+data[i].date_evaluation+"</td><td>"+data[i].credit_module+"</td>";
           table += "<td>";
           var participants = data[i].participants.length;
           if(participants == 0){
            table += "0";
           }
           for(j = 0; j < participants; j++)
           {
            table += data[i].participants[j].username_etudiant+ ", ";
           }
           table += "</td>"
           
           table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"MODIFIER\"><button id = 'btnModifEval"+data[i].id_evaluation+"' class=\"btn btn-primary btn-md edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editEval\"  onclick=\"modifierEval('"+data[i].id_evaluation+"')\"><span class=\"glyphicon glyphicon-edit\"></span></button></p></td></tr>";
        }
        table += '</tbody></table>';

        $("#listeEvaluations").html(table);
      }
      else{
        $("#listeEvaluations").html("<p style='color: red;'>Aucune évaluation n'a pu être séléctionnée</p");
      }
     

  }
}
function affichageTP(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEvalSpec(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeTP.php?moduleSelected="+moduleSelected, true);
  xhttp.send();
}
function affichageTD(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEvalSpec(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeTD.php?moduleSelected="+moduleSelected, true);
  xhttp.send();
}
function affichageDS(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEvalSpec(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeDS.php?moduleSelected="+moduleSelected, true);
  xhttp.send();
}


  function getListeEvalSpec(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>    <th class="col-sm-1">Identifiant</th>       <th class="col-sm-1">Libellé de l\'évaluation</th>                 <th class="col-sm-1">Cotation</th>     <th class="col-sm-1">Coefficient de l\'évaluation</th>    <th  class="col-sm-2">Echeance de l\'évaluation</th>  <th class="col-sm-1">Crédit du module</th>     <th class="col-sm-1">Participants</th>    <th class="col-sm-1">Modifier</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
           table += "<tr><td>"+data[i].id_evaluation+"</td><td>"+data[i].libelle_evaluation+"</td><td>"+data[i].cotation_evaluation+"</td><td>"+data[i].coeff_evaluation+"</td><td>"+data[i].date_evaluation+"</td><td>"+data[i].credit_module+"</td>";
           table += "<td>";
           var participants = data[i].participants.length;
           if(participants == 0){
            table += "0";
           }
           for(j = 0; j < participants; j++)
           {
            table += data[i].participants[j].username_etudiant+ ", ";
           }
           table += "</td>"
           
           table += "<td class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"MODIFIER\"><button id = 'btnModifEval"+data[i].id_evaluation+"' class=\"btn btn-primary btn-md edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editEval\"  onclick=\"modifierEval('"+data[i].id_evaluation+"')\"><span class=\"glyphicon glyphicon-edit\"></span></button></p></td></tr>";
        }
        table += '</tbody></table>';

        $("#listeEvaluations").html(table);
      }
      else{
        $("#listeEvaluations").html("<p style='color: red;'>Aucune évaluation n'a pu être séléctionnée</p");
      }
     

  }





//FOnction appellée des qu'on clique sur le boutton sauvegardé du modal de la page nouvelle_eval.php

  function stockerEtudiant(){
  		
    var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        
       
        $("#etudiantParticipants").val(val);
    	$("#modalEtudiants").modal("hide");
  }

  function getDataInserted(){
    var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        
       
         //$("#etudiantParticipants").val(val);


  	var programme = $('#programme').val();
  	var semestre = $('#semestre').val();
  	var module =  $('#moduleEvaluation').val();
  	var typeEval = $('#typeEval').val();
  	var coeffEval = $('#coeffEval').val();
  	var cotationEval = $('#cotationEval').val();
  	var libelleEval= $('#libelleEval').val();
  	var etudiantParticipants = [];
  	etudiantParticipants = val;
    etudiantParticipants = JSON.stringify(etudiantParticipants);
  	var dateEval = $('#dateEval').val();
    
  	
  	var data = "";

  	data +=	"<p>Programme: "+programme+"</p><p>Semestre: "+semestre+"</p><p>Module: "+module+"</p>";
  	data += "<p>Type d'évaluation: "+typeEval+"</p><p>Coefficient de l'évaluation: "+coeffEval+"</p>";
  	data += "<p>Cotation: "+cotationEval+"</p><p>Description de l'évaluation: "+libelleEval+"</p>";
  	data += "<p>Participants: "+etudiantParticipants+"</p><br><p>Date de l'évaluation: "+dateEval+"</p>";
  	data += "<input type='hidden' id = 'programmeHidden' value='"+programme+"'>";
  	data += "<input type='hidden' id = 'semestreHidden' value='"+semestre+"'>";
  	data += "<input type='hidden' id = 'moduleEvaluationHidden' value='"+module+"'>";
  	data += "<input type='hidden' id = 'typeEvalHidden' value='"+typeEval+"'>";
  	data += "<input type='hidden' id = 'coeffEvalHidden' value='"+coeffEval+"'>";
  	data += "<input type='hidden' id = 'cotationEvalHidden' value='"+cotationEval+"'>";
  	data += "<input type='hidden' id = 'libelleEvalHidden' value='"+libelleEval+"'>";
  	data += "<input type='hidden' id = 'etudiantParticipantsHidden' value='"+etudiantParticipants+"'>";
  	data += "<input type='hidden' id = 'dateEvalHidden' value='"+dateEval+"'>";

  	$('#data_module').html(data);

  }

function sendForm(){
	/*var form = $("#creationEvaluation");
  	form.submit();*/
  	
  	var module =  $('#moduleEvaluationHidden').val();
  	var typeEval = $('#typeEvalHidden').val();
  	var coeffEval = $('#coeffEvalHidden').val();
  	var cotationEval = $('#cotationEvalHidden').val();
  	var libelleEval= $('#libelleEvalHidden').val();
  	var etudiantParticipants = $('#etudiantParticipantsHidden').val();
  	var dateEval = $('#dateEvalHidden').val();


  		var xhttp = new XMLHttpRequest();
   		var lien = "creationEval.php";

   		//Parametres envoyés à la page PHP 
   		var params = "moduleEvaluation="+module+"&libelleEval="+libelleEval;
   		params += "&coeffEval="+coeffEval+"&cotationEval="+cotationEval;
   		params +="&typeEval="+typeEval+"&dateEval="+dateEval;
   		params += "&etudiantParticipants="+etudiantParticipants;
   		

   		xhttp.open("POST", lien, true);

   		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	alert(this.responseText);
							
			}
		};
		xhttp.send(params);
  		

       
         
    	$("#ajoutModule").modal("hide");
}

function getPole(){
	var semestre = $('#semestre').val();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	getListePoles(this);
							
			}
		};
	xhttp.open("GET", "./listePole.php?semestSelected="+semestre, true);
	xhttp.send();
}
function getListePoles(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("POLE");
		var listPole ="<option disabled selected hidden>   --  Choississez un pole  --  </option>";	
		if (x.length != 0){
			for (i = 0; i < x.length; i++){
			listPole += "<option value='" + x[i].getElementsByTagName("ID_POLE")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("DESCRIPTION_POLE")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#pole").html(listPole);
		}
		else{
			alert("Aucun pole pour le semestre selectionné!!");
		}
		
		
}


function getTypeEvaluations(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
			 	getListeTypesEvaluations(this);
							
			}
		};
	xhttp.open("GET", "./gestionEvals/listeTypeEvalSpecified.php?moduleSelected="+moduleSelected, true);
	xhttp.send();
}
function getListeTypesEvaluations(xml){
				
		var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("TYPE_EVALUATION");
		var listPole ="<option disabled selected hidden>   --  Choississez un type  --  </option>";	
		if (x.length != 0){
			for (i = 0; i < x.length; i++){
			listPole += "<option value='" + x[i].getElementsByTagName("TYPE_EVAL")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("TYPE_EVAL")[0].childNodes[0].nodeValue+"</option>";
		}
				
		$("#typeEvaluation").html(listPole);
		}
		else{
			alert("Aucun type d'évaluation sélectionné!!");
		}
		
		
}


function getEvalsSpecificied(){
	var moduleSelected = $('#moduleEvaluation').val();
	var typeSelected = $('#typeEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		ListeEvaluationsSpecified(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeAllEvalsSpecified.php?moduleSelected="+moduleSelected+"&typeSelected="+typeSelected, true);
  xhttp.send();
 }

  function ListeEvaluationsSpecified(xml){
      	var i;
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("EVALUATION");
		var listEval ="<option disabled selected hidden>   --  Choississez une évaluation --  </option>";	
		if (x.length != 0){
			for (i = 0; i < x.length; i++){
			listEval += "<option value='" + x[i].getElementsByTagName("ID_EVALUATION")[0].childNodes[0].nodeValue+"'>"+ x[i].getElementsByTagName("LIBELLE_EVALUATION")[0].childNodes[0].nodeValue+"</option>";
			}
				
			$("#evaluation").html(listEval);
		}
		else{
			alert("Aucune évaluation pour le types selectionné!!");
		}
     

  
}
function affichageNotes(){
	var evalSelected = $('#evaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		ListeNotes(this);
     }
    };
    xhttp.open("GET", "./gestionEvals/listeNotes.php?evalSelected="+evalSelected, true);
  	xhttp.send(); 
}

function ListeNotes(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<section><table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>    <th>Cotation</th>                <th>Coefficient</th>     <th>Identifiant de l\'étudiant</th>                 <th>Nom d\'utilisateur de l\'étudiant</th>     <th>Points obtenus</th>         <th>Commentaire</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
          var couleur = "";
          var comment = "";
          
           if ( (data[i].cotation_evaluation * 0.8 ) <= data[i].points){
            couleur = "#99ff99";
             comment = 'Très bien';
          }
          else if ( (data[i].cotation_evaluation * 0.7 ) <= data[i].points && (data[i].cotation_evaluation * 0.8 ) > data[i].points){
            couleur = "#f4fff4";
             comment = 'Bien';
          }
          else if ( (data[i].cotation_evaluation * 0.6 ) <= data[i].points && (data[i].cotation_evaluation * 0.7 ) > data[i].points){
            couleur = "#f1f1f2";
            comment = 'Assez bien';
          }
          else if( (data[i].cotation_evaluation * 0.4 ) <= data[i].points && (data[i].cotation_evaluation * 0.6 ) > data[i].points){
              couleur = "#f7f6f2";
              comment = 'Passable';
          }
          else if( (data[i].cotation_evaluation * 0.4 ) >= data[i].points){
              couleur = "#ffb2b2";
              comment = 'Echoué';
          }

           table += "<tr bgcolor='"+couleur+"'><td>"+data[i].cotation_evaluation+"</td><td>"+data[i].coeff_evaluation+"</td><td>"+data[i].id_etudiant+"</td><td>"+data[i].username_etudiant+"</td><td>"+data[i].points+"</td>";
           table += "<td>"+comment+"</td></tr>";
        }
        table += '</tbody></table></section>';

        $("#listeNotes").html(table);
      }
      else{
        $("#listeNotes").html("<section><p style='color: red;'>Aucune note n'a pu être séléctionnée</p></section");
      }
     

  }

 function affichageNotesParType(){
  var moduleSelected = $('#moduleEvaluation').val();
    var typeSelected = $('#typeEvaluation').val();
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
        ListeNotesParType(this);
     }
    };
    xhttp.open("GET", "./gestionEvals/ListeNotesParType.php?moduleSelected="+moduleSelected+"&typeSelected="+typeSelected, true);
    xhttp.send(); 
}

function ListeNotesParType(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<section><table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>    <th>Type d\'évaluation</th>        <th>Identifiant de l\'étudiant</th>        <th>Nom de l\'étudiant</th>     <th>Prenom de l\'étudiant</th>         <th>Total des coefficeients</th>  <th>Total coefficienté</th>   <th>Moyenne pondérée ( .. /20)</th>      <th>Commentaire</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
          var couleur = "";
          var comment = "";
          var moyenne =  data[i].moyenne;
           if ( (20 * 0.8 ) <= moyenne){
            couleur = "#99ff99";
             comment = 'Très bien';
          }
          else if ( (20 * 0.7 ) <= moyenne && (20 * 0.8 ) > moyenne){
            couleur = "#f4fff4";
             comment = 'Bien';
          }
          else if ( (20 * 0.6 ) <= moyenne && (20 * 0.7 ) > moyenne){
            couleur = "#f1f1f2";
            comment = 'Assez bien';
          }
          else if( (20 * 0.4 ) <= moyenne && (20 * 0.6 ) > moyenne){
              couleur = "#f7f6f2";
              comment = 'Passable';
          }
          else if( (20 * 0.4 ) >= moyenne){
              couleur = "#ffb2b2";
              comment = 'Echoué';
          }

           table += "<tr bgcolor='"+couleur+"'><td>"+data[i].type_eval+"</td><td>"+data[i].id_etudiant+"</td><td>"+data[i].nom_utilisateur+"</td><td>"+data[i].prenom_utilisateur+"</td><td>"+data[i].total_coeff+"</td><td>"+data[i].total+"</td>";
           table += "<td>"+moyenne+"</td><td>"+comment+"</td></tr>";
        }
        table += '</tbody></table></section>';

        $("#listeNotes").html(table);
      }
      else{
        $("#listeNotes").html("<section><p style='color: red;'>Aucune note n'a pu être séléctionnée</p></section");
      }
     

  }
  

 function affichageNotesParModule(){
  var moduleSelected = $('#moduleEvaluation').val();
    
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
        ListeNotesParModule(this);
     }
    };
    xhttp.open("GET", "./gestionEvals/listeNotesParModule.php?moduleSelected="+moduleSelected, true);
    xhttp.send(); 
}

function ListeNotesParModule(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<section><table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>      <th>Total</th>  <th>TP</th> <th>TD</th>  <th>DS</th>      <th>Identifiant de l\'étudiant</th>        <th>Nom de l\'étudiant</th>     <th>Prenom de l\'étudiant</th>   <th>Total des TPs</th>   <th>Total des TDs</th>   <th>Total des DS </th> <th>Moyenne pondérée</th>      <th>Commentaire</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
          var total = (data[i].notation_tp *1 + data[i].notation_td*1 +data[i].notation_ds*1);
          var totalEv = (data[i].notation_tp *1 + data[i].notation_td*1 +data[i].notation_ds*1);

           table += "<tr><td>"+totalEv+"</td><td>"+data[i].notation_tp+"</td><td>"+data[i].notation_td+"</td><td>"+data[i].notation_ds+"</td><td>"+data[i].id_etudiant+"</td><td>"+data[i].nom_utilisateur+"</td><td>"+data[i].prenom_utilisateur+"</td>";
           for (var j = 0; j < data[i].notes.length; j++) {

                var couleur = "";
                var comment = "";
                var moyenne =  (data[i].notes[j].moyenne_tp *1 + data[i].notes[j].moyenne_td*1 +data[i].notes[j].moyenne_ds*1);
                moyenne = moyenne.toFixed(2);
                if(data[i].notes[j].moyenne_tp == 0){
                    total = ( data[i].notation_td*1 +data[i].notation_ds*1);
                }else if(data[i].notes[j].moyenne_td == 0){
                    total = ( data[i].notation_tp*1 +data[i].notation_ds*1);
                }else if(data[i].notes[j].moyenne_ds == 0){
                    total = ( data[i].notation_td*1 +data[i].notation_tp*1);
                }
                if ( (total * 0.8 ) <= moyenne){
                  couleur = "#99ff99";
                   comment = 'Très bien';
                }
                else if ( (total * 0.7 ) <= moyenne && (total * 0.8 ) > moyenne){
                  couleur = "#f4fff4";
                   comment = 'Bien';
                }
                else if ( (total * 0.6 ) <= moyenne && (total* 0.7 ) > moyenne){
                  couleur = "#f1f1f2";
                  comment = 'Assez bien';
                }
                else if( (total * 0.4 ) <= moyenne && (total * 0.6 ) > moyenne){
                    couleur = "#f7f6f2";
                    comment = 'Passable';
                }
                else if( (total * 0.4 ) >= moyenne){
                    couleur = "#ffb2b2";
                    comment = 'Echoué';
                }
              
               table += "<td bgcolor="+couleur+">"+data[i].notes[j].moyenne_tp+"</td><td bgcolor="+couleur+">"+data[i].notes[j].moyenne_td+"</td><td bgcolor="+couleur+">"+data[i].notes[j].moyenne_ds+"</td>";
                      
                table += "<td bgcolor="+couleur+">"+moyenne+"/ "+total+"</td><td bgcolor="+couleur+">"+comment+"</td></tr>"; 


           }

           
        }
        table += '</tbody></table></section>';

        $("#listeNotes").html(table);
      }
      else{
        $("#listeNotes").html("<section><p style='color: red;'>Aucune note n'a pu être séléctionnée</p></section");
      }
     

  }  


function getAllEvaluations(){
	var moduleSelected = $('#moduleEvaluation').val();
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		ListeEvaluations(this);
     }
 
    
  };
  xhttp.open("GET", "./gestionEvals/listeAllEvaluations.php?moduleSelected="+moduleSelected, true);
  xhttp.send();

  function ListeEvaluations(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.length; 
      // alert(length);
      
     if(length != 0){
        
       var table = '<section><table class="table table-hover table-bordered"><thead style=\"background-color: #3dc8d6;color:#fff;\"> <tr>       <th>Libellé du module</th>   <th>Total</th>      <th>Cours</th>  <th>TP</th>  <th>TD</th> <th>DS</th>  <th>Crédit du module </th>  <th>Nombre d\'heure</th>   <th>Intitulé de l\'évaluation</th>  <th>Cotation de l\'évaluation</th>   <th>Coefficient de l\'évaluation</th>    <th >Echeance de l\'évaluation</th>    <th >Modifier</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
          var taille = data[i].evaluations.length;
          //alert(taille);

           table += "<tr><td rowspan = '"+taille+"'>"+data[i].libelle_module+"</td><td rowspan = '"+taille+"'>"+data[i].total_module+"</td>";
           table += "<td rowspan = '"+taille+"'>"+data[i].notation_cours+"</td><td rowspan = '"+taille+"'>"+data[i].notation_tp+"</td><td rowspan = '"+taille+"'>"+data[i].notation_td+"</td><td rowspan = '"+taille+"'>"+data[i].notation_ds+"</td><td rowspan = '"+taille+"'>"+data[i].credit_module+"</td>";
           table += "<td rowspan = '"+taille+"'>"+data[i].nb_heure+"</td>";
           for (var j = 0; j < taille; j++) {
                var couleur = '#FBFEEC';

                if (data[i].evaluations[j].type_eval.toLowerCase() == 'tp') {
                    couleur = '#FBFEEC';
                }
                else if(data[i].evaluations[j].type_eval.toLowerCase() == 'td'){
                    couleur = '#ECF0FE';
                }
                else if(data[i].evaluations[j].type_eval.toLowerCase() == 'ds'){
                    couleur = '#FFEDFA';
                }

                    table += "<td bgcolor='"+couleur+"'>"+data[i].evaluations[j].libelle_evaluation+"</td><td bgcolor='"+couleur+"'>"+data[i].evaluations[j].cotation_evaluation+"</td><td bgcolor='"+couleur+"'>"+data[i].evaluations[j].coeff_evaluation+"</td>";
                    table += "<td bgcolor='"+couleur+"'>"+data[i].evaluations[j].date_evaluation+"</td>";
                   table += "<td  bgcolor='"+couleur+"' class=\"text-right\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"MODIFIER\"><button id = 'btnModifEval"+data[i].evaluations[j].id_evaluation+"' class=\"btn btn-primary btn-md edit\" data-title=\"Modifier\" data-toggle=\"modal\" data-target=\"#editEval\"  onclick=\"modifierEval('"+data[i].evaluations[j].id_evaluation+"')\"><span class=\"glyphicon glyphicon-edit\"></span></button></p></td></tr>";

           }
           if(taille == 0){
            alert("Aucune évaluation n'est présente dans le système pour ce module!");
            table += "</tr>";
          }else{

             table += "<tr><td  bgcolor='#FBFEEC'>Coefficient total TP</td><td bgcolor='#FBFEEC'>"+data[i].coeff_tp+"</td><td bgcolor='#FBFEEC'>Total TP</td><td bgcolor='#FBFEEC'>"+data[i].total_tp+"</td><td bgcolor='#ECF0FE'>Coefficient total TD</td><td bgcolor='#ECF0FE'>"+data[i].coeff_td+"</td><td  bgcolor='#ECF0FE'>Total TD</td><td bgcolor='#ECF0FE'>"+data[i].total_td+"</td><td bgcolor='#FFEDFA'>Coefficient total DS</td><td bgcolor='#FFEDFA'>"+data[i].coeff_ds+"</td><td bgcolor='#FFEDFA'>Total DS</td><td colspan = '2' bgcolor='#FFEDFA'>"+data[i].total_ds+"</td></tr>";
            

          }

         
        }
        table += '</tbody></table></section>';
       

        $("#listeEvaluations").html(table);
      }
      else{
        $("#listeEvaluations").html("<p style='color: red;'>Aucune évaluation n'a pu être séléctionnée</p");
      }
     

  }
}



//Function verifiant quel boutton quel utilisateur a choisi dans la categorie des types des evaluations sur la page de consultation des evaluations
$(document).ready(function() {
    $('input[type=radio][name=typeEvaluation]').change(function() {
        if (this.value == 'all') {
           affichageEvaluations();
        }
        else if (this.value == 'tp') {
            affichageTP();
        }
         else if (this.value == 'td') {
           affichageTD();
        }
          else if (this.value == 'ds') {
            affichageDS();
        }
    });
});







 //si la page est prete, appelle la fonction getBatch() et getType ()
$( document ).ready(getProgramme);

$( document ).ready(getType);






