/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.4
	Theme 	: Shutter 1.1
	
	Site	: www.buildinternet.com/project/supersized
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License

*/

(function($){
	
	theme = {
	 	
	 	
	 	/* Initial Placement
		----------------------------*/
	 	_init : function(){
		

		
		
			if( $(vars.main).hasClass('closed') ||  $('#main').length==0 )   {
			
		
	
				$(vars.thumb_tray).css({display:'block'}).stop().animate({bottom:'-81px'},300);
				
				if ($(vars.slide_caption).length){
			
					$(vars.slide_caption).html(api.getField('title')).css({color:api.getField('textcolor')}); 
					Cufon.replace($(vars.slide_caption));  
					$(vars.slide_caption).css({display:'block'}).stop().fadeTo(300,1);
					
				}
				
				

			
			}
			
			//open menu
			$('#open_btn_header').click(function(){
			
				$('#header').css({display:'block'}).stop().animate({left:'0px'},400,'easeInOutQuad');
				
			});
			
			
			//close menu
			$('#close_btn_header').click(function(){
			
				$('#header').stop().animate({left:'-200px'},400,'easeInOutQuad',
				function(){
				
					$(this).css({display:'none'});
				
				});
			
			});
			
			
			//open window
			$(vars.open_btn).click(function(){
			
				$('#header').css({display:'block'}).stop().animate({left:'0px'},400,'easeInOutQuad',
				function(){
				
					$(vars.main).css({display:'block'}).stop().animate({left:'172px'},800,'easeInOutQuad',
					function(){
					
					    $('#close_btn').removeClass('hidden').animate({left:'929px'},400,'easeInOutQuad', 
						function(){
						
							$(vars.main).removeClass('closed');

							$(vars.slide_caption).stop().fadeTo(300,0, 
							function(){
								$(this).css({display:'none'});
							});
						
						
						});
					


					});

					$(vars.thumb_tray).stop().animate({bottom:'-150px'},300);
				  
				});
			


				

				  
			});
			
			//close window
			$(vars.close_btn).click(function(){
			
			
				$(this).stop().animate({left:'850px'},400,'easeInOutQuad',
				function(){
				
				    $(this).addClass('hidden');
				
					$(vars.main).stop().animate({left:'-800px'},800,'easeInOutQuad',
					function(){

						$('#header').stop().animate({left:'-200px'},400,'easeInOutQuad',
						function(){

							$(this).css({display:'none'});
							$(vars.main).addClass('closed').css({display:'none'});

							api.resizeNow();

							if ($(vars.slide_caption).length){
		
								$(vars.slide_caption).html(api.getField('title')).css({color:api.getField('textcolor')}); 
								Cufon.replace($(vars.slide_caption));  
								$(vars.slide_caption).css({display:'block'}).stop().fadeTo(300,1);
							
							}

							$(vars.thumb_tray).css({display:'block'}).stop().animate({bottom:'-81px'},300);
						
						});		
					
					});
				
				
				});
			
			   
			});
			
	
			
	 		// Center Slide Links
	 		if (api.options.slide_links) $(vars.slide_list).css('margin-left', -$(vars.slide_list).width()/2);
	 		
			// Start progressbar if autoplay enabled
    		if (api.options.autoplay){
    			if (api.options.progress_bar) theme.progressBar();
			}else{
				if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "play.png");	// If pause play button is image, swap src
				if (api.options.progress_bar) $(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );	//  Place progress bar
			}
			
			
			/* Thumbnail Tray
			----------------------------*/
			// Hide tray off screen
			//$(vars.thumb_tray).animate({bottom : -$(vars.thumb_tray).height()}, 0 );
			
			// Thumbnail Tray Toggle
			/*
			$(vars.tray_button).toggle(function(){
				$(vars.thumb_tray).stop().animate({bottom : 0, avoidTransforms : true}, 300 );
				if ($(vars.tray_arrow).attr('src')) $(vars.tray_arrow).attr("src", vars.image_path + "button-tray-down.png");
				return false;
			}, function() {
				$(vars.thumb_tray).stop().animate({bottom : -$(vars.thumb_tray).height(), avoidTransforms : true}, 300 );
				if ($(vars.tray_arrow).attr('src')) $(vars.tray_arrow).attr("src", vars.image_path + "button-tray-up.png");
				return false;
			});
			*/
			
			// Make thumb tray proper size
			$(vars.thumb_list).width($('> li', vars.thumb_list).length * $('> li', vars.thumb_list).outerWidth(true));	//Adjust to true width of thumb markers
			
			// Display total slides
			/*
			if ($(vars.slide_total).length){
				$(vars.slide_total).html(api.options.slides.length);
			}
			*/
			
			
			/* Thumbnail Tray Navigation
			----------------------------*/	
			if (api.options.thumb_links){
				//Hide thumb arrows if not needed
				if ($(vars.thumb_list).width() <= $(vars.thumb_tray).width()){
					$(vars.thumb_back +','+vars.thumb_forward).fadeOut(0);
				}
				
				// Thumb Intervals
        		vars.thumb_interval = Math.floor($(vars.thumb_tray).width() / $('> li', vars.thumb_list).outerWidth(true)) * $('> li', vars.thumb_list).outerWidth(true);
        		vars.thumb_page = 0;
        		
        		// Cycle thumbs forward
        		$(vars.thumb_forward).click(function(){
        			if (vars.thumb_page - vars.thumb_interval <= -$(vars.thumb_list).width()){
        				vars.thumb_page = 0;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}else{
        				vars.thumb_page = vars.thumb_page - vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}
        		});
        		
        		// Cycle thumbs backwards
        		$(vars.thumb_back).click(function(){
        			if (vars.thumb_page + vars.thumb_interval > 0){
        				vars.thumb_page = Math.floor($(vars.thumb_list).width() / vars.thumb_interval) * -vars.thumb_interval;
        				if ($(vars.thumb_list).width() <= -vars.thumb_page) vars.thumb_page = vars.thumb_page + vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
					}else{
        				vars.thumb_page = vars.thumb_page + vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}
        		});
				
			}
			
			
			/* Navigation Items
			----------------------------*/
		    $(vars.next_slide).click(function() {
		    	api.nextSlide();
		    });
		    
		    $(vars.prev_slide).click(function() {
		    	api.prevSlide();
		    });
		    
	

				
			
			if (api.options.thumbnail_navigation){
				// Next thumbnail clicked
				$(vars.next_thumb).click(function() {
			    	api.nextSlide();
			    });
			    // Previous thumbnail clicked
			    $(vars.prev_thumb).click(function() {
			    	api.prevSlide();
			    });
			}
			
		    $(vars.play_button).click(function() {
				api.playToggle();						    
		    });
			
			
			/* Thumbnail Mouse Scrub
			----------------------------*/
			

			
			
			/* Window Resize
			----------------------------*/
			$(window).resize(function(){
				
				// Delay progress bar on resize
				if (api.options.progress_bar && !vars.in_animation){
					if (vars.slideshow_interval) clearInterval(vars.slideshow_interval);
					if (api.options.slides.length - 1 > 0) clearInterval(vars.slideshow_interval);
					
					$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
					
					if (!vars.progressDelay && api.options.slideshow){
						// Delay slideshow from resuming so Chrome can refocus images
						vars.progressDelay = setTimeout(function() {
								if (!vars.is_paused){
									theme.progressBar();
									vars.slideshow_interval = setInterval(api.nextSlide, api.options.slide_interval);
								}
								vars.progressDelay = false;
						}, 1000);
					}
				}
				
				// Thumb Links
				if (api.options.thumb_links && vars.thumb_tray.length){
					// Update Thumb Interval & Page
					vars.thumb_page = 0;	
					vars.thumb_interval = Math.floor($(vars.thumb_tray).width() / $('> li', vars.thumb_list).outerWidth(true)) * $('> li', vars.thumb_list).outerWidth(true);
					
					// Adjust thumbnail markers
					if ($(vars.thumb_list).width() > $(vars.thumb_tray).width()){
						$(vars.thumb_back +','+vars.thumb_forward).fadeIn('fast');
						$(vars.thumb_list).stop().animate({'left':0}, 200);
					}else{
						$(vars.thumb_back +','+vars.thumb_forward).fadeOut('fast');
					}
					
				}
			});	
			
			//thumb tray animation
			
			$(vars.thumb_tray).hover(function(){ 

				$(this).stop().animate({bottom:0, avoidTransforms : true},300);
				return false;
				

			},function(){

				$(this).stop().animate({bottom:'-80px', avoidTransforms : true},300);
				return false;

			});	
			
			
			
			
			
								
	 	},
	 	
	 	
	 	/* Go To Slide
		----------------------------*/
	 	goTo : function(){
	 		if (api.options.progress_bar && !vars.is_paused){
				$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
				theme.progressBar();
			}
		},
	 	
	 	/* Play & Pause Toggle
		----------------------------*/
	 	playToggle : function(state){
	 		
	 		if (state =='play'){
	 			// If image, swap to pause
	 			if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "pause.png");
				if (api.options.progress_bar && !vars.is_paused) theme.progressBar();
	 		}else if (state == 'pause'){
	 			// If image, swap to play
	 			if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "play.png");
        		if (api.options.progress_bar && vars.is_paused)$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
	 		}
	 		
	 	},
	 	
	 	
	 	/* Before Slide Transition
		----------------------------*/
	 	beforeAnimation : function(direction){
		

		    if (api.options.progress_bar && !vars.is_paused) $(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
		  	
		  	/* Update Fields
		  	----------------------------*/
		  	// Update slide caption
		   	//if ($(vars.slide_caption).length){
		   		//(api.getField('title')) ? $(vars.slide_caption).html(api.getField('title')) : $(vars.slide_caption).html('');
		   	//}
			
			if($(vars.main).hasClass('closed') || $('#main').length==0 )   $(vars.slide_caption).stop().fadeTo(300,0);
		    
		    
		    // Highlight current thumbnail and adjust row position
		    if (api.options.thumb_links){
		    
				$('.current-thumb').removeClass('current-thumb');
				$('li', vars.thumb_list).eq(vars.current_slide).addClass('current-thumb');
				
				// If thumb out of view
				if ($(vars.thumb_list).width() > $(vars.thumb_tray).width()){
					// If next slide direction
					if (direction == 'next'){
						if (vars.current_slide == 0){
							vars.thumb_page = 0;
							$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						} else if ($('.current-thumb').offset().left - $(vars.thumb_tray).offset().left >= vars.thumb_interval){
	        				vars.thumb_page = vars.thumb_page - vars.thumb_interval;
	        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						}
					// If previous slide direction
					}else if(direction == 'prev'){
						if (vars.current_slide == api.options.slides.length - 1){
							vars.thumb_page = Math.floor($(vars.thumb_list).width() / vars.thumb_interval) * -vars.thumb_interval;
							if ($(vars.thumb_list).width() <= -vars.thumb_page) vars.thumb_page = vars.thumb_page + vars.thumb_interval;
							$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						} else if ($('.current-thumb').offset().left - $(vars.thumb_tray).offset().left < 0){
							if (vars.thumb_page + vars.thumb_interval > 0) return false;
	        				vars.thumb_page = vars.thumb_page + vars.thumb_interval;
	        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						}
					}
				}
				
				
			}
		    
	 	},
	 	
	 	
	 	/* After Slide Transition
		----------------------------*/
	 	afterAnimation : function(){
	 		if (api.options.progress_bar && !vars.is_paused) theme.progressBar();	//  Start progress bar
			

			
			if ($(vars.slide_caption).length && ( $(vars.main).hasClass('closed') || $('#main').length==0 ) ){
		   		if(api.getField('title'))  { 
				
					$(vars.slide_caption).html(api.getField('title')).css({color:api.getField('textcolor')}); 
					Cufon.replace($(vars.slide_caption));  
					$(vars.slide_caption).css({display:'block'}).stop().fadeTo(300,1);
				}
		    }
			
	 	},
	 	
	 	
	 	/* Progress Bar
		----------------------------*/
		progressBar : function(){
    		if($(vars.main).hasClass('closed') || $('#main').length==0 )   $(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 ).animate({ left:0 }, api.options.slide_interval);
    	}
	 	
	 
	 };
	 
	 
	 /* Theme Specific Variables
	 ----------------------------*/
	 $.supersized.themeVars = {
	 	
	 	// Internal Variables
		progress_delay		:	false,				// Delay after resize before resuming slideshow
		thumb_page 			: 	false,				// Thumbnail page
		thumb_interval 		: 	false,				// Thumbnail interval
		image_path			:	'img/',				// Default image path
													
		// General Elements							
		play_button			:	'#pauseplay',		// Play/Pause button
		next_slide			:	'#nextslide',		// Next slide button
		prev_slide			:	'#prevslide',		// Prev slide button
		next_thumb			:	'#nextthumb',		// Next slide thumb button
		prev_thumb			:	'#prevthumb',		// Prev slide thumb button
		
		slide_caption		:	'#slidecaption',	// Slide caption
		slide_current		:	'.slidenumber',		// Current slide number
		slide_total			:	'.totalslides',		// Total Slides
		slide_list			:	'#slide-list',		// Slide jump list							
		
		thumb_tray			:	'#thumb-tray',		// Thumbnail tray
		thumb_list			:	'#thumb-list',		// Thumbnail list
		
		thumb_up		:	'#thumb-up',	// Cycles forward through thumbnail list
		
		main		:	'#main',	
		
		open_btn		:	'#open_btn',	
		close_btn		:	'#close_btn',	

		
		thumb_forward		:	'#thumb-forward',	// Cycles forward through thumbnail list
		thumb_back			:	'#thumb-back',		// Cycles backwards through thumbnail list
		tray_arrow			:	'#tray-arrow',		// Thumbnail tray button arrow
		tray_button			:	'#tray-button',		// Thumbnail tray button
		
		progress_bar		:	'#progress-bar'		// Progress bar
	 												
	 };												
	
	 /* Theme Specific Options
	 ----------------------------*/												
	 $.supersized.themeOptions = {					
	 						   
		progress_bar		:	1,		// Timer for each slide											
		mouse_scrub			:	1		// Thumbnails move with mouse
		
	 };
	
	
})(jQuery);