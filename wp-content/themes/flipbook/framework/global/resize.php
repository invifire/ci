<?php

function theme_resize($img_url, $width, $height) {

   return THEME_INCLUDES.'/timthumb.php?src='.$img_url.'&amp;w='.$width.'&amp;h='.$height.'zc=1&amp;q=100';

}

?>