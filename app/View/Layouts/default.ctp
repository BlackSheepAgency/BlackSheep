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
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?= $this->Html->css('index') ?>
	<?= $this->Html->css('countdown') ?>
	<?= $this->Html->script('jquery-1.11.1.min') ?>
</head>
<body>
	<div id="container">

		<header id="header">
			<a href="/BlackSheep/Home" id="logo">
					<img src="img/logo_web.png"/>
				</a>
				<img src="img/logo.png" width="425" />
			</a>
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
				<!--<div class="bloc-footer-d">&nbsp;
					<div class="reseaux-footer">
						<ul>
							<li>
								<a id="fb_icon" href=""></a>
							</li>
							<li>
								<a id="twitter_icon" href=""></a>
							</li>
							<li>
								<a id="youtube_icon" href=""></a>
							</li>
						</ul>
					</div>
				</div>-->
		</footer>

	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
	<?= $this->Html->script('jquery.plugin') ?>
	<?= $this->Html->script('countdown.js') ?>
	<?= $this->Html->script('main') ?>
</body>
</html>
