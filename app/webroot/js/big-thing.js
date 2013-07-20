$(document).ready(function() {

	/* init testimonial fade slider */
	$('.flexslider').flexslider({
			directionNav: false,
			slideshowSpeed: 6000, /* adjust the speed in milliseconds */
			useCSS: true,
			touch: true,
			controlNav: false,
			pauseOnAction: true,
			pauseOnHover: false
			
	});

	// init scroll-to effect navigation, adjust the scroll speed in milliseconds
	$('#main-menu').localScroll(1000);
	$('.hero-text').localScroll(1000);	


	// init carousels
  	$('#hero-carousel').carousel();

	// feature detection and polyfill
	
	var theForm = $('.ie8 form');
	
	theForm.find('input, textarea').each(function(){
		
		// if HTML5 input placeholder is not supported
		var placeholderText = $(this).attr('placeholder');
		
		if(placeholderText){
			
			$(this)
				.addClass('input-placeholder')
				.val(placeholderText)
				.bind('focus', function(){
				
					if($(this).val() == placeholderText ){
						
						$(this).val('').removeClass('input-placeholder');
					}
				
				})
				.bind('blur', function(){
					
					if($(this).val() == '' ){
					
						$(this).val(placeholderText).addClass('input-placeholder');
					}
				});
		}				
	});

});