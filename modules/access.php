<div class="access">
	<div class="menu">
		<a class="page_item" href="<?php bloginfo('url'); ?>">Inicio</a>
		<?php foreach (Helper::getMenuElements() as $element) { ?>
		<a class="page_item" href="<?=$element['link']?>"><?=$element['name']?></a>
		<?php } ?>
	</div>
</div>
