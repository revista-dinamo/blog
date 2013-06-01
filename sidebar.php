<div id="sidebar">
	
	<div id="primary" class="widget-area">
		<ul class="sidebar-area">
			
			<div class="follow-us">
				<a class="icon facebook" target="_blank" href="<?=FACEBOOK_PAGE_LINK?>"></a>
				<a class="icon twitter" target="_blank" href="<?=TWITTER_PAGE_LINK?>"></a>
				<a class="icon rss" target="_blank" href="<?php bloginfo('rss2_url'); ?>"></a>
			</div>

			<?php include "modules/plan_dinamo.php"; ?>

			<div class="primary-widget-area">
				<div style="position:absolute;top:10px">
					<?php 
					if ( is_sidebar_active('primary_widget_area') ) { 
						dynamic_sidebar('primary_widget_area'); 
					}
					?>
				</div>
			</div>

			<div class="secondary-widget-area">
				<?php 
				if ( is_sidebar_active('secondary_widget_area') ) { 
					dynamic_sidebar('secondary_widget_area'); 
				} 
				?>
			</div>

		</ul>
	</div>
	
</div>
