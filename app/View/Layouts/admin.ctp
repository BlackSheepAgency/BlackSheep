<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Comme des Gosses');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>
	<meta name="robots" content="noindex, nofollow" />
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

	<?= $this->Html->css('foundation') ?>
	<?= $this->Html->css('admin') ?>
	<?= $this->Html->script('jquery-1.11.1.min') ?>
</head>
<body>
	<div id="container">

		<header id="header">
			<h1>Admin</h1>
			<a href="/Home" id="logo">
				<img src="/Blacksheep/img/logo_web.png" width="300" />
			</a>
			<nav class="admin_nav">
				<ul>
					<li>
						<a href="cap">Cap</a>
					</li>
					<li>
						<a href="affiche">Affiches</a>
					</li>
					<li>
						<a href="video">Video</a>
					</li>
					<li>
						<a href="comments">Commentaires</a>
					</li>
				</ul>
			</nav>
		</header>

		<div id="content">

			<!--<?php echo $this->Session->flash(); ?>-->

			<?php echo $this->fetch('content'); ?>
		</div>

		<footer id="footer">
				<div class="bloc-footer-m">
					<a href="#">Mentions légales</a> ⎢ <a href="#">Plan du site</a><br/>
					©<span class="name">Comme des gosses</span> - 2014 - Tous droits reservés<br/>
					Créé par l'agence <span class="name">Black Sheep</span><br/>
					<a href="mailto:contact@commedesgosses.com">contact@commesdesgosses.com</a>
				</div>
		</footer>

	</div>

	<?= $this->Html->script('admin') ?>
</body>
</html>
