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
			<h1>Comme des Gosses</h1>
			<!--<a href="/BlackSheep/Home" id="logo">
				<img src="img/logo.png"/>
			</a>-->
		</header>

		<div id="content">

			<!--<?php echo $this->Session->flash(); ?>-->

			<?php echo $this->fetch('content'); ?>
		</div>

		<footer id="footer">
			<div class="wrapper-footer">
				<div class="bloc-footer-g">
					<span class="name">Comme des gosses</span><br/>
					6 rue Froment<br/>
					75011 Paris<br/>
					<a href="mailto:contact@commedesgosses.com">contact@commesdesgosses.com</a>
				</div>
				<div class="bloc-footer-m">
					
				</div>
				<div class="bloc-footer-d">
					
				</div>
			</div>
		</footer>

	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
	<?= $this->Html->script('jquery.plugin') ?>
	<?= $this->Html->script('countdown.js') ?>
	<?= $this->Html->script('main') ?>
</body>
</html>
