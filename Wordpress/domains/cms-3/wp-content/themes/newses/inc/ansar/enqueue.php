<?php function newses_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');

	wp_style_add_data('bootstrap', 'rtl', 'replace' );

	wp_enqueue_style('newses-style', get_stylesheet_uri() );

	wp_style_add_data('newses-style', 'rtl', 'replace' );

	$skin_color = get_theme_mod('newses_skin_color','defaultcolor');

	if($skin_color == 'purple')
	{
		wp_enqueue_style('newses-purple', get_template_directory_uri() . '/css/colors/purple.css');

	}

	else
	{

	wp_enqueue_style('newses-default', get_template_directory_uri() . '/css/colors/default.css');

	}

	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css');
	
	wp_enqueue_style('smartmenus',get_template_directory_uri().'/css/jquery.smartmenus.bootstrap.css');	

	wp_enqueue_style('newses-swiper.min',get_template_directory_uri().'/css/swiper.min.css');	

	/* Js script */
	
	wp_enqueue_script('newses-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));

	wp_enqueue_script('newses-marquee-js', get_template_directory_uri() . '/js/jquery.marquee.js' , array('jquery'));

	wp_enqueue_script('newses-swiper.min.js', get_template_directory_uri() . '/js/swiper.min.js' , array('jquery'));

	wp_enqueue_script('smartmenus-js', get_template_directory_uri() . '/js/jquery.smartmenus.js');
	
	wp_enqueue_script('bootstrap-smartmenus-js', get_template_directory_uri() . '/js/bootstrap-smartmenus.js');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'newses_scripts');

//Custom js for time
function newses_custom_js() {

 wp_enqueue_script('newses-custom', get_template_directory_uri() . '/js/custom.js' , array('jquery')); 

 $header_time_enable = get_theme_mod('header_time_enable','true'); 
 if($header_time_enable == 'true') { 
 
 $newses_date_time_show_type = get_theme_mod('newses_date_time_show_type','newses_default'); 

 if($newses_date_time_show_type == 'newses_default'){

 wp_enqueue_script('newses-custom-time', get_template_directory_uri() . '/js/custom-time.js' , array('jquery')); 

 } } }
add_action('wp_footer','newses_custom_js');


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function newses_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'newses_skip_link_focus_fix' );

//Footer widget text color
function newses_footer_text_color()
{
$newses_footer_text_color = get_theme_mod('newses_footer_text_color');
if($newses_footer_text_color)
{ ?>
	<style>
		footer .mg-widget p, footer .site-title a, footer .site-title a:hover , footer .site-description, footer .site-description:hover{
	
			color: <?php echo esc_attr($newses_footer_text_color); ?> !important;
}

	</style>

<?php }
}
add_action('wp_footer','newses_footer_text_color');



function newses_menu(){ ?>
<script>
jQuery('a,input').bind('focus', function() {
    if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= 992) ) {
    jQuery('.navbar-collapse').removeClass('show');
}})
</script>
<?php }
add_action( 'wp_print_footer_scripts', 'newses_menu' );