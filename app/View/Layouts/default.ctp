<?php
?>
<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>

	<title>Comme des Gosses</title>

	<meta name="title" content="Comme des gosses" />
	<meta name="description" content="Comme des gosses" />
	<?php echo $this->Html->meta(array('name' => 'og:title', 'content' => 'Comme des gosses'), NULL, array('inline' => false)); ?>
	<meta itemprop="name" content="Comme des gosses" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.commedesgosses.com" />
	<meta property="og:description" content="Sois aimant avec tes grands-parents !" />
	<meta property="og:site_name" content="Comme des Gosses" />
	<meta property="og:image" content="http://commedesgosses.com/img/logo2.png" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

	<?= $this->Html->css('index') ?>
	<?= $this->Html->css('countdown') ?>
	<?= $this->Html->script('jquery-1.11.1.min') ?>
</head>
<body>
	<div id="container">

		<header id="header">
			<a href="/Home" id="logo">
				<img src="img/logo.png" width="425" />
			</a>
		</header>

		<div id="content"><!----><?= $this->fetch('content') ?><!----></div><!--

		--><footer id="footer">
			<div class="bloc-footer-m">
				<a href="#">Mentions légales</a> ⎢ <a href="#">Plan du site</a><br/>
				©<span class="name">Comme des gosses</span> - 2014 - Tous droits reservés<br/>
				Créé par l'agence <span class="name">Black Sheep</span><br/>
				<a href="mailto:contact@commedesgosses.com">contact@commesdesgosses.com</a>
			</div>
		</footer>

	</div>

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

	<!--<?php echo $this->element('sql_dump'); ?>-->
	<?= $this->Html->script('jquery.plugin') ?>
	<?= $this->Html->script('countdown.js') ?>
	<?= $this->Html->script('main') ?>
</body>
</html>
