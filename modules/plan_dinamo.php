<?php // get sidebar post for preview module
$sidebar_posts = get_posts( array(
							'category' 		=> PLAN_DINAMO_CATEGORY,
							'numberposts'	=> SIDEBAR_COUNT_PREVIEWS) );

?>
<div class="plan-dinamo">
	<div class="object-view">
		<div id="slide" style="height:100%; width:<?=SIDEBAR_PREVIEW_WIDTH*SIDEBAR_COUNT_PREVIEWS?>px">
			<?php foreach( $sidebar_posts as $sidebar_post ) { ?>
				<div class="object">
					<img src="<?=Helper::postImageUrl($sidebar_post)?>" />
					<div class="desc"><a href="?p=<?=$sidebar_post->ID?>"><?=$sidebar_post->post_title?></a></div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<script>

	function move_next() {

		var margin = jQuery('#slide').css("margin-left");
		var margint = parseInt(margin);
		if (margint < -<?=SIDEBAR_PREVIEW_WIDTH?>) {
			margint = 0;
		} else {
			margint -= <?=SIDEBAR_PREVIEW_WIDTH?>;
		}

		jQuery('#slide').animate({
			marginLeft: margint,
			easing: "easein"
			}, 600, function() {
			// Animation complete.
		});
	}

	jQuery(document).ready(function(){

		setInterval(function() {
			move_next();
		}, 5000);
	
	});

	jQuery('#click_next').click(function(){
		move_next();
	});

</script>
