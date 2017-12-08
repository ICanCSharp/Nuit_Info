
<?php

	session_start();



  try{

      ini_set('display_errors', 1); 
      header('Access-Control-Allow-Origin:*'); 


			$bdd = new PDO('mysql:host=mysql-descartes.alwaysdata.net;dbname=descartes_bddnuitinfo;charset=utf8', 'descartes','lpinfo');
			$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $er){
		        die('<p> Erreur['.$er->getCode().'] : '.$er->getMessage().'</p>');
		}


	function getEvent($bdd, $id){
			
		$string = "SELECT e.`NomEvent`, t.Libelle, e.`Alcool`, a.Numero, a.Rue, a.Ville_CP, e.`Heure_debut`, e.`Heure_fin`, e.`Description` ";
		$string .= "FROM `Event` e, `Adresse` a, `TypeEvent` t ";
		$string .= "WHERE e.Adresse_idAdresse = a.idAdresse ";
		$string .= "AND e.TypeEvent_idTypeEvent = t.idTypeEvent ";
		$string .= "AND e.`idEvent` = ?;";
			
		$req = $bdd->prepare($string);
		
		$req->execute(array($id));
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;

	}

function ouiNon($alcool){
	
	if($alcool==1)
		return "Oui";
	else
		return "Non";
	
}

function getCovoiturage($bdd, $idEvent){
			
		$string = "SELECT u.Nom, u.Prenom, u.idUtilisateur ";
		$string .= "FROM Covoiturage c, Utilisateur u, Event e ";
		$string .= "WHERE c.id_event = e.idEvent ";
		$string .= "AND c.id_utilisateur = u.idUtilisateur ";
		$string .= "AND e.idEvent =? ";
			
		$req = $bdd->prepare($string);
		
		$req->execute(array($idEvent));
		
		
	while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){

		$row[] = $donnees;
   
	}
	
	return $row;

}

	function getAdresse($bdd, $idAdresse){
		
		$string = "select * from Adresse a ";
		$string = "and idAdresse = 1;";
		
		$req = $bdd->prepare($string);
		
		$req->execute(array($idEvent));
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;

		
	}

	function getLastAdress($bdd){
		
		$string = "SELECT count(*) as `nbr` FROM Adresse;";
		
		$req = $bdd->prepare($string);
		
		$req->execute();
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;
	}


	function insertNewAdress($bdd, $numRue, $rue, $codePostal){
		
		$id = getLastAdress($bdd);
		$id = $id['nbr'];
		$id += 1;
		
		$requete = $bdd->prepare(
		'INSERT INTO `Adresse`(idAdresse, `Rue`, `Numero`, `Ville_CP`) VALUES (?,?,?,?)');
		$requete->execute(array($id, $numRue, $rue, $codePostal));
		
		return $id;
		
	}


	function insertNewUser($bdd, $nom, $prenom, $numRue, $rue, $codePostal, $email, $age, $mpd, $pseudo){
				
		$idAdresse = insertNewAdress($bdd, $numRue, $rue, $codePostal);
		
		$string = 'INSERT INTO `Utilisateur`(`Nom`, `Prenom`, `Email`, `Password`, `CompteurSam`, `Age`, `Adresse_idAdresse`, `Photo_util`, `Photo_vehic`, `Pseudo`, `véhicule`) ';
		$string .= 'VALUES (?,?,?,?,?,?,?,?,?,?,?)';
		
		
		$requete = $bdd->prepare($string);
		$requete->execute(array($nom, $prenom, $email, $mpd, 0, $age, $idAdresse, NULL, NULL, $pseudo, NULL));
	}


	function rechercheLogin($bdd, $log, $pass){
		
		$string = "SELECT * FROM Utilisateur WHERE Email=? AND Password=?;";
		
		$req = $bdd->prepare($string);
		
		$req->execute(array($log, $pass));
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;
		
		
	}
	function getUtilisateur($bdd, $id){
			
		$string = "SELECT u.Pseudo, u.CompteurSam, u.Nom, u.Prenom, u.Email, a.Rue, a.Numero, a.Ville_CP, u.Véhicule ";
		$string .= "FROM Utilisateur u, Adresse a ";
		$string .= "WHERE u.Adresse_idAdresse = a.idAdresse ";
		$string .= "AND u.idUtilisateur = ?;";
			
		$req = $bdd->prepare($string);
		
		$req->execute(array($id));
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;

	}

?>
