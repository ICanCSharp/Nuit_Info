<?php
	//session_start();
	require_once('connexion.php');

	// Afficher les erreurs et les avertissements
  // error_reporting(e_all);
	
if(isset($_POST['validation'])){
				//echo "Je suis dans le IF !!!!!!";
	
				$tabErreur = array();
	
				$nom = false;
				$prenom = false;
				$age = false;
				$email = false;
				$password = false;
				$passwordConfirm = false;
				$formulaire_ok = true;
				//print_r($_GET);
				// On fait ici le contrôle 
				// des différent champs pour
				// qu'ils soit tous renseigné
				if(isset($_POST['nom']) && trim($_POST['nom']) != "")
					$nom = htmlspecialchars($_POST['nom']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['nomNonDefini'] = "Le champs nom doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['age']) && trim($_POST['age']) != "")
					$age = htmlspecialchars($_POST['age']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['ageNonDefini'] = "Le champs nom doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['prenom']) && trim($_POST['prenom']) != "")
					$prenom = htmlspecialchars($_POST['prenom']);
				else{
					$tabErreur['prenomNonDefini'] = "Le champs nom doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['email']) && trim($_POST['email']) != ""){
					$email = htmlspecialchars($_POST['email']);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$tabErreur['emailInvalide'] = "Votre adresse Email est invalide";
						$formulaire_ok = false;
					}
				}else{
					$tabErreur['emailNonDefini'] = "Le champs email doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['password']) && trim($_POST['password']) != "")
					$password = htmlspecialchars($_POST['password']);
				else{
					$tabErreur['passwordNonDefini'] = "Le champs mot de passe doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['passwordConfirm']) && trim($_POST['passwordConfirm']) != ""){
					$passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
					if($password != $passwordConfirm){
						$tabErreur['passwordConfirmDifferent'] = "Le mot de passe n'est pas confirmé";
						$formulaire_ok = false;
					}
				}else{
					$tabErreur['passwordConfirmNonDefini'] = "Le champs confirmation du mot de passe doit être renseigné";
					$formulaire_ok = false;  
				}
				// Si le formulaire est correctement remplis
				// on le valide et on enregistre le nouvelle
				// utilisateur
				if($formulaire_ok){
					
					$_SESSION['prenom'] = $prenom;
					$_SESSION['email'] = $email;
					// On insere les données dans la BDD
					// insertNewClient($bdd, $nom, $prenom, $email, $telephone, md5($password));
					// header('Location: index.php');
				}
	}

	if(isset($_POST['connection'])){
		
		
		$tabErreur = array();
		
		$emailCo = false;
		$passwordCo = false;
		$formulaireCO_ok = true;
		
		if(isset($_POST['emailCo']) && trim($_POST['emailCo']) != "")
			$emailCo = htmlspecialchars($_POST['emailCo']);
		else{
			//echo "Je suis dans le ELSE du nom ";
			$tabErreur['emailCoDefini'] = "Le champs Login doit être renseigné";
			$formulaireCO_ok = false;
		}
		if(isset($_POST['passwordCo']) && trim($_POST['passwordCo']) != "")
			$passwordCo = htmlspecialchars($_POST['passwordCo']);
		else{
			$tabErreur['passwordCoNonDefini'] = "Le mot de passe doit être renseigné";
			$formulaireCO_ok = false;
		}
		
		
		// Si le formulaire est correctement remplis
		// on le valide et on enregistre le nouvelle
		// utilisateur
		if($formulaireCO_ok){
			
		//	$mdp = rechercheLogin($bdd, $emailCo);
			
			if(!$mdp)
				$tabErreur['logNotFind'] = "Adresse email introuvable !";
			else{
				
				if(md5($passwordCo) != $mdp){
					$tabErreur['MDPNotFind'] = "Mot de passe incorrecte !";
				} else {
					
			//		$prenom = recherchePrenom($bdd, $emailCo);
					$_SESSION['prenom'] = $prenom;
					$_SESSION['email'] = $emailCo;
				//	header('Location: index.php');
				}
			}
		}
		
	}
?>


<HTML>
 <HEAD>
 
  </HEAD>
  
<BODY>
<div class="span7">					
						<h4 class="title"><span class="text"><strong>Création de compte</strong> Formulaire</span></h4>
	
						<form action="" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Nom</label>
									<div class="controls">
										
										<input type="hidden" name="validation">
										
										<input type="text" placeholder="Entrez votre nom" name="nom" class="input-xlarge" <?php if(isset($tabErreur['nomNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['nom'])) echo $_POST['nom']  ?>">
										<?php if(isset($tabErreur['nomNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['nomNonDefini']."</span>"    ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prenom</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre prenom" name="prenom" class="input-xlarge"<?php if(isset($tabErreur['prenomNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>">
										<?php if(isset($tabErreur['prenomNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['prenomNonDefini']."</span>"    ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Adresse email:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre email" name="email" class="input-xlarge" <?php if(isset($tabErreur['emailNonDefini']) || isset($tabErreur['emailInvalide'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
										<?php if(isset($tabErreur['emailNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['emailNonDefini']."</span>"    ?>
										<?php if(isset($tabErreur['emailInvalide'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['emailInvalide']."</span>"    ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Âge</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre âge" name="age" class="input-xlarge"<?php if(isset($tabErreur['ageNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['ageNonDefini'])) echo $_POST['ageNonDefini']; ?>">
										<?php if(isset($tabErreur['ageNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['ageNonDefini']."</span>"    ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Mot de passe:</label>
									<div class="controls">
										<input type="password" placeholder="Entrez votre mot de passe" name="password" class="input-xlarge" <?php if(isset($tabErreur['passwordNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
										<?php if(isset($tabErreur['passwordNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['passwordNonDefini']."</span>"    ?>
									</div>
								</div>	
								<div class="control-group">
									<label class="control-label">Confirmez votre mot de passe:</label>
									<div class="controls">
										<input type="password" placeholder="Entrez votre mot de passe" name="passwordConfirm" class="input-xlarge" <?php if(isset($tabErreur['passwordConfirmNonDefini']) || isset($tabErreur['passwordConfirmDifferent'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['passwordConfirm'])) echo $_POST['passwordConfirm'];?>">
										<?php if(isset($tabErreur['passwordConfirmNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['passwordConfirmNonDefini']."</span>"    ?>
									 	<?php if(isset($tabErreur['passwordConfirmDifferent'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['passwordConfirmDifferent']."</span>"    ?>
									</div>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Créer votre compte"></div>
							</fieldset>
						</form>					
					</div>				
</div>


</BODY>

</HTML>






