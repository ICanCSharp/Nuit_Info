fmap<!doctype html>


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
							<li><a class="active" href="index.php">Accueil</a></li>
							<li><a href="inscription.php">Inscription</a></li>
							<li><a href="Formulaire_Event.php">Signaler Evènements</a></li>
							<li><a href="Event.php">Voir Evènements</a></li>
							<li><a href="inscription.php">Inscription</a></li>
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
		<section class="contact-section">
			<div class="container">
				<div class="col-md-8">
					<form id="contact-form">
						<h2>Send us a message</h2>
						<div class="row">
							<div class="col-md-4">
								<input name="name" id="name" type="text" placeholder="Name">
							</div><br><br><br>
							<div class="col-md-4">
								<input name="prenom" id="prename" type="text" placeholder="PreNom">
							</div><br><br><br>
							<div class="col-md-4">
								<input name="mail" id="mail" type="text" placeholder="Email">
							</div><br><br><br>
							<div class="col-md-4">
								<input name="tel-number" id="tel-number" type="text" placeholder="Phone">
							</div><br><br><br>
							<div class="col-md-4">
								<input name="date" id="date" type="date" placeholder="date">
							</div><br><br><br><br>
							<div class="col-md-4">
								<input name="Password" id="Password" type="Password" placeholder="Password">
							</div><br><br><br>
							<div class="col-md-4">
								<input name="RePassword" id="RePassword" type="Password" placeholder="RePassword">
							</div><br><br><br>
								<div class="col-md-4">
							<textarea name="address" id="address" placeholder="Address"></textarea>
									</div><br><br><br>
						</div>
						<input type="submit" id="submit_contact" value="Send Message">
						<div id="msg" class="message"></div>
					</form>
				</div>
			</div>
		</section>
		<!-- End contact section -->

		<!-- subcribe-section 
			================================================== -->
			================================================== -->
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