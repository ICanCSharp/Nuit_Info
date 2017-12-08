<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Charicen</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
	
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<ul class="info-list">
									<li>
										<i class="fa fa-phone"></i>
										Samu : <span>15</span>
									</li>
									<li>
										<i class="fa fa-phone"></i>
										Police Secours :
										<span>17</span>
									</li>
									<li>
										<i class="fa fa-phone"></i>
										Pompier :
										<span>18</span>
									</li>
								</ul>
							</div>	
							<div class="col-md-4">
								<ul class="social-icons">
									<li><a class="facebook" href="https://www.facebook.com/PoliceNationale/"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="https://twitter.com/policenationale?lang=en"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="active" href="index.html">Acceuil</a></li>
							<li><a href="inscription.php">Insciption / Connexion</a></li>
							<li><a href="services.html">Donations</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="search"><a href="#" class="open-search"><i class="fa fa-search"></i></a>
								<form class="form-search">
									<input type="search" placeholder="Search:"/>
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- End Header -->

		<!-- contact section 
			================================================== -->


<?php
	require_once('connexion.php');

	// Afficher les erreurs et les avertissements
  // error_reporting(e_all);
	
if(isset($_POST['validation'])){
				//echo "Je suis dans le IF !!!!!!";
	
				$tabErreur = array();
	
				$nom = false;
				$prenom = false;
				$age = false;
	
				$numRue = false;
				$rue = false;
				$codePostal = false;
	
				$pseudo = false;
				
	
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
	
				if(isset($_POST['pseudo']) && trim($_POST['pseudo']) != "")
					$nom = htmlspecialchars($_POST['pseudo']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['pseudoNonDefini'] = "Le champs pseudo doit être renseigné";
					$formulaire_ok = false;
				}
				
				if(isset($_POST['numRue']) && trim($_POST['numRue']) != "")
					$numRue = htmlspecialchars($_POST['numRue']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['numRueNonDefini'] = "Le champs nom de rue doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['rue']) && trim($_POST['rue']) != "")
					$nom = htmlspecialchars($_POST['rue']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['rueNonDefini'] = "Le champs numéro de rue doit être renseigné";
					$formulaire_ok = false;
				}
				if(isset($_POST['codePostal']) && trim($_POST['codePostal']) != "")
					$nom = htmlspecialchars($_POST['codePostal']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['codePostalNonDefini'] = "Le champs code postal doit être renseigné";
					$formulaire_ok = false;
				}
	
	
				if(isset($_POST['age']) && trim($_POST['age']) != "")
					$age = htmlspecialchars($_POST['age']);
				else{
					// echo "Je suis dans le ELSE du nom ";
					$tabErreur['ageNonDefini'] = "Le champs âge doit être renseigné";
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
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['email'] = $email;
					// On insere les données dans la BDD
					insertNewUser($bdd, $nom, $prenom, $numRue, $rue, $codePostal, $email, $age, $password, $pseudo);
				   header('Location: index.php');
				}
	}

	
?>



<section class="contact-section">
			<div class="container">
				<div class="col-md-8">
						<form id="contact-form" action="" method="post" class="form-stacked">
					<h2>Création de compte</h2>
	
					
							<fieldset>

										<input type="hidden" name="validation">
									
								
								<div class="control-group">
										<label class="control-label">Pseudo:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre pseudo" name="pseudo" class="input-xlarge" <?php if(isset($tabErreur['pseudoNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']  ?>">
										<?php if(isset($tabErreur['pseudoNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['pseudoNonDefini']."</span>"    ?>
									</div>
								</div>
								
								<div class="control-group">
										<label class="control-label">Nom:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre nom" name="nom" class="input-xlarge" <?php if(isset($tabErreur['nomNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['nom'])) echo $_POST['nom']  ?>">
										<?php if(isset($tabErreur['nomNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['nomNonDefini']."</span>"    ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prenom:</label>
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
									<label class="control-label">Numéro de rue:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre numéro de rue" name="numRue" class="input-xlarge" <?php if(isset($tabErreur['numRueNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['numRue'])) echo $_POST['numRue']; ?>">
										<?php if(isset($tabErreur['numRueNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['numRueNonDefini']."</span>"    ?>
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label">Rue:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre rue" name="rue" class="input-xlarge" <?php if(isset($tabErreur['rueNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['rue'])) echo $_POST['rue']; ?>">
										<?php if(isset($tabErreur['rueNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['rueNonDefini']."</span>"    ?>
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label">Code Postal:</label>
									<div class="controls">
										<input type="text" placeholder="Entrez votre code Postal" name="codePostal" class="input-xlarge" <?php if(isset($tabErreur['codePostalNonDefini'])) echo 'style="border: 2px solid red;"'?> value="<?php if(isset($_POST['codePostal'])) echo $_POST['codePostal']; ?>">
										<?php if(isset($tabErreur['codePostalNonDefini'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['codePostalNonDefini']."</span>"    ?>
										<?php if(isset($tabErreur['codePostalInvalide'])) echo "<span class='erreur' style='color: red;'>  ".$tabErreur['codePostalInvalide']."</span>"    ?>
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
					<br>
					<br>
					<br>
					</div>				
</div>


<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="contact-info">
							<h2><i class="fa fa-location-arrow"></i> Nom d'équipe :</h2>
							<p>I can C#</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info">
							<h2><i class="fa fa-envelope-o"></i> Pour nous contacter : </h2>
							<p><a href="contact.html">Vous pouvez nous envoyer un message !</a></p>
						</div>
					</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	<!-- Revolution slider -->
	<script type="text/javascript">
		var tpj=jQuery;							
		var revapi66;
		tpj(document).ready(function() {
			if(tpj("#rev_slider_66_1").revolution == undefined){
				revslider_showDoubleJqueryError("#rev_slider_66_1");
			}else{
				revapi66 = tpj("#rev_slider_66_1").show().revolution({
					sliderType:"standard",
					jsFileLocation:"js/",
					sliderLayout:"fullwidth",
					dottedOverlay:"none",
					gridheight:600,
					gridwidth:1140,
					delay:9000,
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						onHoverStop:"off",
						touch:{
							touchenabled:"on",
							swipe_threshold: 75,
							swipe_min_touches: 1,
							swipe_direction: "vertical",
							drag_block_vertical: false
						},
                        arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 778,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            }
                        }
					},
					lazyType:"none",
					shadow:0,
					spinner:"off",
					stopLoop:"on",
					stopAfterLoops:0,
					stopAtSlide:1,
					shuffle:"off",
					autoHeight:"off",
					fullScreenAlignForce:"off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "",
					disableProgressBar:"on",
					hideThumbsOnMobile:"off",
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					debugMode:false,
					fallbacks: {
						simplifyAll:"off",
						nextSlideOnWindowFocus:"off",
						disableFocusListener:false,
					}
				});
			}
		});	/*ready*/
	</script>
	<a onclick="../../maps/position.js">truc</a>
</body>
</html>