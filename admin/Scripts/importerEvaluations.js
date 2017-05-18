function affichageEvaluations(){
	var xhttp = new XMLHttpRequest();
	/*var batch = $('#batch').val();
	var type = $('input[name=type-etudiant]:checked', '#creationEvaluation').val()*/
  	xhttp.onreadystatechange = function() {
   	 if (this.readyState == 4 && this.status == 200) {
     		getListeEvaluations(this);
     }
 
    
  };
  xhttp.open("GET", "./listeEvaluations.php", true);
  xhttp.send();

  function getListeEvaluations(json){
      var text=json.responseText;
      var data = JSON.parse(text);
      
       var length = data.evaluations.length;         
     
     // alert("le nombre des evaluations est: " +length);

     if(length != 0){
        
       var table = '<table class="table table-hover table-bordered"><thead> <tr>    <th class="col-sm-1">Batch</th>                <th class="col-sm-2">Module</th>                <th class="col-sm-1">Coefficient du module</th>                <th class="col-sm-1">Identifiant de l\'evaluation</th>                <th class="col-sm-2">Libellé de l\'evaluation</th>                <th  class="col-sm-2">Echeance de l\'evaluation</th>                <th class="col-sm-1">Cotation</th>                <th class="col-sm-2">Gestion</th>              </tr>            </thead>            <tbody>';

        for (i = 0; i < length; i++)
        {
           table += "<tr><td>"+data.evaluations[i].batch+"</td><td>"+data.evaluations[i].module+"</td><td>"+data.evaluations[i].coefficient_module+"</td><td>"+data.evaluations[i].id_evaluation+"</td><td>"+data.evaluations[i].libelle_evaluation+"</td><td>"+data.evaluations[i].date_evaluation+"</td><td>"+data.evaluations[i].cotation_evaluation+"</td></tr>";
        }
        table += '</tbody></table>';

        $("#listeEvaluations").html(table);
      }
      else{
        $("#listeEvaluations").text("Aucune évaluation n'a pu etre séléctionné");
      }
     

  }
}
$( document ).ready(affichageEvaluations);
