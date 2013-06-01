<?php get_header(); ?>

<div id="container">
	<div id="content" class="section">
		<?php 
		global $wp_query; 
		$total_pages = $wp_query->max_num_pages; 
		?>
		<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<div class="section-post">
			<div class="section-bg-image" style="background-image:url('<?=Helper::postImageUrl()?>')"></div>
			<div class="section-content">	
				<h2 class="sc-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="sc-info">
					Autor: <?php the_author(); ?>
					<?php the_time( get_option( 'date_format' ) ); ?>
				</div>
				<div class="sc-content">
					<?php the_excerpt(); ?>
				</div>
				<div class="sc-footer">
					<?php the_tags() ?>
					<?php comments_popup_link() ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>  

		<?php if ( $total_pages > 1 ) { ?>
		<div id="nav-above" class="navigation">
			<div class="nav-previous">
				<?php next_posts_link( "Ver anteriores..." ) ?>
			</div>
			<div class="nav-next">
				<?php previous_posts_link( "Ver nuevos..." ) ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>
