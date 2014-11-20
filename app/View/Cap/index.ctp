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
<button class="publish_cap">Proposer une idée de Cap</button>

<div class="cap">
	<div class="txt-cap">
		
	</div>

	<button class="valid-cap">CAP ?</button>
</div>

<div class="pas-cap">
	<a href="#">Pas cap</a>
</div>

<div class="pop-up-pseudo pop-up">
	<div class="form_add_pseudo"> 
		<div class="info_add info_add_error red"></div>
		<div class="info_add info_add_success green"></div>
		<form action="" method="post">
			<div class="style_input">
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" class="get_pseudo" placeholder="Entrez votre pseudo" />
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
				<label for="pseudo">Proposition de Cap</label>
				<textarea name="cap" class="get_cap" placeholder="Entrez une phrase" /></textarea>
			</div>
			<div class="style_input style_input_submit">
				<input type="submit" class="valid-cap" value="Valider" />
			</div>
		</form>
	</div>

	<div class="close">X</div>
</div>

<ul class="publications">
</ul>