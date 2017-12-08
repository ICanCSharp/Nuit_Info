<?php


session_start();


header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

if(isset($_GET["variable"])){
	
	$variable1 = $_GET["variable"];
	$variable2 = $_GET["variable2"];
	$_SESSION['coo'] = $variable1;
	$_SESSION['coo2'] = $variable2;

	
}


echo $_SESSION['coo'];
echo $_SESSION['coo2'];

?>