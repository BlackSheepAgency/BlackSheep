<div id="bg-cap">
	<div class="wrapper">
		<div class="pop-up-publish pop-up">
			<div>
				<form class="add_publication">
					<div class="style_input">
						<label for="publi_pseudo">Pseudo</label><br/>
						<input type="text" name="publi_pseudo" class="publi_pseudo" placeholder="Entrez votre pseudo" />
					</div>
					<div class="style_input">
						<label for="publi_url">URL</label><br/>
						<input type="text" name="publi_url" class="publi_url"  />
					</div>
					<div class="style_input">
						<label for="publi_comment">Commentaire</label><br/>
						<textarea class="comment" name="publi_comment" class="publi_comment"></textarea>
					</div>

					<div class="style_input">
						<input type="submit" class="valid-pseudo" value="Valider" />
					</div>
				</form>
			</div>
			

			<div class="form_add_pseudo"> 
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form class="no-pseudo" action="" method="post">Pas de pseudo ? Insérez-en un !
					<div class="style_input">
						<label for="pseudo">Pseudo</label><br/>
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Entrez votre pseudo" />
					</div>
					<div class="style_input">
						<input type="submit" class="valid-pseudo" value="Valider" />
					</div>
				</form>
			</div>


			<div class="close">X</div>
		</div>

		<button class="publish">Publier une Action</button>

		<div class="cap">
			<div class="txt-cap">
				
			</div>
			<div id="cap-btns" class="clearfix">
				<button class="valid-cap"> </button>

				<button class="pas-cap"> </button>
			</div>
			
			<div id="propose">
				<span class="defi">ou alors</span><img src="app/webroot/img/red-arrow.png" class="fleche"/><button class="publish_cap">je propose un défi</button>
			</div>
		</div>

		<div id="visuel">
			<img src="app/webroot/img/visuel.png"/>
		</div>
		
		<p>Tu veux partager ton expérience ou consulter celle des autres ? Rends-toi sur le <a href="#" class="link-forum">forum</a> !</p>

		<div class="btn-forum">
			Accéder au Forum
		</div>

	</div>

		<div class="pop-up-pseudo pop-up">
			<div class="form_add_pseudo"> 
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form action="" method="post">
					<div class="style_input">
						<input type="text" name="pseudo" class="get_pseudo" placeholder="Pseudo (facultatif)" />
						<textarea name="" id="" placeholder="Cap de..." cols="30" rows="10"></textarea>
						<input name="cap" type="mail" class="get_cap" placeholder="E-mail" /></input>
					</div>
					<div class="style_input style_input_submit">
						<input type="submit" class="valid-pseudo" value="Valider" />
					</div>
				</form>
			</div>

			<div class="close">X</div>
		</div>

		<div class="pop-up-publish-cap pop-up">
			<div class="form_add_cap"> 
				<div class="info_add info_add_error red"></div>
				<div class="info_add info_add_success green"></div>
				<form action="" method="post">
					<div class="style_input">
						<input name="cap" class="get_cap" placeholder="Entrez une phrase" /></input>
					</div>
					<div class="style_input style_input_submit">
						<input type="submit" class="btn-validation" value="Valider" />
					</div>
				</form>
			</div>

			<div class="close">X</div>
		</div>

		<!--<ul class="publications">
		</ul>-->
	</div>
</div>