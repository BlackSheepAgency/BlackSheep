<ul class="publications">
	<?php for ($i=0; $i < count($cap_unvalid); $i++) { ?>
		<li class="publication">
			<div class="publication_txt">

				<div class="publication_comment">
					<?= $cap_unvalid[$i]['Cap']['text'] ?>
				</div>

				<button class="validate-cap" data-id="<?= $cap_unvalid[$i]['Cap']['id'] ?>">Valider</button>

			</div>
		</li>
	<?php } ?>
</ul>

<div class="info">
	
</div>

<?= $this->Html->script('jquery-1.11.1.min') ?>
<?= $this->Html->script('admin') ?>