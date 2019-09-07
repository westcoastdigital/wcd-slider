! function($) {
	$(function() {
        
		$(".wcd-hero-slider").each(function() {
			var nav = $(this).data("nav"),
				slideFade = $(this).data("fade"),
				slideSpeed = $(this).data("speed"),
				slideAutoplay = $(this).data("autoplay"),
                slideInfinite = $(this).data("infinite");
                
            if ( nav == "arrows") {
                var slideArrows = true;
                var slideDots = false;
            } else {
                var slideArrows = false;
                var slideDots = true;
            }

            if( slideAutoplay == "true" ) {
                var sliderAutoplay = 'true';
            } else {
                var sliderAutoplay = 'false';
            }


			$(this).slick({
				dots: slideDots,
				infinite: slideInfinite,
				arrows: slideArrows,
				slidesToShow: 1,
                fade: slideFade,
                autoplay: sliderAutoplay,
				speed: slideSpeed
            });
            
            $(this).parent().parent().css({
                'padding' : '0'
            });
            $(this).parent().css({
                'margin' : '0',
                'width' : '100%',
                'max-width' : '100vw'
            });

            $(this).show();

		});
	});
}(jQuery);