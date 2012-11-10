// toggle nav-bar logo
var home_icon = '<i class="icon-home icon-white"></i>Home';
var edfw_logo = '<img src="http://dev.episcopal-diocese-fort-worth.org/wp-content/themes/edfw-theme/images/edfw-logos/edfw-menu-bar-2.png">';

$(document).ready(function() {

	if ( !($('#header-image').length > 0) ) {
	
		// display the logo
		$('#nav-header-logo').html(edfw_logo);
		$('#nav-header-logo').removeClass('hidden');
		} else {
		
		$('#nav-header-logo').html(home_icon);
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
					$('#nav-header-logo').html(home_icon);
				}
            
			}); 
		
		});
	
	};
    
});