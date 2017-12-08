<style type="text/css">
<!--
body p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body p {
	font-size: 18px;
}
body p {
	font-style: italic;
}
-->
</style><form action="" method="post">
  Type événement : <input type="text" name="event" required />
                      <br />
                      <br />
 Description:  		<input type="text" name="description" style="width:15%; height:10%;" required />
                     
                      <br />
                      <br />
 Soiré alcolisé:<input type="radio" id="contactChoice1"
				name="alcool" value="oui" required >oui
                      
                      <input type="radio" id="contactChoice2"
				name="alcol" value="non" required >non<br />
N°rue : <input type="number" name="rue" style="width:4%;" required />				
Adresse : <input type="text" name="adresse" required />
Code postal : <input type="number" name="postal"  maxlength="4" style="width:4%;" required /><br />
Heure debut : <input type="time" name="heureDebut" step="1"  required/>  Heure fin : <input type="time" name="heureFin" step="1" required/>
                      
                      <input type="submit" value="Envoyer" />
                    
</form>


<?php
if((isset($_POST['event']))){
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
$requete = "INSERT INTO event(IdEvent,Description,Alcool,Adresse_IdAdresse,Adresse_IdAdresse,Adresse_IdAdresse,Heure_debut,Heure_fin)
 VALUES(:event, :description, :alcool, :rue, :adresse, :postal,:heureDebut,:heureFin)')";
$requete = $bdd->prepare($requete);
$requete->bindValue(':event',$_POST["event"]);
$requete->bindValue(':description',$_POST["description"]);
$requete->bindValue(':alcool',$_POST["alcool"]);
$requete->bindValue(':rue',$_POST["rue"]);
$requete->bindValue(':adresse',$_POST["adresse"]);
$requete->bindValue(':postal',$_POST["postal"]);
$requete->bindValue(':heureDebut',$_POST["heureDebut"]);
$requete->bindValue(':heureFin',$_POST["heureFin"]);

$requete->excute();


}
?>
	