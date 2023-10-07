<?php
/* Theme Widget sidebars. */

// Load widget base.
require_once get_template_directory() . '/inc/ansar/widgets/widgets-base.php';

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/ansar/widgets/widgets-common-functions.php';

/* Theme Widgets*/ 

require get_template_directory() . '/inc/ansar/widgets/widget-latest-news.php'; 


/* Register site widgets */
if ( ! function_exists( 'newses_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newses_widgets() {  
        register_widget( 'Newses_Latest_Post' ); 
    }
endif;
add_action( 'widgets_init', 'newses_widgets' );
