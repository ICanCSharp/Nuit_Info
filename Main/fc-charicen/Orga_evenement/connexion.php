
<?php
  try{

			
      ini_set('display_errors', 1); 
      header('Access-Control-Allow-Origin:*'); 
			// error_reporting(e_all);


			$bdd = new PDO('mysql:host=mysql-descartes.alwaysdata.net;dbname=descartes_bddnuitinfo;charset=utf8', 'descartes','lpinfo');
			$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $er){
		        die('<p> Erreur['.$er->getCode().'] : '.$er->getMessage().'</p>');
		}

//appel les données des différentes tables pour l'affichage de l'évenement
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

//Affiche si il y a de l'alcool à la fête
function ouiNon($alcool){
	
	if($alcool==1)
		return "Oui";
	else
		return "Non";
	
}
	
//appel les données des différentes tables pour l'affichage de covoiturage
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

//Envoie de l'id Utilisateur pour création d'un nouvelle enregistrement dans covoiturage
function Covoiturage($bdd, $id){ 
	//envoie
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
