<?php
function add_shortcode_contactform($atts,$content = null) {

	extract(shortcode_atts(array(
		'email' => get_bloginfo('admin_email')
	), $atts));
	
    $content = trim($content);
	
	if(!empty($content)) $success = do_shortcode($content);
	if(empty($success))  $success = __('Your message was successfully sent!','flipbook');
	
	$output='
	<div class="contact_form_wrap">
		<div class="success hidden">'.$success.'</div> 
		<form class="contact_form" action="'.THEME_INCLUDES.'/mail.php" method="post" novalidate="novalidate">
			<p><input type="text" required="required" id="contact_name" name="contact_name" value="" />
			<label for="contact_name">Name</label></p>
			<p><input type="email" required="required" id="contact_email" name="contact_email" value="" />
			<label for="contact_name">Email</label></p>
			<p><textarea required="required" name="contact_content"></textarea></p>
			<p><button type="submit" class="button">Submit</button></p>
			<input type="hidden" value="'.$email.'" name="contact_to"/>
		</form>
	</div>';
	
	return '[raw]'.$output.'[/raw]';
	
	
}

add_shortcode('contactform', 'add_shortcode_contactform');
?>
