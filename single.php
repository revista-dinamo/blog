<?php get_header(); ?>

<div id="container">
	<div id="content">
		<div class="entry">		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_post(); ?>

				<div class="entry-category entry-label">
					<?=get_the_category_list(', ')?>
				</div>	
				
				<div class="sharing-options">
					<div class="fb-like" data-send="false" data-width="400" data-show-faces="false"></div>
					<span class='st_plusone_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='share'></span>
					<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="RevistaDinamo">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>
				
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">

					<?php the_content(); ?>


				</div>
			</div> 
			<div class="entry-label">
				Comentarios
			</div>
			<div class="comment-container">
				<?php comments_template('', true); ?>
			</div>
		</div>
	</div>  
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
