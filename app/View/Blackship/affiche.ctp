<div class="add_affiche">

	<div class="add_picture">
		<div class="apercu">
			
		</div>
		<?= $this->Form->Create('Affiche', array('type' => 'file')) ?>
		<?= $this->Form->input('upload', array('type' => 'file')) ?>
		<?= $this->Form->end('Valider') ?>
	</div>

	<div class="add_content">
		<div class="explications">
			Explications
		</div>
		<textarea name="" id="" cols="30" rows="10"></textarea>
	</div>

</div>