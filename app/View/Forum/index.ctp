<div id="bg-solutions">
	<div class="wrapper clearfix">
		<div class="btn-forum-publish activator">moi aussi je publie !</div>
		<div class="overlay" id="overlay" style="display: none;"></div>

		<?php foreach ($publications as $key => $publication) { ?>
			<div class="grand-bloc clearfix">
				<!--<h1>Titre publication</h1>-->
				<?php if($publication['Publication']['picture'] != null || $publication['Publication']['picture'] != '') { ?>
					<div class="image-publication">
						<img src="<?= $publication['Publication']['picture'] ?>"/>
					</div>
					<?php } ?>
				
				<p>
					<?= $publication['Publication']['comment'] ?>
				</p>
				<p class="pseudo-com"><?= $publication['Publication']['pseudo'] ?></p>
			</div>
		<?php } ?>

		<?php foreach ($tweet as $key => $the_tweet) { ?>

			<div class="grand-bloc-social clearfix">
				<img src="img/twitter-bg.png" class="grand-bloc-bg"/>
				<div class="publication-reseaux-sociaux">
					<!--<div class="avatar">
						<img src="img/avatar.jpg"/>
					</div>-->
					<h1><?= $the_tweet['Message']['author'] ?></h1>
					<h2>@<?= $the_tweet['Message']['screen_name'] ?></h2>
					<p><?= $the_tweet['Message']['message'] ?></p>
				</div>
			</div>

		<?php } ?>

		<div class="pop-up-pseudo pop-up">
			<div class="form_add_pseudo"> 
				<h2>Prouve le !</h2>
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form action="#" method="post">
					<p>Partage ton expérience sur notre site ou via les Réseaux Sociaux !</p>
					<div class="style_input">
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Pseudo (facultatif)" />
						<textarea name="" id="" required class="get_comment" placeholder="Tapez votre message ici" cols="30" rows="10"></textarea>
					</div>
					<div class="style_input style_input_submit">
						<input type="submit" class="valid-pseudo" value="Envoyer" />
					</div>
					<p>Publier sur les Réseaux Sociaux   
						<div>
							<a href="#" class="button_facebook"><img src="app/webroot/img/share-fb.png"> </a>
							<a href="#" class="button_twitter"><img src="app/webroot/img/share-tw.png"></a>
						</div>
						
					</p>
				</form>
			</div>

			<div class="close"><img src="app/webroot/img/close.png"></div>
		</div>
</div>