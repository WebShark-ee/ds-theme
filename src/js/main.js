



if($(window).width() > 1200) {
  function init() {

    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 10,
            navbar = $(".navbar-default");
        if (distanceY > shrinkOn) {
            $(navbar).addClass('navbar-fixed-top')
        } else {

            if ($(navbar).hasClass('navbar-fixed-top')) {
                  
                  $(navbar).removeClass('navbar-fixed-top')
                
            }
        }
    });
}
window.onload = init();
}


$('.input-switch').on('click',function(){

	if($(this).prop('checked')) {
	   $('.switch-span-dollar').addClass('active')
	   $('.switch-span-euro').removeClass('active')
	} else {
	  $('.switch-span-euro').addClass('active')
	  $('.switch-span-dollar').removeClass('active')
	}

});
$('.input-switch-big').on('click',function(){

  if($('.input-switch').prop('checked')) {
     $('.switch-span-dollar').addClass('active')
     $('.switch-span-euro').removeClass('active')
  } else {
    $('.switch-span-euro').addClass('active')
    $('.switch-span-dollar').removeClass('active')
  }

});

$('.nav-tabs > li a').on('click',function(){

  if($(this).hasClass('li1')){
    $('.span-change').text('What’s in the set')
  }
  if($(this).hasClass('li2')){
    $('.span-change').text('Specifications')
  }
  if($(this).hasClass('li3')){
    $('.span-change').text('Additional information')
  }
  if($(this).hasClass('li4')){
    $('.span-change').text('Features')
  }
  if($(this).hasClass('li5')){
    $('.span-change').text('Downloads')
  }
  if($(this).hasClass('li6')){
    $('.span-change').text('Compatible accessories')
  }
});

//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
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

$( ".btn-primary" ).on('click',function(){
  $( this ).toggleClass( "btn-disabled" );
});
jQuery(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
})