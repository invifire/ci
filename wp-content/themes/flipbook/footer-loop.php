<?php

	wp_footer();
	
	if(get_theme_option('google_analytics')!='') echo '<div class="hidden">'.stripslashes(get_theme_option('google_analytics')).'</div>';
	
?>
</body>
</html>