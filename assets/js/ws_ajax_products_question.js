jQuery(function(){
    jQuery('#product_question').click(function(){
        jQuery('#product_question_message').removeClass().addClass('pull-left').html();
        var name = jQuery('#inputname').val();
		var email = jQuery('#inputemail').val();
        var phone = jQuery('#inputphone').val();
		var comment = jQuery('#inputcomment').val();
		var product = jQuery('#inputproduct').val();

		if (name === '' || email === '' || phone === '' || comment === '' || product === '')
		{
			jQuery('#product_question_message').html('All fields required').addClass('pull-left text-danger');
		}
		else
		{
            jQuery.ajax({
                url: wsajaxproductsquestion.ajaxurl,
                type: 'post',
                data: {
                    action: 'productquestion',
                    name: name, 
                    email: email, 
                    phone: phone, 
                    comment: comment, 
                    product: product
                },
                beforeSend: function() {
                    jQuery('.btn-loading').removeClass('hidden');
                },
                success: function( data ) {
                    if (data == 'OK')
                    {
                        jQuery('.btn-loading').addClass('hidden');
                        jQuery('input, textarea').val('');
                        jQuery('#product_question_message').html('Data sent').addClass('pull-left text-success');
                        
                    }
                }
            })
			
		}

	});
})