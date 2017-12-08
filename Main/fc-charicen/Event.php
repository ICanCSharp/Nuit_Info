<?php
	
	require_once('connexion.php');


	$event = getEvent($bdd,1);
	$covoiturage=getCovoiturage($bdd,1);
	$utilisateur = getUtilisateur($bdd, 1);

?>




<html>

<head>
<meta charset="utf-8" />
	
<link rel="stylesheet" href="style_chat.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="chat.js"></script>
<script type="text/javascript">
	
    
        // ask user for name with popup prompt    
        var name = <?php $utilisateur['Pseudo']; ?>;
        
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

	
	
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
	color:white;
 }
 td { 
 border-width:3px;
 border-style:solid; 
 border-color:white;
 }
	
	body {
	background-image:url(images/securoute.jpg);
	background-repeat:no-repeat;
	background-size:100%;
	}
	
</style>
	<title>En route pour la fête !</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
	
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css">
	<!-- REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" type="text/css" href="css/layers.css">
	<!-- REVOLUTION NAVIGATION STYLES -->
	<link rel="stylesheet" type="text/css" href="css/navigation.css">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/jquery.countTo.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
		
	<!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
		(Load Extensions only on Local File Systems !  
		The following part can be removed on Server for On Demand Loading) -->	
	<script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="style_chat.js"></script>

</head>
<body onload="setInterval('chat.update()', 1000)">

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
					

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div style="margin-lift:500px" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="active" href="index.php">Accueil</a></li>
							<li><a href="inscription.php">Inscription</a></li>
							<li><a href="Formulaire_Event.php">Signaler Evènements</a></li>
							<li><a href="Event.php">Voir Evènements</a></li>
							<li><a href="inscription.php">Inscription</a></li>
							<li class="search"><a href="#" class="open-search"><i class="fa fa-search"></i></a>
								<li><p style="color:#18E08B"><a href=# style="color:#18E50B">Contact</a></p></li>
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

		<!-- home-section 
			================================================== -->
		<section id="home-section" class="slider1">
			

			<div id="rev_slider_66_1_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="web-product-dark62" style="background-color:transparent;padding:0px;">
				<!-- START REVOLUTION SLIDER 5.0.7 fullscreen mode -->
				<div id="rev_slider_66_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
					<ul>	<!-- SLIDE  -->
						<li data-index="rs-227" data-transition="slidevertical" data-slotamount="1"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
							<!-- MAIN IMAGE -->
							
							<!-- LAYERS -->
		<section class="consulting-section">
			<div class="container">
				<div class="title-section">
				</div>
				<div class="consulting-box">
					<div class="row">

						<div class="col-md-4" style="margin-left:35%">
							<div class="consulting-post">
								<a href="#"><i class="fa fa-heart"></i></a>
								<h2>Evè</h2>
					
							</div>
						</div>



					</div>
	

			</div>
		</section>
							<!-- LAYER NR. 1 -->
<iframe src="./test.html" style="width:100%;height:100%"></iframe>

							<!-- LAYER NR. 2 -->
							

							<!-- LAYER NR. 3 -->

							<!-- LAYER NR. 4 -->

							<!-- LAYER NR. 5 -->
							
						</li>
						<!-- SLIDE  -->
						</ul>
				</div><!-- END REVOLUTION SLIDER -->
			</div>
		</section>
		<!-- End home section -->

		<!-- banner-section 
			================================================== -->
		<section class="banner-section">
			<form id="contact-form" method="POST" action="seConnecter.php">
			<div class="container">
				<div class="col-md-4">
					<p>
						Se Connecter:
					</p>			<input name="log" id="log" type="text" placeholder="Login">
							</div>
							<div class="col-md-4">
								<p>
						      .
					</p>
								<input name="password" id="password" type="text" placeholder="Password">
								</div>
					<div class="col-md-4">
							<p>
						      .
					</p>
								<input style="background-color:#555;" type="submit" id="submit_contact" value="Send Message">
							</div>
			</div>
			</form>
			<br>
		</section>
		<!-- End banner section -->


<br><br>
<div class=Texte>
	<table>
		<tr>
		<td width=30% rowspan=5>
			<img src="" alt="Photo de l'évènement">
			</td>
			<td width=30%>
				<font size=6>Type d'évènement</font>
			</td>
			<td width=40%>
				<font size=6><?php echo $event['Libelle']; ?></font>
			</td>
		<tr>
			<td width=70% colspan=2>
				<font size=6><?php echo $event['Description']; ?></font>
			</td>
		</tr>
		</tr>
		<tr>
			<td width=30%>
				<font size=6>Soirée avec alcool:</font>
			</td>
			<td width=40%>
				<font size=6><?php echo ouiNon($event['Alcool']); ?></font>
			</td>
		</tr>
		<tr>
			<td width=70% colspan=2>
			<font size=6><?php echo $event['Numero']; ?>
			<?php echo $event['Rue']; ?>
				<?php echo $event['Ville_CP']; ?></font>
			</td>
		</tr>
		<tr>
			<td width=30%>
				<font size=6>Horaires</font>
			</td>
			<td width=40%>
			<font size=6><?php echo $event['Heure_debut']; ?>
			-
				<?php echo $event['Heure_fin']; ?></font>
			</td>
		</tr>
	</table>
</div>
<br>
<div class=Texte>
	<table>
		<tr>
			<td width=80%>
				<font size=6>En route avec moi!!!</font>
			</td>
			<td width=20%>
				<button value=CovoiturageB>
					<font size=6>Je me propose en covoiturage</font>
				</button>
			</td>
		</tr>
		<tr>
			<td colspan=2>
			
				<font size=6><?php
				
				foreach($covoiturage as $data){
					echo '<a href="Utilisateur.php?id=' . $data['idUtilisateur'] .'">' . $data['Nom'] . ' ';
					echo $data['Prenom'] . '</a>';
				}
				
				
					?></font>
			</td>
		</tr>
	</table>
	</div>	
<div id="page-wrap">

    
    <p id="name-area"></p>
    
    <div id="chat-wrap"><div id="chat-area"></div></div>
    
    <form id="send-message-area">
        <textarea id="sendie" maxlength = '100'></textarea>
    </form>

</div> 
</body>

</html>