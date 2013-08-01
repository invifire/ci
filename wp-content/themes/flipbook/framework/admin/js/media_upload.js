jQuery(document).ready( function($) {

	jQuery('.range-input-container input').rangeinput();
	
	jQuery('.colorpicker').each(function(){
	
		var id=jQuery(this).attr('id').slice(12);
		jQuery('#picker_'+id).farbtastic('#colorpicker_'+id);
	
	});
	
	jQuery('.colorpicker_wrap span').click(function(){
	
		if(jQuery(this).next().hasClass('hidden')) jQuery(this).next().removeClass('hidden');
		else jQuery(this).next().addClass('hidden');

	});


});


