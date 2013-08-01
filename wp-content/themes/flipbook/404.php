<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php theme_functions('page_title'); ?></h1>
	<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'flipbook' ); ?></p>
	
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
	

	
</div>





<?php get_footer('loop');?>
	
