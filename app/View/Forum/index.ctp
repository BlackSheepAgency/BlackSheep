<div id="bg-solutions">
	<div class="wrapper clearfix">
		<button class="btn-forum-publish">moi aussi je publie !</button>

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
					<h2>@<?= $the_tweet['Message']['author'] ?></h2>
					<p><?= $the_tweet['Message']['message'] ?></p>
				</div>
			</div>

		<?php } ?>


		<!--<div class="grand-bloc">
			<h1>Titre publication</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est quidem quo esse, nesciunt ad nobis aspernatur natus fugiat, repellendus beatae facilis voluptatem in nemo rerum dolores harum iste nam exercitationem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet maiores eligendi consequatur impedit, aliquam, fugit repudiandae iste ipsam id cum tenetur quos qui nihil aspernatur, quibusdam fuga earum ea.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum nesciunt, aliquam fugit, nisi nobis consectetur obcaecati! Voluptatum saepe doloremque perspiciatis porro laborum eveniet recusandae et beatae officia. Esse, laborum, magni.</p>
			<p class="pseudo-com">Lucie</p>
		</div>
		<div class="grand-bloc clearfix">
			<h1>Titre publication</h1>
			<div class="image-publication">
				<img src="img/vieux.jpg"/>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime at dignissimos animi velit delectus, odio veritatis.</p>
			<p class="pseudo-com">Barnabé</p>
		</div>
		<div class="grand-bloc-social clearfix">
			<img src="img/twitter-bg.png" class="grand-bloc-bg"/>
			<div class="publication-reseaux-sociaux">
				<div class="avatar">
					<img src="img/avatar.jpg"/>
				</div>
				<h1>ChauveMaisSwaggé_du_93</h1>
				<h2>@ChauveSwagg</h2>
				<p>Les vieux c'est #CommeDesGosses, ça se fatigue vite !</p>
			</div>
		</div>
	</div>-->

	<!--<div class="pop-up-publish pop-up">
			<div>
				<form class="add_publication">
					<h2>publie ton cap !</h2>
					<div class="style_input">
						<input type="text" name="publi_pseudo" class="publi_pseudo" placeholder="Entrez votre pseudo" />
					</div>
					<div class="style_input">
						<textarea class="comment" name="publi_comment" placeholder ="Cap de..." class="publi_comment"></textarea>
					</div>

					<div class="style_input">
						<input type="submit" class="valid-pseudo" value="Valider" />
					</div>
				</form>
			</div>
			

			<div class="form_add_pseudo"> 
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form class="no-pseudo" action="" method="post">
					<div class="style_input">
						<p>Pas de pseudo ? Insérez-en un !</p>
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Entrez votre pseudo" />
					</div>
					<div class="style_input">
						<input type="submit" class="valid-pseudo" value="Valider" />
					</div>
				</form>
			</div>


			<div class="close"><img src="app/webroot/img/close.png"></div>
		</div>-->

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