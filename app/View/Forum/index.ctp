<div id="bg-solutions">
	<div class="wrapper clearfix">
		<button class="btn-forum-publish">moi aussi je publie !</button>
		<div class="grand-bloc">
			<h1>Titre publication</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est quidem quo esse, nesciunt ad nobis aspernatur natus fugiat, repellendus beatae facilis voluptatem in nemo rerum dolores harum iste nam exercitationem.</p>
			<p class="pseudo-com">Lucie</p>
		</div>
		<div class="grand-bloc clearfix">
			<h1>Titre publication</h1>
			<img src="img/vieux.jpg"/>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime at dignissimos animi velit delectus, odio veritatis.</p>
			<p class="pseudo-com">Barnabé</p>
		</div>
		<div class="grand-bloc">
			<h1>Titre publication</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est quidem quo esse, nesciunt ad nobis aspernatur natus fugiat, repellendus beatae facilis voluptatem in nemo rerum dolores harum iste nam exercitationem.</p>
		</div>
	</div>

	<div class="pop-up-publish pop-up">
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
		</div>
</div>