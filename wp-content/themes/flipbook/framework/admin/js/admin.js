jQuery(document).ready( function($) {


	jQuery('.range-input-container input').rangeinput();

	var multipleValues = jQuery('select#flipbooksocial_icons').val() || [];
	var i=0;
	for (i=0;i<multipleValues.length;i++)
		jQuery('.social_icon_'+multipleValues[i]).show();

	jQuery('select#flipbooksocial_icons').change(function(){

		var multipleValues = jQuery(this).val() || [];

		jQuery('.social_icon').hide();
		
		var i=0;
		for (i=0;i<multipleValues.length;i++)
			jQuery('.social_icon_'+multipleValues[i]).show();

	});
	
	jQuery('#add_sidebar').click(function() {
	
		var sb_name=jQuery('#sidebar_name').val();

		if (sb_name) {
			if(jQuery('#custom_sidebars').val()=='') jQuery('#custom_sidebars').val(sb_name);
			else jQuery('#custom_sidebars').val(jQuery('#custom_sidebars').val()+','+sb_name);
		
			jQuery('<div class="sidebar_item" data-name="'+sb_name+'">'+sb_name+'<input class="button-primary" value="delete"/></div>').insertBefore('#custom_sidebars');
			
		}
			
	});
	
	
	jQuery('#sidebar_heading').text(jQuery('.sidebar_item').size()+' custom sidebars added');
	
	jQuery('.sidebar_item .button-primary').live('click', function(){
	
		jQuery(this).parent().hide().remove();
		jQuery('#custom_sidebars').val('');
		jQuery('.sidebar_item').each(function(){
			if(jQuery('#custom_sidebars').val()=='') jQuery('#custom_sidebars').val(jQuery(this).attr('data-name'));
			else jQuery('#custom_sidebars').val(jQuery('#custom_sidebars').val()+','+jQuery(this).attr('data-name'));
			

		});
				
		jQuery('#sidebar_heading').text(jQuery('.sidebar_item').size()+' custom sidebars added');
		
		
	});
	
	


});


