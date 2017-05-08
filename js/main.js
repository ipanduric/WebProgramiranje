jQuery(function($) {'use strict',

	// gallery filter
	
			$(window).load(function(){ $('.gallery-items').hide()});
//sortiranje prije klika
	$(window).load(function(){'use strict',
		$gallery_selectors = $('.gallery-filter >li>a');
		$('.gallery-filter >li>a').click(function(){$('.gallery-items').show()});
		if($gallery_selectors!='undefined'){
			$gallery = $('.gallery-items');
			$gallery.isotope({
				itemSelector : '.col-md-1',
				layoutMode : 'fitRows'
			});
			
			$gallery_selectors.on('click', function(){
				$gallery_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$gallery.isotope({ filter: selector });
				return false;
			});
		}
	});
							
		//instagram
		
  var userFeed = new Instafeed({
    get: 'user',
    userId: '4973405042',
    clientId: 'd1f4bac4932c48c7bf2113aa2b47cada',
    accessToken: '4973405042.d1f4bac.13c8c67c807246b095d696de2fd1ac42',
template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="likes">&hearts; {{likes}}</div></a>',
    resolution: 'low_resolution',
    sortBy: 'most-liked',
    limit: 100,
    links: false
  });
  userFeed.run();

											

	// ContactMe form validation
	var form = $('.ContactMe-form');
	form.submit(function () {'use strict',
		$this = $(this);
		$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});


	// Navigation Scroll
	$(window).scroll(function(event) {
		Scroll();
	});

	$('.navbar-collapse ul li a').click(function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 19}, 1000);
		return false;
	});

});

// Preloder script
jQuery(window).load(function(){'use strict';
	$(".preloader").delay(1600).fadeOut("slow").remove();
});

//Preloder script
jQuery(window).load(function(){'use strict';

	// Slider Height
	var slideHeight = $(window).height();
	$('#home .carousel-inner .item, #home .video-container').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#home .carousel-inner .item, #home .video-container').css('height',slideHeight);
	});

});

// User define function
function Scroll() {
	var contentTop      =   [];
	var contentBottom   =   [];
	var winTop      =   $(window).scrollTop();
	var rangeTop    =   200;
	var rangeBottom =   500;
	$('.navbar-collapse').find('.scroll a').each(function(){
		contentTop.push( $( $(this).attr('href') ).offset().top);
		contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
	})
	$.each( contentTop, function(i){
		if ( winTop > contentTop[i] - rangeTop ){
			$('.navbar-collapse li.scroll')
			.removeClass('active')
			.eq(i).addClass('active');			
		}
	})

};


	

