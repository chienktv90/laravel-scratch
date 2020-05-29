$(window).on("load scroll", function(){
	if($(".navbar").offset().top == 0){
		$(".navbar").css("border-bottom","5px solid #8e1537");
	}else{
		$(".navbar").css("border-bottom","none");
	}
	
});

$(window).load(function(){

	"use strict";
 
	
	/* ========================================================== */
	/*   Popup-Gallery                                            */
	/* ========================================================== */
	$('.popup-gallery').find('a.popup1').magnificPopup({
		type: 'image',
		gallery: {
		  enabled:true
		}
	}); 
	
	$('.popup-gallery').find('a.popup2').magnificPopup({
		type: 'image',
		gallery: {
		  enabled:true
		}
	}); 
 
	$('.popup-gallery').find('a.popup3').magnificPopup({
		type: 'image',
		gallery: {
		  enabled:true
		}
	}); 
 
	$('.popup-gallery').find('a.popup4').magnificPopup({
		type: 'iframe',
		gallery: {
		  enabled:false
		}
	});
 
	
	/* ========================================================== */
	/*   Navigation Color                                         */
	/* ========================================================== */
	
	// $('#navbar-collapse-02').onePageNav({
		// filter: ':not(.external)'
	// });


	/* ========================================================== */
	/*   SmoothScroll                                             */
	/* ========================================================== */
	
	$(".nav li a, a.scrool").click(function(e){
		var full_url = this.href;
		if(full_url.indexOf("#") != -1){
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top;
			
			$('html,body').stop().animate({scrollTop:target_top -76}, 1000);
				return false;
		}else{
			window.location = full_url;
		}
	});


	/* ========================================================== */
	/*   Contact                                                  */
	/* ========================================================== */
	$('#contact-form').each( function(){
		var form = $(this);
		//form.validate();
		form.submit(function(e) {
			if (!e.isDefaultPrevented()) {
				jQuery.post(this.action,{
					'names':$('input[name="contact_names"]').val(),
					'subject':$('input[name="contact_subject"]').val(),
					'email':$('input[name="contact_email"]').val(),
					'phone':$('input[name="contact_phone"]').val(),
					'message':$('textarea[name="contact_message"]').val(),
				},function(data){
					form.fadeOut('fast', function() {
						$(this).siblings('p').show();
					});
				});
				e.preventDefault();
			}
		});
	})

	
});
	
	/* ========================================================== */
	/*   Page Loader                                              */
	/* ========================================================== */
	  $('#loader').fadeOut(100);
	  
$(window).ready(function(){
	$('#slide_banner').owlCarousel({
		loop:true,
		autoplay: true,
		smartSpeed: 2500,
		center:true,
		dots: false,
		animateOut: 'fadeOut',
		items:1
	});
	
	$('#slide_kids').owlCarousel({
		loop:true,
		nav:true,
		navText : ["Prev","Next"],
		dots: false,
		autoplay: false,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		responsive:{
			0:{
				items:1
			},
			530:{
				items:2
			},
			750:{
				items:2
			},
			970:{
				items:3
			}
		}
	});
});