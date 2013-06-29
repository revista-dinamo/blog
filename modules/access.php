<div class="access">
	<div class="menu">
		<a class="page_item" style="width:112px;" href="<?php bloginfo('url'); ?>">Inicio</a>
		<?php foreach (Helper::getMenuElements() as $element) { ?>
		<a class="page_item" href="<?=$element['link']?>"><?=$element['name']?></a>
		<?php } ?>
	</div>
</div>
