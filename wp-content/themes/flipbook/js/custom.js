jQuery(document).ready(function(){
	
	//cufon
	Cufon.replace('h1, h2, h3, h4', {hover: true});  
	Cufon.replace('#footer h3, .sidebar h3', {hover: true});  
	Cufon.replace('#nav li a', {hover: true}); 
	Cufon.replace('#slidetitle'); 
	Cufon.now();
	

	//menu
	jQuery(' #nav ul ').css({display: 'none'}); // Opera Fix
	
    jQuery(' #nav > li > a').mouseenter(function(){

	    jQuery(this).addClass('hover');
        jQuery(this).siblings('.sub-menu').css({display:'block'});
        var submenu_items=jQuery(this).siblings('.sub-menu').children('li').children('a');
		var mi=0;
		
		interval3 = setInterval(function() {
		
			submenu_items.eq(mi).animate({right:'0px'},400,'easeOutQuint');
			mi++;
			if(mi==submenu_items+1) clearInterval(interval3);

		}, 150);
		
	});	
	
	jQuery(' #nav > li ').mouseleave(function(){
	
		clearInterval(interval3);
		jQuery(this).children('a').removeClass('hover');
		jQuery(this).find('a').css({paddingLeft:'10px'});
		jQuery(this).children('.sub-menu').children('li').children('a').stop().css({right:'200px'});
		jQuery(this).children('.sub-menu').stop().css({display:'none'});
	
	});
	
	
		
	

	
	jQuery('#nav > li > a').hover(function(){ 
	
	    jQuery(this).stop(true,true).animate({paddingRight:'25px'},300,'linear');

	},function(){
		
	    jQuery(this).stop().animate({paddingRight:'10px'},300,'linear');
		
	});	
	
	jQuery('#nav li ul li a').hover(function(){ 
	
	    jQuery(this).stop(true,true).animate({paddingLeft:'25px'},300,'linear');

	},function(){
		
	    jQuery(this).stop().animate({paddingLeft:'10px'},300,'linear');
		
	});	
	
	
	


	//image hover
	jQuery('.frame a.icon_zoom,.frame a.icon_play,.frame a.icon_link').hover(function(){ 
		jQuery(this).children('.image_overlay').stop().fadeTo(400, 0.5); 
	},function(){
		jQuery(this).children('.image_overlay').stop().fadeTo(400, 0); 
	});	


	
	//lightbox 
	jQuery('a.lightbox[href*="http://vimeo.com/"]').each(function() {
		jQuery(this).attr('href',this.href.replace('vimeo.com/', 'player.vimeo.com/video/'));
	});
	jQuery('a.lightbox[href*="http://player.vimeo.com/"]').each(function() {
		jQuery(this).removeClass('lightbox').addClass('cboxVideo');
	});
	
	jQuery('a.lightbox[href*="http://www.youtube.com/watch?"]').each(function() {
		jQuery(this).attr('href',this.href.replace('watch?v=', 'v/'));
	});
	jQuery('a.lightbox[href*="http://www.youtube.com/v/"]').each(function() {
		jQuery(this).removeClass('lightbox').addClass('cboxVideo');
	});

	
	jQuery('a.lightbox').colorbox({
		transition:'elastic',
		opacity:1,
		maxWidth:'80%',
		maxHeight:'80%',
		onComplete: function(){
			Cufon.replace('#cboxTitle');
		}
	});
	
	jQuery('a.cboxVideo').colorbox({
		transition:'elastic',
		opacity:1,
		innerWidth:800,
		innerHeight:450,
		iframe:true,
		scrolling:false,
		onComplete: function(){
			Cufon.replace('#cboxTitle');	
		}
	});



	jQuery('form').find('input, textarea').each(function(){         
		if(jQuery(this).attr('required')) {
			jQuery(this).addClass('required').removeAttr('required');
		}
		jQuery(this).addClass(jQuery(this).attr('type'));
	});


	jQuery('.contact_form').validate({

		highlight: function(element, errorClass) {
			jQuery(element).addClass('invalid');
		},

		unhighlight: function(element, errorClass) {
			jQuery(element).removeClass('invalid');
		},

		errorPlacement: function(error, element) {

		},

		submitHandler: function(form) {

			jQuery.post(form.action,{
				'to':jQuery('input[name="contact_to"]').val(),
				'name':jQuery('input[name="contact_name"]').val(),
				'email':jQuery('input[name="contact_email"]').val(),
				'content':jQuery('textarea[name="contact_content"]').val()
			},function(){
				jQuery(form).fadeOut(400, function() {
					jQuery(this).siblings('.success').removeClass('hidden');
				});
			});
		}
	
	});







	
});


