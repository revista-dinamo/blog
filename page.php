<?php get_header();
if (single_post_title('', false) == 'Quiénes somos') {

	echo "<div class=\"page quienes-somos\">";

} else if (single_post_title('', false) == 'Contacto') {

	echo "<div class=\"page contacto\">";

} else {
	
	echo "<div class=\"page\">";

?>	<div id="container">
		<div id="content">

		<?php 
}
			if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

			<?php endwhile; 

if (single_post_title('', false) != 'Contacto' && single_post_title('', false) != 'Quiénes somos') {
?>

		</div><!– #content –>  
	</div><!– #container –>

<?php } 

if (single_post_title('', false) != 'Contacto' && single_post_title('', false) != 'Quiénes somos') {
	get_sidebar(); 
}
echo "</div>";
get_footer();


if (single_post_title('', false) == 'Contacto') {
?>
<script>

jQuery(function() {  
	jQuery('.error').hide();  
	jQuery(".button").click(function() {  

		// validate and process form here  

		jQuery('.error').hide();  
		var name = jQuery("input#nombre").val();  
		if (name == "") {  
			jQuery("label#name_error").show();  
			jQuery("input#nombre").focus();  
			return false;  
		}

		var email = jQuery("input#email").val();  
		if (email == "") {  
			jQuery("label#email_error").show();  
			jQuery("input#email").focus();  
			return false;  
		}  

		var message = jQuery("textarea#mensaje").val(); 
		if (message == "") {  
			//jQuery("label#mensaje_error").show();  
			jQuery("textarea#mensaje").focus();  
			return false;  
		}
	
		var dataString = 'nombre='+ name + '&email=' + email + '&mensaje=' + message; 
		jQuery.ajax({  
			type: "POST",  
			url: "/wp-content/themes/dinamo/contacto.php",  
			data: dataString,  
			success: function() {
				alert('Su mensaje se envió correctamente.');
				jQuery("input#nombre").val('');  
				jQuery("input#email").val('');  
				jQuery("textarea#mensaje").val('');  
			}
		});  
		return false;

	});  
}); 
</script>

<?php }
