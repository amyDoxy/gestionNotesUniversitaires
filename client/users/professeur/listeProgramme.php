<?php
	require "../../../connexionDB.php";
	require "../../../includes/functions.php";
	require "../../../includes/verificationSession.php";
	
	header("Content-Type:text/xml");
	$data = get_user_data($conn, $_SESSION['UserData']['username']);
	$username ="";
	foreach ($data as $row) {
		$username = $row['username'];
	}
	$rootXml = 'programme';
	
	$sql = 'SELECT DISTINCT id_programme, intitule_programme  

			FROM UDM_programme P

			WHERE P.dept in ( SELECT departement

											FROM  UDM_universitaire U

											WHERE U.username= "'.$username.'" )
									
			ORDER BY intitule_programme';


	$result= sqlSousXml(executeSql($conn, $sql), $rootXml);
	echo $result; 


?>	