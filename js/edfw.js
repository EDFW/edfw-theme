// toggle nav-bar logo
var home_logo = '<img src="http://episcopaldiocesefortworth.org/wp-content/themes/edfw-theme/images/edfw-logos/home.png">';
var home_logo_hover = '<img src="http://episcopaldiocesefortworth.org/wp-content/themes/edfw-theme/images/edfw-logos/home-hover.png">';	//not currently used
var home_logo_small = '<img src="http://episcopaldiocesefortworth.org/wp-content/themes/edfw-theme/images/edfw-logos/home-icon-small.png">';
var edfw_logo = '<img src="http://episcopaldiocesefortworth.org/wp-content/themes/edfw-theme/images/edfw-logos/edfw-menu-bar-2.png">';
var edfw_logo_small = '<img src="http://episcopaldiocesefortworth.org/wp-content/themes/edfw-theme/images/edfw-logos/home-fw-shield-small.png">';

//set full-size logos by default
var logo_to_use = edfw_logo;
var home_to_use = home_logo;

//set to small size logos if needed
if ( ( ( $('body').outerWidth() > 970 ) && ( $('.navbar').outerWidth() < 1200 ) ) || ( $('body').outerWidth() < 380 ) ){ 
	logo_to_use = edfw_logo_small;
	home_to_use = home_logo_small;
}

$(document).ready(function() {
	
		if ( !($('#header-image').length > 0) ) { 		// has no masthead: display the edfw logo all the time
			$('#nav-header-logo').html(logo_to_use);
			$('#nav-header-logo').removeClass('hidden');
		} else {	//has a masthead - logo changes from home icon to logo
			if ( $('#billboard-title').length > 0 ) { 
				//is home - keep the logo hidden until scroll, never show the HOME ICON
				$('#nav-header-logo').html(logo_to_use);	//switch logo if needed
				$(window).scroll( function(){
		
					/* Check the location of each desired element */
					$('#header-image').each(function(i){
					
						var top_of_object = $(this).position().top
						var bottom_of_object = $(this).position().top + $(this).outerHeight();
						var top_of_window = $(window).scrollTop();
					
						/* if scrolled past header, put header logo in place */
						if( top_of_window > bottom_of_object ){
						
							$('#nav-header-logo').removeClass('hidden');
						
						} 
						if( top_of_window < top_of_object ) {
							$('#nav-header-logo').addClass('hidden');
						}
					}); 
				});
			} else {	
				//is not home - show the HOME icon, and then show logo on scroll
		
				$('#nav-header-logo').html(home_to_use);
				$('#nav-header-logo').removeClass('hidden');
				/* Every time the window is scrolled ... */
				$(window).scroll( function(){
    
				/* Check the location of each desired element */
					$('#header-image').each(function(i){
				
						var top_of_object = $(this).position().top
						var bottom_of_object = $(this).position().top + $(this).outerHeight();
						var top_of_window = $(window).scrollTop();
				
						/* if scrolled past header, put header logo in place */
						if( top_of_window > bottom_of_object ){
					
							$('#nav-header-logo').html(logo_to_use);
						
						} 
						if( top_of_window < top_of_object ) {
							$('#nav-header-logo').html(home_to_use);
						}
						//function for hover... deal with later as loading-blink is problem and problably need to rethink a little...
            
					}); 
				});
			};
		};
});