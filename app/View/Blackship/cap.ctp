	<div class="green">Validé</div>
	<div class="red">Non validé</div>

	<?php if(count($cap_unvalid) === 0) { ?>
		<div>Aucun Cap proposé !</div>
	<?php } else { ?>
		<table class="publications">
			<tr>
				<th>Pseudo</th>
				<th>Défi</th>
				<th>Image</th>
				<th>Valider</th>
				<th>Supprimer</th>
			</tr>
		<?php for ($i=0; $i < count($cap_unvalid); $i++) { 
			if($cap_unvalid[$i]['Cap']['validated'] == 0) { ?>
				<tr class="publication_unvalid">
			<?php } else { ?>
				<tr class="publication_valid">
			<?php } ?>
		
			

				<td><?= $cap_unvalid[$i]['Cap']['author'] ?></td>
				<td>
					<?= $cap_unvalid[$i]['Cap']['text'] ?>
				</td>
				<td>image</td>
				<td>
					<?php if($cap_unvalid[$i]['Cap']['validated'] == 0) { ?>
						<button class="validate-cap" data-id="<?= $cap_unvalid[$i]['Cap']['id'] ?>">Valider</button>
					<?php } else { ?>
						<button disabled class="validate-cap" data-id="<?= $cap_unvalid[$i]['Cap']['id'] ?>">Valider</button>
					<?php } ?>
				</td>
				<td><button class="delete-cap" data-id="<?= $cap_unvalid[$i]['Cap']['id'] ?>">Supprimer</button></td>
			</tr>
	<?php 
		} ?>
	</table>
	<?php }
	?>


<div class="info">
	
</div>
