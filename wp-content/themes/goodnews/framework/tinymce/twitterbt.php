<?php 

 add_action('init', 'add_button_twitter');
 
 function add_button_twitter() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin_twitter');
     add_filter('mce_buttons_4', 'register_button_twitter');
   }
}

function register_button_twitter($buttons) {
   array_push($buttons, "twitter");
   return $buttons;
}

function add_plugin_twitter($plugin_array) {
   $plugin_array['twitter'] = get_template_directory_uri().'/framework/tinymce/twitterbt.js';
   return $plugin_array;
}
