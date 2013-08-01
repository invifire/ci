jQuery(document).ready(function($) {


	var ie8=( jQuery.browser.msie &&  parseInt(jQuery.browser.version) == 8 );

	var $container = jQuery('#entry_list');
	$container.imagesLoaded(function(){
	  $container.masonry({
		itemSelector : '.entry_item',
		gutterWidth: 0,
		isAnimated: true
	  }
	  , make_greyscales()  );
	});
	
	var interval1,$clicked='entry_item';

	function showItems($var){
	
		jQuery('#categories li a').unbind('click', itemClicked); 
		jQuery('#categories li a').bind('click', itemClicked);
	
		$len=$var.length;
		$i=0;
		
		interval1 = setInterval(function() {
			
				if(!ie8) {
				
					$var.eq($i).removeClass('hidden').stop(true,true).animate({opacity:'1'},300,'easeOutCubic');
					$var.eq($i).find('.image_container').stop(true,true).animate({top:'0px'},300,'easeOutCubic');

				}	
				else $var.eq($i).stop().css({display:'block'});
				
				$i++;
				if($i==$len) { clearInterval(interval1);  }

			}, 50);

	}

	jQuery(".entry_item").hover(function(){ 
	
		jQuery(this).find('.grayscale_container').stop().animate({opacity:'0'},600,'easeOutCubic');

	},function(){
				  

		jQuery(this).find('.grayscale_container').stop().animate({opacity:'1'},600,'easeOutCubic');
		
	});
	
	function make_greyscales(){
	
		if(!ie8)
		
		jQuery('.entry_item .image_container img').each(function(){
			var el = jQuery(this);
			el.clone().insertBefore(el).queue(function(){
			var el = jQuery(this);
			el.siblings('img').css({zIndex:1});
			el.wrap("<div class='grayscale_container' style='display: block; z-index:2'>");
			el.dequeue();
			
			});
			this.src = grayscale(this.src);
		});
		
		showItems(jQuery('.entry_item'));
	
	}
	
	


	var itemClicked = function() {
	
	
		$category=jQuery(this).attr('data-cat');
		
		if($clicked!=$category && $category) {

			$clicked=$category;
			clearInterval(interval1); 
			jQuery('#categories li a').unbind('click', itemClicked);
			jQuery('#categories li a').removeClass('current');
			jQuery(this).addClass('current');

			$entry_items=jQuery('#entry_list .entry_item');

			var doneOnce=0;
			$entry_items.stop(true,true).animate({opacity:0},300,'easeOutCubic', 
				function(){

					if(!ie8) jQuery(this).addClass('hidden');
					else jQuery(this).css({display:'none',opacity:1});	

				}
			);
			
			
			
			$entry_items.find('.image_container').stop(true,true).animate({top:'20px'},300,'easeOutCubic', 
				function(){
				
					if(ie8) jQuery(this).css({top:'0px'});	
				
					if(doneOnce==0) {
					
						doneOnce=1;
						if(!ie8) $container.masonry('destroy');
						$container.masonry({
							itemSelector : '#entry_list .'+$category,
							isAnimated: true
						},
						showItems(jQuery('#entry_list .'+$category))  );
						

					}

				}
			);

		} 
};

function grayscale(src){
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
    }


jQuery('#categories li a').bind('click', itemClicked);

});




