<?php
	require_once "../../../connexionDB.php";
	require_once "../../../includes/functions.php";
	
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	$username = "";
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$poleSelected = $_GET['poleSelected'];
	if( isset($_GET['poleSelected']) ){
		header("Content-Type:text/xml");
		
		
		$tablename2 = "UDM_pole";
		$tablename3 = "UDM_module";
		$tablename4 = "UDM_universitaire";
		$tablename5 = "UDM_professeur";
	
		
		$rootXml = "module";

		$sql ="SELECT  M.id_module, M.libelle_module
					FROM $tablename2 PO, $tablename3 M
					where  PO.id_pole = M.pole AND M.pole = '".$poleSelected."' AND dispensateur in (SELECT id_professeur FROM $tablename4 U,$tablename5 P WHERE P.universitaire = U.id_universitaire AND U.username = '".$username."') ";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un pole!";
	}
	


?>
