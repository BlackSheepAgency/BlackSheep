<div id="bg-cap">
	<div class="wrapper">
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

		<div class="cap">
			<div class="txt-cap">
				
			</div>
			<div id="visuel">
		</div>
			<div id="cap-btns" class="clearfix">
				<button class="valid-cap"> </button>

				<button class="pas-cap"> </button>
			</div>
			
			<div id="propose">
				<span class="defi">ou alors</span><img src="app/webroot/img/red-arrow.png" class="fleche"/><button class="publish_cap">je propose un défi</button>
			</div>
		</div>
		
		<p>Tu veux partager ton expérience ou consulter celle des autres ? Rends-toi sur le forum !</p>

		<a href="forum"><div class="btn-forum">Accéder au Forum</div></a>

	</div>

		<div class="pop-up-pseudo pop-up">
			<div class="form_add_pseudo"> 
				<h2>prouve le !</h2>
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form action="" method="post">
					<p>Partage ton expérience sur notre site ou via les Réseaux Sociaux !</p>
					<div class="style_input">
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Pseudo (facultatif)" />
						<textarea name="" id="" placeholder="Tapez votre message ici" cols="30" rows="10"></textarea>
					</div>
					<div class="style_input style_input_submit">
						<input type="submit" class="valid-pseudo" value="Envoyer" />
					</div>
					<p>Publier sur les Réseaux Sociaux   
						<a href="#" class="button_facebook"><img src="app/webroot/img/share-fb.png"> </a>
						<a href="#" class="button_twitter"><img src="app/webroot/img/share-tw.png"></a>
					</p>
				</form>
			</div>

			<div class="close"><img src="app/webroot/img/close.png"></div>
		</div>

		<div class="pop-up-publish-cap pop-up">
			<div class="form_add_cap"> 
				<h2>Propose un défi !</h2>
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form action="" method="post">
					<div class="style_input">
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Pseudo (facultatif)" />
						<textarea name="" id="" placeholder="Cap de..." cols="30" rows="10"></textarea>
						<input name="cap" type="mail" class="get_cap" placeholder="E-mail" /></input>
						<p>Ne t'en fais pas, nous ne t'enverrons pas de newsletters et nous ne conserverons pas ton adresse.</p>
					</div>
					<div class="style_input style_input_submit">
						<input type="submit" class="btn-validation" value="Envoyer" />
					</div>
				</form>
			</div>

			<div class="close"><img src="app/webroot/img/close.png"></div>
		</div>

		<!--<ul class="publications">
		</ul>-->
	</div>
</div>