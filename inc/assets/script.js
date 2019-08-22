(function ($) {
    $(function () {


        $( '.wcd-hero-slider' ).each(function() {

            var nav = $( this ).data('nav');
            var slideFade = $( this ).data('fade');
            var slideSpeed = $( this ).data('speed');
            var slideInfinite = $( this ).data('infinite');

            if( nav == 'arrows' ) {
                var slideArrows = true;
                var slideDots = false;
            } else {
                var slideArrows = false;
                var slideDots = true;
            }

            $( this ).slick({
                dots: slideDots,
                infinite: slideInfinite,
                arrows: slideArrows,
                slidesToShow: 1,
                fade: slideFade,
                speed: slideSpeed
            });
            
        });

    });
})(jQuery);