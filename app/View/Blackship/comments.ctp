<h2>Facebook</h2>
<ul> 
<?php foreach ($messages['facebook'] as $key => $message) { ?>
	<li>
		<div class="name">
			Nom : <?= $message['name'] ?>
		</div>
		<div class="message">
			Message : <?= $message['message'] ?>
		</div>
		<div class="link">
			<a target="_blank" href="<?= $message['link'] ?>"><?= $message['link'] ?></a>
		</div>
	</li>
	
<?php } ?>
</ul>

<h2>Twitter</h2>
<ul> 
<?php foreach ($messages['tweet'] as $key => $message) { ?>
	<li>
		<div class="name">
			Nom : <?= $message['name'] ?>
		</div>
		<div class="message">
			Message : <?= $message['message'] ?>
		</div>
		<div class="link">
			<a target="_blank" href="<?= $message['link'] ?>"><?= $message['link'] ?></a>
		</div>
	</li>
	
<?php } ?>
</ul>