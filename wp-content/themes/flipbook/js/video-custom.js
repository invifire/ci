jQuery(document).ready(function() {

			//html5
			
			VideoJS.setupAllWhenReady();
			
			VideoJS.DOMReady(function(){
				  var myPlayer = VideoJS.setup("full_screen_video");
				  myPlayer.enterFullWindow();
				  myPlayer.play();
			});

			jQuery('#flash_fallback_1').css({height:jQuery(window).height()});

			jQuery(window).resize(function() {
			
				jQuery('#flash_fallback_1').css({height:jQuery(window).height()});
				
			});
	
			//open menu
			jQuery('#open_btn_header').click(function(){
			
				jQuery('#header').css({display:'block'}).stop().animate({left:'0px'},400,'easeInOutQuad');
				
			});
			
			
			//close menu
			jQuery('#close_btn_header').click(function(){
			
				jQuery('#header').stop().animate({left:'-200px'},400,'easeInOutQuad',
				function(){
				
					jQuery(this).css({display:'none'});
				
				});
			
			});
			
			
			//open window
			jQuery('#open_btn').click(function(){
			
				jQuery('#header').css({display:'block'}).stop().animate({left:'0px'},400,'easeInOutQuad',
				function(){
				
					jQuery('#main').css({display:'block'}).stop().animate({left:'172px'},800,'easeInOutQuad',
					function(){
					
					    jQuery('#close_btn').removeClass('hidden').animate({left:'929px'},400,'easeInOutQuad');
					


					});


				  
				});
			


				

				  
			});
			
			//close window
			jQuery('#close_btn').click(function(){
			
			
				jQuery(this).stop().animate({left:'850px'},400,'easeInOutQuad',
				function(){
				
				    jQuery(this).addClass('hidden');
				
					jQuery('#main').stop().animate({left:'-800px'},800,'easeInOutQuad',
					function(){

						jQuery('#header').stop().animate({left:'-200px'},400,'easeInOutQuad',
						function(){

							jQuery(this).css({display:'none'});
							jQuery(vars.main).addClass('closed').css({display:'none'});

						
						
						});		
					
					});
				
				
				});
			
			   
			});
	
	
	
});