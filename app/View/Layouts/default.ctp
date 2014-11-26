<?php
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Comme des Gosses</title>

		<meta charset="UTF-8" />
		<meta name="title" content="Comme des gosses" />
		<meta name="description" content="Comme des gosses" />
		<?php echo $this->Html->meta(array('name' => 'og:title', 'content' => 'Comme des gosses'), NULL, array('inline' => false)); ?>
		<meta itemprop="name" content="Comme des gosses" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.commedesgosses.com" />
		<meta property="og:description" content="Sois aimant avec tes grands-parents !" />
		<meta property="og:site_name" content="Comme des Gosses" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:image" content="http://commedesgosses.com/img/logo2.png" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

		<?= $this->Html->css('index') ?>
		<?= $this->Html->css('idangerous.swiper') ?>
		<?= $this->Html->script('jquery-1.11.1.min') ?>
	</head>
	<body>
		<header id="header">
			<ul>
				<li>
					<a href="Home" id="logo">
						<img src="img/logo2.png" width="114" />
						<span class="logo_name"><span class="blue">Comme</span> <span class="the_orange">Des Gosses</span></span>
					</a>
				</li>
				<li>
					<a href="isolement">L'isolement c'est quoi ?</a>
				</li>
				<li>
					<a href="solutions">Les solutions</a>
				</li>
				<li>
					<a href="webseries">Web série</a>
				</li>
				<li>
					<a href="affiches">Nos affiches</a>
				</li>
			</ul>
			<a class="capoupascap" href="cap">Cap <br />ou<br /> pas cap ?</a>
		</header>

		<div id="container">
			<div id="content">
				<div class="forum-fixed">
					<img src="img/white-arrow.png" alt="">
					<a href="forum">forum</a>
				</div>

				<script>
				  window.fbAsyncInit = function() {
				    FB.init({
				      appId      : '724933380933273',
				      xfbml      : true,
				      version    : 'v2.2'
				    });
				  };
				</script>
				
				<!----><?= $this->fetch('content') ?><!---->
			</div>
		</div>

		<footer id="footer">
			<div class="bloc-footer-m">
				<a href="mentions">Mentions légales</a> ⎢ <a href="plan">Plan du site</a><br/>
				©<span class="name">Comme des gosses</span> ⎢ 2014 ⎢ Tous droits reservés ⎢ <a href="mailto:contact@commedesgosses.com">contact@commesdesgosses.com</a>
				<br/>
				Créé par l'agence <span class="name">Black Sheep</span><br/>
				
			</div>
			<div class="bloc-footer-d">&nbsp;
				<div class="reseaux-footer">
					<ul>
						<li>
							<a id="fb_icon2" target="_blank" href="https://www.facebook.com/pages/Comme-des-Gosses/602780313159165?fref=ts"></a>
						</li>
						<li>
							<a id="twitter_icon2" target="_blank" href="https://twitter.com/CommeDesGosses"></a>
						</li>
						<li>
							<a id="youtube_icon2" target="_blank" href="https://www.youtube.com/CommedesGosses"></a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '724933380933273',
		      xfbml      : true,
		      version    : 'v2.2'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
		<?= $this->Html->script('jquery.plugin') ?>
		<?= $this->Html->script('jquery-ui.min') ?>
		<?= $this->Html->script('jquery.uploadify.min') ?>
		<?= $this->Html->script('https://apis.google.com/js/platform.js') ?>
		<?= $this->Html->script('idangerous.swiper') ?>
		<?= $this->Html->script('main') ?>

		<script>
			var mySwiper = new Swiper('.swiper-container',{
				centeredSlides: true,
			    slidesPerView: 3,
			    watchActiveIndex: true
			});
			$('.arrow-left').on('click', function(e){
				e.preventDefault()
				mySwiper.swipePrev()
			});
			$('.arrow-right').on('click', function(e){
				e.preventDefault()
				mySwiper.swipeNext()
			});
		</script>
		
	</body><!--
--></html>
