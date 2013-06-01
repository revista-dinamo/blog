<?php

function get_page_number() {
	if ( get_query_var('paged') ) {
		print ' | ' . __( 'Page ' , 'dinamo') . get_query_var('paged');
	}
} 

function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
	?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author vcard"><?php commenter_link() ?></div>
	<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'dinamo'),
			get_comment_date(),
			get_comment_time(),
			'#comment-' . get_comment_ID() );
			edit_comment_link(__('Edit', 'dinamo'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>

	<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'dinamo') ?>
	<div class="comment-content">
		<?php comment_text() ?>
	</div>

	<?php // echo the comment reply link
	if($args['type'] == 'all' || get_comment_type() == 'comment') :
		comment_reply_link(array_merge($args, array(
			'reply_text' => __('Reply','dinamo'),
			'login_text' => __('Log in to reply.','dinamo'),
			'depth' => $depth,
			'before' => '<div class="comment-reply-link">',
			'after' => '</div>'
		)));
	endif;
	?>
<?php } 

      
function custom_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'dinamo'),
		get_comment_author_link(),
		get_comment_date(),
		get_comment_time() );
		edit_comment_link(__('Edit', 'dinamo'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'dinamo') ?>
	<div class="comment-content">
		<?php comment_text() ?>
	</div>
<?php } 


/* string function commenter_link
 *
 * Produces an avatar image with the hCard-compliant photo class.
 */

function commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	$avatar_email = get_comment_author_email();
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} 


/* bool function is_sidebar_active
 *
 * @param (string) $index
 * 
 * Check for static widgets in widget-ready areas.
 */

function is_sidebar_active( $index ){
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) return true;
	return false;
} 


/* void function theme_widgets_init
 *
 * Customize widget areas for initialization.
 */

function theme_widgets_init() {

	// Area 1
	register_sidebar( array (
		'name' => 'Primary Widget Area',
		'id' => 'primary_widget_area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2
	register_sidebar( array (
		'name' => 'Secondary Widget Area',
		'id' => 'secondary_widget_area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}


/* void function js_libs_init
 *
 * Initializates JS libraries.
 */

function js_libs_init() {
	if (!is_admin()) {
		
		wp_enqueue_script('jquery');
		
		// Fancybox is used for Macros de Oliverio.
		wp_enqueue_script('fancybox', get_bloginfo('template_directory') . '/js/fancybox/jquery.fancybox-1.3.4.js', array(), '1.0');
	}
}

