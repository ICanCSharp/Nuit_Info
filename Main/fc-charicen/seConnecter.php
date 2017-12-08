<?php

    require_once('connexion.php');

    $log = $_POST['log'];
    $pass = $_POST['password'];


		//echo $log;
		//echo $pass;

    $connexionUser = rechercheLogin($bdd, $log, $pass);
			
		print_r($connexionUser);

    if($connexionUser === false){
			header('Location: index.php?co=0');
		}
      

		$_SESSION['pseudo'] = $connexionUser['Pseudo'];
    $_SESSION['prenom'] = $connexionUser['Prenom'];
    $_SESSION['email'] = $connexionUser['Email'];


    header('Location: index.php');


		echo $_SESSION['pseudo'];
		


    

?>