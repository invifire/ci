jQuery(document).ready( function($) {

	var textField;

	jQuery('#gallery_upload').click(function() {

		tb_show('Add Gallery Images', 'media-upload.php?type=gallery&post_id='+jQuery('#post_ID').val()+'&tab=image&TB_iframe=1');

	});
	
	

	jQuery('.op_upload_wrap button').click(function(e) {

		e.preventDefault();
		tb_show('Insert Adress URL', 'media-upload.php?type=gallery&tab=library&TB_iframe=1');
		textField= jQuery(this).prev();
		


	});

	var tb_show_temp = window.tb_show; 
	
	
	window.tb_show = function() { 

		tb_show_temp.apply(null, arguments); 

		var iframe = jQuery('#TB_iframeContent');
		iframe.load(function() {


			var iframeJQuery = iframe[0].contentWindow.jQuery;

			jQuery('<input id="add_gallery_images" class="button-primary" value="Add Gallery Images">').insertAfter(iframeJQuery('#save-all'));
			
			jQuery('<input class="insert_adress button-primary" value="Insert Adress">').insertBefore(iframeJQuery('.savesend .del-link'));


			
			iframeJQuery('#add_gallery_images').click(function(){

				var gallery_items=iframeJQuery('.media-item');
				var input_gallery_items=jQuery('input#gallery_items');

				input_gallery_items.val('');
				jQuery('.gallery_items_wrap').html('');

				gallery_items.each(function(){

					$('.gallery_items_wrap').append('<img src="'+jQuery(this).find('.pinkynail').attr('src')+'">');

					if(input_gallery_items.val()=='') input_gallery_items.val(jQuery(this).attr('id').slice(11));
					else input_gallery_items.val(input_gallery_items.val()+','+jQuery(this).attr('id').slice(11));

				});

				tb_remove();

			});
			
			iframeJQuery('.insert_adress').click(function(){

				textField.val((jQuery(this).parent().parent().siblings('.url').find('.button.urlfile').attr('title')));
				tb_remove();
				
			});
			
		});
	}


	show_and_hide('display_sidebar');
	show_and_hide('portfolio_type');
	show_and_hide('background_type');
	show_and_hide('thumbnail_click');
	show_and_hide('height_type');

	
	value= jQuery('.op_theme_page_type_i select').val();
	jQuery('.op_theme_page_type').hide();
	jQuery('.op_theme_page_type_'+value).stop().fadeTo(300,1);
	
						
	if(value=='1') {

		hide_and_show('display_sidebar');
		hide_and_show('background_type');
		


	}

	if(value=='3' || value=='4') {

		hide_and_show('portfolio_type');

	}

	jQuery('.op_theme_page_type_i select').change(function(e){
	
		e.preventDefault();
	
		jQuery('.op_theme_page_type').hide();
		jQuery('.op_theme_page_type_'+this.value).stop().fadeTo(300,1);
		
		if(this.value=='1') {

			hide_and_show('display_sidebar');
			hide_and_show('background_type');

		}

		if(this.value=='3' || this.value=='4') {

			hide_and_show('portfolio_type');

		}

	});

	
	jQuery('.range-input-container input').rangeinput();
	

	

	
	
	jQuery('#add_shortcode').click(function(){
		send_to_editor( generate_sc_code() );
	});
	
	jQuery('#first_sc_select').val('none');
	jQuery('#first_sc_select').change(function(e){
	
		jQuery('.first_sc_container').hide();
		jQuery('.secondary_sc_container').hide();
		jQuery('.secondary_sc_select').val('none');	
		jQuery('.first_sc_container_'+this.value).stop().fadeTo(300,1);

		jQuery('#sc_error').hide();
		jQuery('#add_shortcode').hide();
		var sec=jQuery('.first_sc_container_'+this.value).find('.secondary_sc_container');
		if(sec.size()==0 && this.value!='none') jQuery('#add_shortcode').show();
		
		
	});
	
	
	jQuery('.secondary_sc_select').change(function(){
		jQuery('.secondary_sc_container').hide();
		jQuery('.secondary_sc_container_'+this.value).stop().fadeTo(300,1);
		jQuery('#sc_error').hide();		
		jQuery('#add_shortcode').show();	
	});
	


	function show_and_hide(val){
	
		value= jQuery('.op_'+val+'_i select').val();
		jQuery('.op_'+val+'_'+value).stop().fadeTo(300,1);
		jQuery('.op_'+val+'_i select').change(function(e){
		
			e.preventDefault();
		
			jQuery('.op_'+val).hide();
			jQuery('.op_'+val+'_'+this.value).stop().fadeTo(300,1);

		});
	
	
	}
	
	function hide_and_show(val){
	
		sec_value= jQuery('.op_'+val+'_i select').val();
		jQuery('.op_'+val).hide();
		jQuery('.op_'+val+'_'+sec_value).stop().fadeTo(300,1);
	
	
	}
	
	var val1, val2, error;
	
	function get_text_value(val){
	
		if (val2 == undefined) return jQuery('.sc_'+val1+'_'+val).val();
		else return jQuery('.sc_'+val1+'_'+val2+'_'+val).val();

	}
	
	function display_error(){
	
		jQuery('#sc_error').html('Please fill all the required fields:'+error).stop().fadeTo(300,1);
	
	}
	
	function generate_sc_code(e){
	
		val1 = jQuery('#first_sc_select').val();
		val2 = jQuery('.secondary_sc_select_'+val1).val();
		error='';
		var sc='';
		
		switch(val1){

			case 'contactform':
						
				var email=get_text_value('email');
				var success=get_text_value('success');
				
				if(email!='') email+=' email="'+email+'"';
				
				sc='\n[contactform'+email+']'+success+'[/contactform]\n';
				
			break;
			
			case 'flickr':
			
				var id=get_text_value('id');
				var count=get_text_value('count');
				var display=get_text_value('display');
				
				if(id!='') id=' id="'+id+'"';
				else error +='<br/>Flickr ID';
				if(count!=0) count=' count="'+count+'"';
				else count='';
				if(display!='...') display=' display="'+display+'"';
				else display='';
				
				sc='\n[flickr'+id+count+display+']\n';
				
			break;
				
			case 'gmap':
			
				var height=get_text_value('height');
				var latitude=get_text_value('latitude');
				var longitude=get_text_value('longitude');
				var zoom=get_text_value('zoom');
				var html=get_text_value('html');
				var maptype=get_text_value('maptype');

				if(height!=0) height= ' height="'+height+'"';
				else height='';
				if(latitude!= '') latitude= ' latitude="'+latitude+'"';
				else error +='<br/>Latitude';
				if(longitude!='') longitude= ' longitude="'+longitude+'"';
				else error +='<br/>Longitude';
				if(zoom!=0) zoom= ' zoom="'+zoom+'"';
				else zoom='';
				if(html!= '') html= ' html="'+html+'"';
				if(maptype!='...') maptype= ' maptype="'+maptype+'"';
				else maptype='';

				sc='\n[gmap'+height+latitude+longitude+zoom+html+maptype+']\n';
				
			break;
				
			case 'images':
		
				var src=get_text_value('src');
				var title=get_text_value('title');
				var align=get_text_value('align');
				var icon=get_text_value('icon');
				var lightbox=get_text_value('lightbox');
				var description=get_text_value('description');
				var group=get_text_value('group');
				var size=get_text_value('size');
				var width=get_text_value('width');
				var height=get_text_value('height');
				var link=get_text_value('link');
				var target=get_text_value('target');

				if(src!='') src=' src="'+src+'"';
				else error +='<br/>Image Source URL';
				if(title!='') title=' title="'+title+'"';
				if(align!='...') align=' align="'+align+'"';
				else align='';
				if(icon!='...') icon=' icon="'+icon+'"';
				else icon='';
				if(lightbox!='...') lightbox=' lightbox="yes"';
				else lightbox = '';
				if(description!='') description=' description="'+description+'"';
				if(group!='') group=' group="'+group+'"';	
				if(size!='...') size=' size="'+size+'"';
				else size='';
				if(width!=0) width=' width="'+width+'"';
				else width ='';
				if(height!=0) height=' height="'+height+'"';
				else height ='';
				if(link!= '') link=' link="'+link+'"';	
				if(target!='...') target=' target="'+target+'"';
				else target='';
			
				sc='[image'+src+title+align+icon+lightbox+description+group+size+width+height+link+target+']';
				
			break;
				
			case 'layout':

				switch(val2){
				
					case '1_2_1_2':
					
						sc='\n[one_half]\n'+get_text_value('1')+'\n[/one_half]\n\n[one_half_last]\n'+get_text_value('2')+'\n[/one_half_last]\n';
					
					break;
					
					case '1_3_1_3_1_3':
					
						sc='\n[one_third]\n'+get_text_value('1')+'\n[/one_third]\n\n[one_third]\n'+get_text_value('2')+'\n[/one_third]\n\n[one_third_last]\n'+get_text_value('3')+'\n[/one_third_last]\n';
					
					break;
					
					case '1_4_1_4_1_4_1_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('3')+'\n[/one_fourth]\n\n[one_fourth_last]\n'+get_text_value('4')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_3_2_3':
					
						sc='\n[one_third]\n'+get_text_value('1')+'\n[/one_third]\n\n[two_third_last]\n'+get_text_value('2')+'\n[/two_third_last]\n';
					
					break;
					
					case '2_3_1_3':
					
						sc='\n[two_third]\n'+get_text_value('1')+'\n[/two_third]\n\n[one_third_last]\n'+get_text_value('2')+'\n[/one_third_last]\n';
					
					break;
					
					case '1_4_3_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[three_fourth_last]\n'+get_text_value('2')+'\n[/three_fourth_last]\n';
					
					break;
					
					case '3_4_1_4':
					
						sc='\n[three_fourth]\n'+get_text_value('1')+'\n[/three_fourth]\n\n[one_fourth_last]\n'+get_text_value('2')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_4_1_4_1_2':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_half_last]\n'+get_text_value('3')+'\n[/one_half_last]\n';
					
					break;
					
					case '1_4_1_2_1_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_half]\n'+get_text_value('2')+'\n[/one_half]\n\n[one_fourth_last]\n'+get_text_value('3')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_2_1_4_1_4':
					
						sc='\n[one_half]\n'+get_text_value('1')+'\n[/one_half]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_fourth_last]\n'+get_text_value('3')+'\n[/one_fourth_last]\n';
					
					break;
				}
				
			break;
				
			case 'typography':

				switch( val2 ){
		
					case 'blockquote':
					
						var content=get_text_value('content');
						var align=get_text_value('align');
						var cite=get_text_value('cite');
						
				        if(content=='') error +='<br/>Content';
						if(align!='...') align=' align="'+align+'"';
						else align='';
						if(cite!='') cite=' cite="'+cite+'"';
						
						sc='[blockquote'+align+cite+']'+content+'[/blockquote]';
					break;

					case 'lists':
					
						var content=get_text_value('content');
						var style=get_text_value('style');
						
						if(content=='') error +='<br/>Content';
						if(style!='...') style=' style="'+style+'"';
						else style='';
						
						sc='\n[list'+style+']\n'+content+'\n[/list]\n';
					break;
						
					case 'highlight':
					
						var content=get_text_value('content');
						var color=get_text_value('color');
						
						if(content=='') error +='<br/>Content';
						if(color!='...') color = ' color="'+color+'"';
						else color='';
						
						sc='[highlight'+color+']'+content+'[/highlight]';
						
					break;
					
					case 'divider':
					
						var type=get_text_value('type');
			
						sc='\n['+type+']\n';
				
					break;
				
					}
					
				break;
			

			 
			case 'twitter':
			
				var username=get_text_value('username');
				var count=get_text_value('count');
				
				if(username!='') username=' username="'+username+'"';
				else error +='<br/>Username';
				if(count!=0) count=' count="'+count+'"';
				else count='';
				
				sc='\n[twitter'+username+count+']\n';
			break;
			
			case 'videos':

				switch(val2){
				
					case 'youtube':
					
						var id=get_text_value('id');
						var width=get_text_value('width');
						var height=get_text_value('height');
						var align=get_text_value('align');

						if(id!='') id=' id="'+id+'"';
						else error +='<br/>Video ID';
						if(width!=0) width=' width="'+width+'"';
						else width ='';
						if(height!=0) height=' height="'+height+'"';
						else height='';
						if(align!='...') align=' align="'+align+'"';
						else align='';
						
						sc='[youtube'+id+width+height+align+']';
						
					break;
					case 'vimeo':
					
						var id=get_text_value('id');
						var width=get_text_value('width');
						var height=get_text_value('height');
						var align=get_text_value('align');
						
						if(id!='') id=' id="'+id+'"';
						else error +='<br/>Video ID';
						if(width!=0) width=' width="'+width+'"';
						else width='';
						if(height!=0) height=' height="'+height+'"';
						else height='';
						if(align!='...') align=' align="'+align+'"';
						else align='';
						
						sc='[vimeo'+id+width+height+align+']';
					break;
					case 'html5':
				
						var mp4_source=get_text_value('mp4_source');
						var webm_source=get_text_value('webm_source');
						var ogg_source=get_text_value('ogg_source');
						var flash_source=get_text_value('flash_source');
						var autoplay=get_text_value('autoplay');
						var poster=get_text_value('poster');
						var width=get_text_value('width');
						var height=get_text_value('height');
						var align=get_text_value('align');

						if(mp4_source!='') mp4_source=' mp4_source="'+mp4_source+'"';
						else mp4_source='';
						if(webm_source!='') webm_source=' webm_source="'+webm_source+'"';
						else webm_source='';
						if(ogg_source!='') ogg_source=' ogg_source="'+ogg_source+'"';
						else ogg_source='';
						if(flash_source!='') flash_source=' flash_source="'+flash_source+'"';
						else flash_source='';
						if(autoplay!='...') autoplay=' autoplay="'+autoplay+'"';
						else autoplay='';
						if(poster!='') poster=' poster="'+poster+'"';
						else poster='';
						if(width!=0) width=' width="'+width+'"';
						else width='';
						if(height!=0) height=' height="'+height+'"';
						else height='';
						if(align!='...') align=' align="'+align+'"';
						else align=''
			
						return '[html5video'+mp4_source+webm_source+ogg_source+flash_source+autoplay+poster+width+height+align+']';
						
					break;
				}
				break;
			
		}
		

		if(error!='') display_error();
		else {
				jQuery('#sc_error').hide();
				return sc;
		}
			 
		e.preventDefault();
		return '';
	
	}
	
});


