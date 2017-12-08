<?php
	
	require_once('connexion.php');


	$event = getEvent($bdd,1);
	$covoiturage=getCovoiturage($bdd,1);

?>




<html>

<head>
<meta charset="utf-8" />
<style>
.Texte{
	text-align:right;
	margin-left: 20%;
	margin-right: 20%;
	font-size:20;
	color:white;
	font-weight: bold;
	width:60%;
    background-color: rgba(0,0,0,0.3);
}
table {
 border-width:3px; 
 border-style:solid; 
 border-color:white;
 width:100%;
 }
 td { 
 border-width:3px;
 border-style:solid; 
 border-color:white;
 }
</style>
</head>

<body>
<br><br>
<div class=Texte>
	<table>
		<tr>
		<td width=30% rowspan=5>
			<img src="" alt"Photo de l'évènement">
			</td>
			<td width=30%>
			Type d'évènement
			</td>
			<td width=40%>
			<?php echo $event['Libelle']; ?>
			</td>
		<tr>
			<td width=70% colspan=2>
			<?php echo $event['Description']; ?>
			</td>
		</tr>
		</tr>
		<tr>
			<td width=30%>
			Soiré avec alcool:
			</td>
			<td width=40%>
			<?php echo ouiNon($event['Alcool']); ?>
			</td>
		</tr>
		<tr>
			<td width=70% colspan=2>
			<?php echo $event['Numero']; ?>
			<?php echo $event['Rue']; ?>
			<?php echo $event['Ville_CP']; ?>
			<?php echo $event['NomVille']; ?>
			</td>
		</tr>
		<tr>
			<td width=30%>
			Horaires
			</td>
			<td width=40%>
			<?php echo $event['Heure_debut']; ?>
			-
			<?php echo $event['Heure_fin']; ?>
			</td>
		</tr>
	</table>
</div>
<br>
<div class=Texte>
	<table>
		<tr>
			<td width=80%>
			En route avec moi!!!
			</td>
			<td width=20%>
				<button>
				Je me propose en covoiturage
				</button>
			</td>
		</tr>
		<tr>
			<td colspan=2>
			<?php echo $covoiturage['Nom']; ?>
			<?php echo $covoiturage['Prenom']; ?> 
			</td>
		</tr>
	</table>
</div>
</body>

</html>