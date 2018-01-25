jQuery(function() {
    jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        jQuery(this).ekkoLightbox();
    });
});

jQuery(function() {

    jQuery('.tab-header').on('click', function() {
        var clickedCountry = jQuery(this).find('span').text();

        jQuery('.tab-country').each(function() {
            jQuery(this).removeClass('tab-open');
            if (jQuery(this).find('h1').text() == clickedCountry) {
                jQuery(this).addClass('tab-open');
            }
        });

        jQuery('#' + jQuery(this).attr('id') + '_block').addClass('tab-open');
        return false;
        google.maps.event.trigger(map, 'resize');
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
        var map = new google.maps.Map( $el[0], args);

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

/**
 * Animated Grid V 0.1
 * jQuery plugin for animate hiding and showing of a grid of several items
 * @author NOE Interactive
 * @website http://noe-interactive.com
 * @licence MIT
 * 
 * @todo : if you toggle quickly it's could be weird
 */
/*global jQuery:false */
;(function(namespace, $) {
    "use strict";
    
    var Grid = function($wrapper, options) {

        this.options = $.extend({
            //is the DOM in the same order than display ?
            //set to true if you use a script like Packery that change order
            //let false in a simple float:left case for example
            needSorter : false,
            //wrapper class
            wrapperClass : 'animated-grid',
            //ignore element having this class
            hiddenClass : 'grid-item-hidden',
            //class for the disappear animation
            disappearClass : 'grid-item-disappear',
            //by default, Animated grid considere each children of the wrapper has an item $wrapper.children()
            //you can pass a selector as a string to look for only this item : $wrapper.find(selector)
            itemsSelector : null,
            //delay between each item
            delay : 100,
            //we animate individualy 5 items, then we group all the others into one animation
            limitToGroup : 5,
            //css transition duration
            transitionDuration : 200,
            //default sorter method if needSorter = true
            sorter : function(a, b) {
                            var at = a.top(),
                            bt = b.top(),
                            al = a.left(),
                            bl = b.left();
                            return at <bt ? -1 : (at === bt && al < bl ? -1 : 1 );
                }
        }, options || {});
        
        this.$items = null;
        this.$wrapper = null;
        this.$$items = [];
        this.visible = true;
        
        if($wrapper && $wrapper.length) {
            this.$wrapper = $wrapper.addClass(this.options.wrapperClass);

            this.$items = this.options.itemsSelector && this.options.itemsSelector.length ? this.$wrapper.find(this.options.itemsSelector) : this.$wrapper.children();
            this.$$items = [];
            var i = 0, L = this.$items.length;
            for(; i<L; i++)  this.addItem($(this.$items[i]));            
            
            $wrapper.data('animated-grid', this);
        }
    };

    Grid.prototype = {
        addItem : function($item) {
            this.$$items.push({
                $e : $item,  
                top : function() {return Number(this.$e[0].style.top.replace('px', ''));}, 
                left : function() {return Number(this.$e[0].style.left.replace('px', ''));}
            });
        },
       show : function(cb) {
            var scope = this;
            var tmp = this.getActive(),
                    i = 0, L = tmp.length;
            var limit = Math.min(this.options.limitToGroup, L);
            for(; i<limit; i++) {
                
                (function(i) {
                    var delay = i*scope.options.delay;
                    setTimeout(function() {
                        tmp[i].$e.removeClass(scope.options.disappearClass);
                    }, delay);
                })(i);
            }
            setTimeout(function() {
                for(i = limit; i< L; i++) {
                    tmp[i].$e.removeClass(scope.options.disappearClass);
                }
            }, limit * scope.options.delay);
            cb && setTimeout(function() {
                cb();
            }, limit * scope.options.delay + scope.options.transitionDuration);
            this.visible = true;
       },
       hide : function(cb) {
            var scope = this;
            var tmp = this.getActive(),
                  number = tmp.length, i = 0;
            var limit = Math.min(this.options.limitToGroup, number);
            
            for(i = limit; i<number; i++) {
                tmp[i].$e.addClass(scope.options.disappearClass);
            }
            
            for(i =0; i<limit; i++) {
                (function(i) {
                    setTimeout(function() {
                        tmp[i].$e.addClass(scope.options.disappearClass);
                    }, (Math.min(scope.options.limitToGroup, number) -i) * scope.options.delay);
                })( i );
            }

            cb && setTimeout(function() {
                cb();
            }, Math.max(2, limit) * scope.options.delay + scope.options.transitionDuration);
            this.visible = false;
       },
       toggle : function(cb) {
            this[this.visible ? 'hide' : 'show'].call(this, cb);
       },
       getActive : function() {
            var tmp = [];
            var scope = this;
            this.each(function() {
                !this.$e.hasClass(scope.options.hiddenClass) && tmp.push(this);
            });
            
            return this.options.needSorter === true ? tmp.sort(this.options.sorter) : tmp;
       },
       each : function(cb) {
            var i = 0, L = this.$$items.length;
            for(; i<L; i++) cb.call(this.$$items[i]);
       }
    };
    
    //you can use OOP' style, or like a jQuery plugin
    namespace.AnimatedGrid = Grid;

    //jQuery plugin
    $.fn.AnimatedGrid = function(opt) {
        var arg = Array.prototype.splice.call(arguments, 1, arguments.length); //remove first argument
        return this.each(function() {
            if(!opt || typeof opt === 'object') {
                new Grid($(this), opt);
            } else {
                var instance = $(this).data('animated-grid');
                if(!instance) {
                    throw 'No animated-grid instance found';
                } else {
                    if(typeof instance[opt] === 'function') {
                        instance[opt].apply(instance, arg);
                    } else {
                        instance[opt] = arg[0] || null;
                    }
                }
            }
        });
    };
    
})(window, jQuery);
