// toggle nav-bar logo
var home_logo = '<img src="http://dev.episcopal-diocese-fort-worth.org/wp-content/themes/edfw-theme/images/edfw-logos/home.png">';
var home_logo_hover = '<img src="http://dev.episcopal-diocese-fort-worth.org/wp-content/themes/edfw-theme/images/edfw-logos/home-hover.png">';	//not currently used
var edfw_logo = '<img src="http://dev.episcopal-diocese-fort-worth.org/wp-content/themes/edfw-theme/images/edfw-logos/edfw-menu-bar-2.png">';

$(document).ready(function() {

	if ( !($('#header-image').length > 0) ) {
		// has no masthead: display the logo all the time
		$('#nav-header-logo').html(edfw_logo);
		$('#nav-header-logo').removeClass('hidden');
	} else {
		//has a masthead - is either home or isn't
		
		if ( $('#billboard-title').length > 0 ) { 
			//is home - keep the logo hidden until scroll, never show the HOME ICON
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
		
			$('#nav-header-logo').html(home_logo);
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
                
						$('#nav-header-logo').html(edfw_logo);
                    
					} 
					if( top_of_window < top_of_object ) {
						$('#nav-header-logo').html(home_logo);
					}
					//function for hover... deal with later as loading-blink is problem and problably need to rethink a little...
            
			}); 
		});
	};
	};
});