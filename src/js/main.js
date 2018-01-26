jQuery(function() {
    
    jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        jQuery(this).ekkoLightbox();
    });

    jQuery('.tab-header').on('click', function(event) {
        event.preventDefault();
        jQuery('.tab-country').addClass('hidden').hide();
        jQuery('#' + jQuery(this).attr('id') + '_block').removeClass('hidden').show();
        if (jQuery('#' + jQuery(this).attr('id') + '_block').hasClass('wasvisible'))
        {
            var maped = jQuery('#' + jQuery(this).attr('id') + '_block .acf-map-reseller');
            google.maps.event.trigger(maped, 'resize');
        }
        else
        {
            render_map( jQuery('#' + jQuery(this).attr('id') + '_block .acf-map-reseller') );
        }
        jQuery('#' + jQuery(this).attr('id') + '_block').addClass('wasvisible');
        return false;
    });

    // SET PRODUCT PAGE'S CAROUSEL's HEIGHT
    var carouselHeight = 0.70 * jQuery(window).innerHeight();
    var soughtHeight = carouselHeight + jQuery(window).scrollTop();
    jQuery(window).scroll(function() {
        var imgHeight = jQuery('.img-parallax').innerHeight();
        if (soughtHeight < carouselHeight + jQuery(window).scrollTop()) {
            soughtHeight = carouselHeight + jQuery(window).scrollTop();
            if (carouselHeight < imgHeight) {
                jQuery('#carousel, #carousel ul, #carousel li').css('max-height', soughtHeight+'px');
            }
        }
    });
    if (jQuery(window).width() > 1200) {
        
        if (jQuery('#main-content').height() > jQuery(window).height() - 40 ){
            function init() {
                window.addEventListener('scroll', function(e){
                    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                        shrinkOn = 60,
                        navbar = jQuery('.navbar-default');
                    if (distanceY > shrinkOn) {
                        jQuery(navbar).addClass('navbar-fixed-top');
                    } else {
                        if (jQuery(navbar).hasClass('navbar-fixed-top')) {
                            jQuery(navbar).removeClass('navbar-fixed-top')
                        }
                    }
                });
            }
            window.onload = init();

        }
    }
    jQuery('#currency_state').on('click',function(){

        if(jQuery(this).prop('checked')) {
           jQuery('.switch-span-dollar').addClass('active')
           jQuery('.switch-span-euro').removeClass('active')
        } else {
          jQuery('.switch-span-euro').addClass('active')
          jQuery('.switch-span-dollar').removeClass('active')
        }

    });
    jQuery('.input-switch-big').on('click',function(){

      if(jQuery('.input-switch').prop('checked')) {
         jQuery('.switch-span-dollar').addClass('active')
         jQuery('.switch-span-euro').removeClass('active')
      } else {
        jQuery('.switch-span-euro').addClass('active')
        jQuery('.switch-span-dollar').removeClass('active')
      }

    });

    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    jQuery('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = jQuery(this).attr('data-field');
        type      = jQuery(this).attr('data-type');
        var input = jQuery("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    jQuery(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    jQuery(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    jQuery('.input-number').focusin(function(){
       jQuery(this).data('oldValue', jQuery(this).val());
    });
    jQuery('.input-number').change(function() {

        minValue =  parseInt(jQuery(this).attr('min'));
        maxValue =  parseInt(jQuery(this).attr('max'));
        valueCurrent = parseInt(jQuery(this).val());

        name = jQuery(this).attr('name');
        if(valueCurrent >= minValue) {
            jQuery(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            jQuery(this).val(jQuery(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            jQuery(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            jQuery(this).val(jQuery(this).data('oldValue'));
        }


    });
    jQuery(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    jQuery( "a.btn-primary" ).on('click',function(){
        jQuery( this ).toggleClass( "btn-disabled" );
    });

    jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        jQuery(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
    
    
    /*
    *  render_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */

    function render_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            zoom		: 20,
            center		: new google.maps.LatLng(0, 0),
            mapTypeId	: google.maps.MapTypeId.ROADMAP
        };

        // create map	        	
        map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( jQuery(this), map );

        });

        // center map
        center_map( map );

    }

    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$marker (jQuery element)
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map,
            icon: 'https://projects.silvermuru.ee/ds/cmsc/wp-content/themes/ds/img/ds_pin.png'
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content		: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        jQuery.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }

    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */


	jQuery('.acf-map').each(function(){
		render_map( jQuery(this) );
	});
    
    var $grid = jQuery('.animated-grid');
    var grid = new AnimatedGrid($grid);                
    grid.visible = false;
    grid.toggle();
    
    jQuery('#carousel').flexslider({
        animation: "slide",
        easing: "easeInQuad",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel-slider"
    });
    
    jQuery('#carousel-slider').flexslider({
        animation: "slide",
        easing: "easeInQuad",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 120,
        itemMargin: 10,
        asNavFor: "#carousel",
    });
    
    jQuery('#tabs-collapse a').click(function(){
        parent.location.hash = jQuery(this).attr('href');
        var active_tab = window.location.hash.substring(1);
        jQuery('.animated-grid .loop-cart').attr('href', function() {
            return this.href.split('#')[0] + '#' + active_tab;
        });
    })
    
    if(window.location.hash) {
        var active_tab = window.location.hash.substring(1);
        jQuery('#tabs-collapse .active').removeClass('active');
        jQuery('#tabs-collapse a[href="#' + active_tab + '"]').parent('li').addClass('active');
        jQuery('.tab-content .active').removeClass('active');
        jQuery('#' + active_tab).addClass('active');
        jQuery('.animated-grid .loop-cart').attr('href', function() {
            return this.href + '#' + active_tab;
        });
    }
    
})
