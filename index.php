<?php get_header(); ?>

<div id="container">

	<div id="content">

			<?php 
			/* The Loop — with comments! */ 
			$count = 0;
			query_posts( array( 'cat' => -PLAN_DINAMO_CATEGORY, 'posts_per_page' => 6 ) ); 
			?>
			
			<?php while ( have_posts() ) { ?>
			<?php 
			the_post();
			$count++; 
			?>

			<?php if ($count == 1 || $count == 2 || $count == 4) { ?>
			<div class='post-br'>
			<?php } ?>

				<div class="boxgrid caption home-<?=$count?>">
				
					<div class="bg-image home-post home-<?=$count?>" style="margin:0;background-image:url('<?=Helper::postImageUrl()?>')"></div>
					
					<div class="cover boxcaption home-<?=$count?>" style="margin:0;">
						<table class="caption-table caption-title-table">
							<tr>
								<td>
									<a href="<?php the_permalink(); ?>"><h3 class="caption-title"><?php the_title(); ?></h3></a>
								</td>
							</tr>
						</table>
						<table class="caption-table caption-text-table">
							<tr>
								<td>
									<div class="caption-text">
										<?=Helper::contentPreview(185)?> 
										<a href="<?php the_permalink(); ?>">[Sigue...]</a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					
				</div>

			<?php if ($count == 1 || $count == 3 || $count == 6) { ?>
			<div style='clear:both'></div>
			</div>
			<?php } ?>

		<?php } ?>
		
		<div style='clear:both'></div>

		<?php include "modules/macros.php"; ?>

	</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

<script>

	jQuery(document).ready(function(){

		//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
		//Vertical Sliding
		jQuery('.boxgrid.slidedown').hover(function(){
			jQuery(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
		});
		
		//Horizontal Sliding
		jQuery('.boxgrid.slideright').hover(function(){
			jQuery(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
		}, function() {
			jQuery(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
		});
		
		//Diagnal Sliding
		jQuery('.boxgrid.thecombo').hover(function(){
			jQuery(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
		});
		
		//Partial Sliding (Only show some of background)
		jQuery('.boxgrid.peek').hover(function(){
			jQuery(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
		});
		
		//Full Caption Sliding (Hidden to Visible)
		jQuery('.boxgrid.captionfull').hover(function(){
			jQuery(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'260px'},{queue:false,duration:160});
		});

		//Caption Sliding (Partially Hidden to Visible)
		jQuery('.boxgrid.caption').hover(function(){
			jQuery(".cover", this).stop().animate({top:'0%'},{queue:false,duration:160});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'68%'},{queue:false,duration:160});
		});
	});

</script>
