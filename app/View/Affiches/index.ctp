<div class="page_affiche">
		<h1 class="picture_affiche">Notre campagne<br/>"Comme des gosses"</h1>

		<?php foreach ($affiches as $key => $affiche) { ?>
      		<div class="affiche affiche<?= $affiche['Affiche']['id'] ?>">
				<div class="picture">
					<img width="436" src="<?= $affiche['Affiche']['url'] ?>" alt="" />
				</div>
				<div class="description_picture">
					<p>
						<?= $affiche['Affiche']['description'] ?>
					</p>
				</div>
			</div>
      	<?php } ?>

	<div class="device">
    
	    <div class="swiper-container">
	      <div class="swiper-wrapper">

	      	<?php foreach ($affiches as $key => $affiche) { ?>
	      		<div class="swiper-slide slide_affiche" data-id="<?= $affiche['Affiche']['id'] ?>">
		        	<img src="<?= $affiche['Affiche']['url'] ?>" width="220" alt="" />
		        </div>
	      	<?php } ?>

	      </div>
	    </div>
	    <div class="buttons previous arrow-left"><span class="button_previous"></span></div>
		<div class="buttons next arrow-right"><span class="button_next"></span></div>
	    <div class="pagination"></div>
	    
  	</div>
<div>