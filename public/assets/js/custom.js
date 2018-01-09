$(document).ready(function(){
	/*navigation*/
	// $(window).scroll(function() {
	// 	var scroll = $(window).scrollTop();
	// 	if (scroll >= 50) {
	// 			$(".navbar").addClass("navbar-small");
	// 	} else {
	// 			$(".navbar").removeClass("navbar-small");
	// 	}
	// });
	// var $window = $(window);
	// $('div[data-type="background"]').each(function(){
	// 	var $bgobj = $(this); // assigning the object
	// 	$(window).scroll(function() {
	// 		var yPos = -($window.scrollTop() / $bgobj.data('speed'));
	// 		// Put together our final background position
	// 		var coords = '50% '+ yPos + 'px';
	// 		// Move the background
	// 		$bgobj.css({ backgroundPosition: coords });
	// 	});
	// });
	$('body').css({'padding-bottom':$('footer').outerHeight() + "px"});
	$(window).resize(function(){
		$('body').css({'padding-bottom':$('footer').outerHeight() + "px"});
	});
});