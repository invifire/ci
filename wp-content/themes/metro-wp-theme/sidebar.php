<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!-- begin sidebar -->
<div class="sidebarcontainer right">
<div class="sidebar">

<div id="search" class="sidebaritem">
  <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
    <div>
      <input type="text" name="s" id="s" class="inputText" /><input type="submit" class="inputSubmit" value="<?php esc_attr_e('Search Blog'); ?>" />
    </div>
  </form>
</div>
<div class="sidebaritem">
  <h2>about me</h2>
</div>


<div class="sidebaritem">
  <h2>latest tweets</h2>
  <div id="twitter_div" style="display: block;">
    <ul id="twitter_update_list"></ul>
  </div>
</div>

<div class="sidebaritem">
  <h2>tags</h2>
  <div class="tags">
    <ul>
      <?php wp_list_categories('title_li='); ?>
    </ul>
  </div>
</div>

<div class="sidebaritem">
  <div class="softwarenotice ">Unless otherwise noted, source code on this blog is Licensed under the Open Software License version 3.0.</div>
</div>

<ul>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>

</ul>

</div>
</div>
<!-- end sidebar -->