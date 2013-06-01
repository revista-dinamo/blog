<?

class Helper {

	/* string function postImageUrl
	 * 
	 * @param (wp_post) $post
	 * 
	 * Returns first image in post. 
	 * If param $post is null, $post depends on context.
	 */

	public static function postImageUrl($post = null) {
		
		if (!$post) global $post;
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		
		$url = $matches[1][0];
		if(empty($url)) $url = POST_IMAGE_DEFAULT;
		
		return $url;
	}


	/* string function contentPreview
	 *
	 * 	@param (int) $chars
	 *  @param (wp_post) $post
	 * 
	 * Returns a post content preview. 
	 * If param $post is null, $post depends on context.
	 */

	public static function contentPreview($chars, $post = null) {
		
		if (!$post) global $post;
		return substr(html_entity_decode(htmlentities($post->post_content)), 0, $chars);
	}
	
	
	/* array function getMenuElements
	 *
	 * Returns the elements with links for index menu. 
	 */

	public static function getMenuElements() {
		
		$result = array();
		
		foreach ( get_categories() as $category ) array_push($result, array('name' => $category->name, 'link' => "?cat=" . $category->cat_ID));
		foreach ( get_pages() as $page ) array_push($result, array('name' => $page->post_title, 'link' => "?page_id=" . $page->ID));
		
		return $result;
	}
	
	/* void function renderPageTitle
	 *
	 * Search engine optimized title tag that shows only the post title on single posts and pages.
	 */

	public static function renderPageTitle() {
		
		if ( is_single() ) { 
			single_post_title(); 
		} elseif ( is_home() || is_front_page() ) { 
			bloginfo('name'); 
			print ' | '; 
			bloginfo('description'); 
			get_page_number(); 
		} elseif ( is_page() ) { 
			single_post_title(''); 
		} elseif ( is_search() ) { 
			bloginfo('name'); 
			print ' | Search results for ' . wp_specialchars($s); 
			get_page_number(); 
		} elseif ( is_404() ) { 
			bloginfo('name'); 
			print ' | Not Found'; 
		} else { 
			bloginfo('name'); 
			wp_title('|'); 
			get_page_number(); 
		}
		
	}
	
}


?>
