<?php

$options[] = array( "name" => "Social Icons",
					"type" => "heading"); 
					

$social_icons=array('audioboo','bebo','behance','blogger','buzz','creativecommons','dailybooth','delicious','designfloat','deviantart','digg','dopplr','dribbble','email','ember','facebook','flickr','forrst','friendfeed','google','gowalla','grooveshark','hyves','lastfm','linkedin','livejournal','lockerz','megavideo','myspace','piano','playfire','playstation','reddit','rss','skype','socialvibe','soundcloud','spotify','steam','stumbleupon','technorati','tumblr','twitpic','twitter','typepad','vimeo','wakoopa','wordpress','xing','yahoo','youtube');
		
					
$options[] = array(
			"name" => "Social Icons",
			"desc" => "multiselect by pressing Ctrl+Click or Cmd+Click and the selected fields will appear below",
			"id" => THEME_SLUG."social_icons",
			"options" => $social_icons,
			"type" => "multiselect"
		);

		

		
for($i=0; $i<count($social_icons); $i++)  {

$options[] = array(
			"name" => $social_icons[$i]." URL",
			"id" => THEME_SLUG."social_icons_".$social_icons[$i],
			"type" => "text",
			"class" => "social_icon social_icon_".$social_icons[$i]
		);




}
		

					
				
?>