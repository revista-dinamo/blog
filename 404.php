<?php get_header(); ?>
<div id="container">
	<div id="content">
		
		<div id="nav-above" class="navigation">
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
		</div><!– #nav-above –>
	
		<div id="post-0" class="post error404 not-found">
			<h1 class="entry-title"><?php _e( 'Not Found', 'dinamo' ); ?></h1>
			<div class="entry-content">
				<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'dinamo' ); ?></p>
			<?php get_search_form(); ?>
			</div><!– .entry-content –>
		</div><!– #post-0 –>

		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
		</div><!– #nav-below –>    

		<?php comments_template('', true); ?>

	</div><!– #content –>  
</div><!– #container –>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
