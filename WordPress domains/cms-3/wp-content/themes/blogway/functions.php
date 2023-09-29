<?php
/**
 * Theme functions and definitions
 *
 * @package Blogway
 */
if ( ! function_exists( 'blogway_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function blogway_enqueue_styles() {
		wp_enqueue_style( 'newses-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'blogway-style', get_stylesheet_directory_uri() . '/style.css', array( 'newses-style-parent' ), '1.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_dequeue_style( 'newses-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'blogway-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
	}

endif;
add_action( 'wp_enqueue_scripts', 'blogway_enqueue_styles', 9999 );

function blogway_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('blogway', get_stylesheet_directory() . '/languages');


// custom header Support
			$args = array(
			'default-image'		=>  get_stylesheet_directory_uri() .'/images/head-back.jpg',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '#143745'
		);
		add_theme_support( 'custom-header', $args );

} 
add_action( 'after_setup_theme', 'blogway_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogway_widgets_init() {
	

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Left Sidebar Section', 'blogway'),
		'id'            => 'front-left-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Right Sidebar Section', 'blogway'),
		'id'            => 'front-right-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	

}
add_action( 'widgets_init', 'blogway_widgets_init' );


function blogway_remove_some_widgets(){
// Unregister Frontpage sidebar
unregister_sidebar( 'front-page-sidebar' );
}
add_action( 'widgets_init', 'blogway_remove_some_widgets', 11 );


add_action( 'customize_register', 'blogway_customizer_rid_values', 1000 );
function blogway_customizer_rid_values($wp_customize) {

  $wp_customize->remove_control('select_slider_3_post_category');

  $wp_customize->remove_control('main_slider_below_3_title');

  $wp_customize->remove_control('editorials_section_title');

  $wp_customize->remove_control('select_editorials_category');

}

/**
 * Outputs the tab posts
 *
 * @since 1.0.0
 *
 * @param array $args  Post Arguments.
 */
if (!function_exists('blogway_render_posts')):
  function blogway_render_posts( $type, $show_excerpt, $excerpt_length, $number_of_posts, $category = '0' ){

    $args = array();
   
    switch ($type) {
        case 'popular':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'orderby' => 'comment_count',
                'ignore_sticky_posts' => true
            );
            break;

        case 'recent':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'orderby' => 'date',
                'ignore_sticky_posts' => true
            );
            break;

        case 'categorised':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'ignore_sticky_posts' => true
            );
            $category = isset($category) ? $category : '0';
            if (absint($category) > 0) {
                $args['cat'] = absint($category);
            }
            break;


        default:
            break;
    }

    if( !empty($args) && is_array($args) ){
        $all_posts = new WP_Query($args);
        if($all_posts->have_posts()):
            echo '<div class="mg-posts-sec mg-posts-modul-2"><div class="mg-posts-sec-inner row"><div class="small-list-post col-lg-12">';
            while($all_posts->have_posts()): $all_posts->the_post();

                ?>
                
                  <div class="small-post media">
                        <?php
                        if(has_post_thumbnail()){
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                            $url = $thumb !== false ? '' . $thumb[0] . '' : '""';
                            $col_class = 'col-sm-8';
                        }else {
                            $url = '';
                            $col_class = 'col-sm-12';
                        }
                        global $post;
                        ?>
                        <?php if (!empty($url)): ?>
                            <div class="img-small-post back-img hlgr" style="background-image: url('<?php echo esc_url($url); ?>');">
                                                <a href="<?php the_permalink(); ?>" class="link-div"></a>
                            </div>
                        <?php endif; ?>
                        <div class="small-post-content media-body">
                                <div class="mg-blog-category">
                                   <?php newses_post_categories('/'); ?>
                                </div>
                                    <a href="<?php the_permalink(); ?>">
                                        <h5>
                                        <?php the_title(); ?>
                                        </h5>
                                    </a>
                        </div>
                </div>
            <?php
            endwhile;wp_reset_postdata();
            echo '</div></div></div>';
        endif;
    }
}
endif;

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function blogway_fonts_url() {
    
    $fonts_url = '';
        
    $font_families = array();
 
    $font_families = array('Zilla Slab:300,400,500,600,700,&display=swap');

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function blogway_scripts_styles() {
    wp_enqueue_style( 'blogway-fonts', blogway_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'blogway_scripts_styles' );


function blogway_menu(){ ?>
<script>
jQuery('a,input').bind('focus', function() {
     if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= 992) ) {
    jQuery('.navbar-collapse').removeClass('show');
 }})
 </script>
<?php }
add_action( 'wp_footer', 'blogway_menu' );