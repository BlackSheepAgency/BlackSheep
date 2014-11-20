<div class="add_affiche">

	<div class="add_picture">
		<div class="apercu">
			
		</div>
		<?= $this->Form->Create('Affiche', array('type' => 'file')) ?>
		<?= $this->Form->input('upload', array('type' => 'file')) ?>
		<?= $this->Form->textarea('Description') ?>
		<?= $this->Form->end('Valider') ?>
	</div>

</div>