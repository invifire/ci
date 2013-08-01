<form method="get" id="searchform" action="<?php echo home_url(); ?>">

	<input type="text" value="<?php _e('Search..', 'flipbook');?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search..', 'flipbook');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search..', 'flipbook');?>';}" />
	<button type="submit" class="button"><?php _e('Search', 'flipbook');?></button>
</form>