
<style>
	table tbody tr td {
		color: black;
	}
</style>

<h1 class="info"></h1>


<h2>Facebook</h2>
<table> 
	<tr>
		<th>Auteur</th>
		<th>Message</th>
		<th>URL</th>
		<th>Action</th>
	</tr>
<?php foreach ($messages_facebook as $key => $message) { ?>
	<tr data-id="<?= $message['Message']['id'] ?>">
		<td class="name">
			<?= $message['Message']['author'] ?>
		</td>
		<td class="message">
			<?= $message['Message']['message'] ?>
		</td>
		<td class="link">
			<a target="_blank" href="<?= $message['Message']['url'] ?>"><?= $message['Message']['url'] ?></a>
		</td>
		<td>
			<?php if($message['Message']['validated'] == 0) { ?>
				<button class="valid-message">Valider</button>
			<?php } else { ?>
				<button disabled class="valid-message">Valider</button>
				<button class="unvalid-message">Ne plus valider</button>
			<?php } ?>
			
			
		</td>
	</tr>
	
<?php } ?>
</table>

<h2>Twitter</h2>
<table> 
	<tr>
		<th>Auteur</th>
		<th>Message</th>
		<th>URL</th>
		<th>Action</th>
	</tr>
<?php foreach ($messages_twitter as $key => $message) { ?>
	<tr data-id="<?= $message['Message']['id'] ?>">
		<td class="name">
			<?= $message['Message']['author'] ?>
		</td>
		<td class="message">
			<?= $message['Message']['message'] ?>
		</td>
		<td class="link">
			<a target="_blank" href="<?= $message['Message']['url'] ?>"><?= $message['Message']['url'] ?></a>
		</td>
		<td>
			<?php if($message['Message']['validated'] == 0) { ?>
				<button class="valid-message">Valider</button>
			<?php } else { ?>
				<button disabled class="valid-message">Valider</button>
				<button class="unvalid-message">Ne plus valider</button>
			<?php } ?>
		</td>
	</tr>
	
<?php } ?>
</table>