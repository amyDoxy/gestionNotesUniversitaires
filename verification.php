<?php
	require_once 'connexionDB.php';
	$tablename = "UDM_profileUtilisateur";
	
	if(!empty($_POST))
	{
		
		$username= (isset ($_POST['username']))? trim($_POST ['username'] ):"";
		$motDePasse= (isset ($_POST['motDePasse'])) ? trim($_POST['motDePasse'] ):"";
		$mdp = md5($motDePasse);


		$stmt = $conn->prepare("SELECT username, motDePasse FROM $tablename where username= :username AND motDePasse= :mdp"); 
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':mdp', $mdp);
		$stmt->execute();
	
		
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
    		
    		$_SESSION['UserData'] = array('username'=>$row['username']);
    			if($_SESSION['UserData']){
    				//print_r($_SESSION['UserData']); 
    			//	header("location:index.php");
    				echo "success";


    				
    			}
    		
    		
    		
		}
		else
		{
			echo "erreur";
		}


		
		

	}

	
	

?>