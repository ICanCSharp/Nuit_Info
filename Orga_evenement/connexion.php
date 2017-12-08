
<?php
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
			
		$string = "SELECT e.`NomEvent`, t.Libelle, e.`Alcool`, a.Numero, a.Rue, a.Ville_CP, e.`Heure_debut`, e.`Heure_fin`, e.`Description`, v.NomVille ";
		$string .= "FROM `Event` e, `Adresse` a, `TypeEvent` t, Ville v ";
		$string .= "WHERE e.Adresse_idAdresse = a.idAdresse ";
		$string .= "AND e.TypeEvent_idTypeEvent = t.idTypeEvent ";
		$string .= "AND v.CP = a.Ville_CP ";
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
			
		$string = "SELECT u.Nom, u.Prenom ";
		$string .= "FROM Covoiturage c, Utilisateur u, Event e ";
		$string .= "WHERE c.id_event = e.idEvent ";
		$string .= "AND c.id_utilisateur = u.idUtilisateur ";
		$string .= "AND e.idEvent =? ";
			
		$req = $bdd->prepare($string);
		
		$req->execute(array($idEvent));
		
			if($ligne = $req->fetch(PDO::FETCH_ASSOC))
				return $ligne;
			else
				return false;

	}

?>
