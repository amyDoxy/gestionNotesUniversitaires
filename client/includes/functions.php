<?php
    
    /*Fonction pour recuperer les donnees des utilisateurs*/
    function get_user_data($con, $username){
    	$sql = "SELECT U.username, U.active, I.nom_utilisateur, I.prenom_utilisateur, I.statut FROM UDM_profileUtilisateur U LEFT JOIN UDM_infosUtilisateur I ON U.id_infosUtilisateur=I.id_infosUtilisateur WHERE U.username='$username' LIMIT 1";
    	$result = $con->query($sql);
    	$rows  = $result->fetchAll(PDO::FETCH_ASSOC);
    	$count = count( $rows );
        if($count == 1){
        	//print_r($rows) ;
            return $rows;
        }else{
        	return FALSE;
        }
    }

    /*Fonction prenant comme parametre le nom d'une table et 
    fait une requete dans la base de données
     puis retourne le resultat de la requete
    */
    function getAll($conn,$table){
        $sql = "SELECT * FROM $table";
        $resultat = $conn->query($sql);
        $liste = array();
        while($rows = $resultat->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $key => $value) {
                
                $liste[$key] = $value;
            }
        }

        return $liste;
    }

    function getColumns($conn, $params = array(), $table){
            $count = count($params);
            $colonnes = "";
            for($i = 0; $i < $count; $i++){
                $colonnes .= $params[$i].",";
            }
            $colonnes = substr($colonnes, 0, -1);
             $sql = "SELECT $colonnes FROM $table";
            $resultat = $conn->query($sql);
            $liste = array();
            while($rows = $resultat->fetchAll(PDO::FETCH_ASSOC)) {
                foreach ($rows as $key => $value) {
                    
                    $liste[$key] = $value;
                }
             }

            return $liste;
    }

    function executeSql($conn, $sql){
        try{
            $resultat = $conn->query($sql);
             $liste = array();
             while($rows = $resultat->fetchAll(PDO::FETCH_ASSOC)) {
                    foreach ($rows as $key => $value) {
                     
                    $liste[$key] = $value;
                }
            }

            return $liste;
        }
        catch(PDOException $e){
            echo "Erreur: ".$e->getMessage(); 
        }
         
    }


    // Fonction prenant comme parametre un tableau contenant les resultats d'une requete et l'affiche sous forme d'un tableau

    function sqlSousTable(array $liste){
        $count = count($liste);
        $table = "<table class ='table table-bordered table-striped'><thead><tr>";
        
        foreach ($liste[0] as $key => $value) {
            $table .= "<th>".$key."</th>";
        }
        $table .= "</tr></thead><tbody>";
        for ($i=0; $i < $count ; $i++) { 
            $table .= "<tr>";
            foreach ($liste[$i] as $key => $value) {
                $table .= "<td>".$value."</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody></table>";
        print_r($table);
        
            
    }

    function sqlSousXml(array $liste, $rootXML){
        $count = count($liste);
        $rootXML = strtoupper($rootXML);
        $head ="<".$rootXML."S>";
        $footer ="</".$rootXML."S>";
        $rootHead = "<".$rootXML.">";
        $rootFooter = "</".$rootXML.">";
        $resultatXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $resultatXML .= $head; 
        for ($i=0; $i < $count; $i++) { 
            $resultatXML .= $rootHead;
           foreach ($liste[$i] as $key => $value) {

                $keyToUpper = strtoupper($key);
                $resultatXML .= "<".$keyToUpper.">".$value."</".$keyToUpper.">";
            }
            $resultatXML .= $rootFooter;
        }
        $resultatXML .= $footer;

        return $resultatXML;
        
    }

    function sqlSousInput(array $liste)
    {
        $count = count($liste);

        $input = "";
        
         for ($i=0; $i < $count; $i++) { 
            $input .= "<div class='form-group'>";
           foreach ($liste[$i] as $key => $value) {

                $input .= "<label for='".$key."'>".$key."</label><input class='form-control' type= 'text' name = '".$key."' id ='".$key."' value ='".$value."'>";
            }
            $input .= "</div>";
        }
       
        echo ($input);
    }




?>