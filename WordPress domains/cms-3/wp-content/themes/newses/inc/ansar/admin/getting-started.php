<?php
/**
 * Getting Started Page. 
 *
 * @package Newses
 */
require get_template_directory() . '/inc/ansar/admin/class-getting-start-plugin-helper.php';


// Adding Getting Started Page in admin menu

if( ! function_exists( 'newses_getting_started_menu' ) ) :
function newses_getting_started_menu() {	
		$plugin_count = null;
		if ( !is_plugin_active( 'shortbuild/shortbuild.php' ) ):	
			$plugin_count =	'<span class="awaiting-mod action-count">1</span>';
		endif;
	    /* translators: %1$s %2$s: about */		
		$title = sprintf(esc_html__('About %1$s %2$s', 'newses'), esc_html( NEWSES_THEME_NAME ), $plugin_count);
		/* translators: %1$s: welcome page */	
		add_theme_page(sprintf(esc_html__('Welcome to %1$s', 'newses'), esc_html( NEWSES_THEME_NAME ), esc_html(NEWSES_THEME_VERSION)), $title, 'edit_theme_options', 'newses-getting-started', 'newses_getting_started_page');
}
endif;
add_action( 'admin_menu', 'newses_getting_started_menu' );

// Load Getting Started styles in the admin
if( ! function_exists( 'newses_getting_started_admin_scripts' ) ) :
function newses_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_newses-getting-started' != $hook ) return;

    wp_enqueue_style( 'newses-getting-started', get_template_directory_uri() . '/inc/ansar/admin/css/getting-started.css', false, NEWSES_THEME_VERSION );
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'newses-getting-started', get_template_directory_uri() . '/inc/ansar/admin/js/getting-started.js', array( 'jquery' ), NEWSES_THEME_VERSION, true );
    wp_enqueue_script( 'newses-recommended-plugin-install', get_template_directory_uri() . '/inc/ansar/admin/js/recommended-plugin-install.js', array( 'jquery' ), NEWSES_THEME_VERSION, true );    
    wp_localize_script( 'newses-recommended-plugin-install', 'newses_start_page', array( 'activating' => __( 'Activating ', 'newses' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'newses_getting_started_admin_scripts' );


// Plugin API
if( ! function_exists( 'newses_call_plugin_api' ) ) :
function newses_call_plugin_api( $slug ) {
	require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'newses_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'newses_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}
endif;

// Callback function for admin page.
if( ! function_exists( 'newses_getting_started_page' ) ) :
function newses_getting_started_page() { ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3>
				<?php 
				/* translators: %1$s %2$s: welcome message */	
				printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'newses' ), esc_html( NEWSES_THEME_NAME ), esc_html( NEWSES_THEME_VERSION ) ); ?></h3>
				<p><?php esc_html_e( 'Newses is an indispensable Responsive News and Magazine template with a clean, modern design suitable for everyone who wants to share their stories and the latest breaking news or the hottest products. the theme comes light and dark color mode, Newses is suitable for dynamic news, newspapers, magazine, publishers, blogs, editors, online and gaming magazines, newsportals, personal blogs, newspaper, agencies, publishing or review siteand any creative website. Newses is SEO friendly, WPML, Gutenberg, WooCommerce, translation and RTL ready. We offer great support and friendly help!. Live preview : https://demos.themeansar.com/newses and documentation at https://docs.themeansar.com/docs/newses/', 'newses' ); ?></p>
			</div>
			<div class="intro right">
				<a target="_blank" href="https://themeansar.com/"><img src="<?php echo esc_url(get_template_directory_uri());  ?>/inc/ansar/admin/images/logo.png"></a>
			</div>
		</div>
		<div class="panels">
			<ul class="inline-list">
			    <li class="current">
					<a id="getting-started-panel" href="#">
						<?php esc_html_e( 'Getting Started', 'newses' ); ?>
					</a>
				</li>
				<li class="recommended-plugins-active">
					<a id="plugins" href="#">
						<?php esc_html_e( 'Demo Content', 'newses' ); 
						if ( !is_plugin_active( 'shortbuild/shortbuild.php' ) ):  ?>
							<span class="plugin-not-active">1</span>
						<?php endif; ?>
					</a>
				</li>
				<li>
                	<a id="useful-plugin-panel" href="#">
						<?php esc_html_e( 'Useful Plugins', 'newses' ); ?>
					</a>
				</li>
				
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/inc/ansar/admin/tabs/getting-started-panel.php'; ?>
				<?php require get_template_directory() . '/inc/ansar/admin/tabs/recommended-plugins-panel.php'; ?>
				<?php require get_template_directory() . '/inc/ansar/admin/tabs/useful-plugin-panel.php'; ?>
			</div>
			<div class="panel">
				<div class="panel-aside panel-column w-50">
					<h4><?php esc_html_e( 'Newses Theme Support', 'newses' ); ?></h4>
					<a class="button button-primary" target="_blank" href="//wordpress.org/support/theme/newses/" title="<?php esc_attr_e( 'Get Support', 'newses' ); ?>"><?php esc_html_e( 'Get Support', 'newses' ); ?></a>
				</div>
			   <div class="panel-aside panel-column w-50">
					<h4><?php esc_html_e( 'Your feedback is valuable to us', 'newses' ); ?></h4>
					<a class="button button-primary" target="_blank" href="//wordpress.org/support/theme/newses/reviews/#new-post" title="<?php esc_attr_e( 'Submit a review', 'newses' ); ?>"><?php esc_html_e( 'Submit a review', 'newses' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
endif;


/**
 * Admin notice 
 */
class newses_screen {
 	public function __construct() {
		/* notice  Lines*/
		add_action( 'load-themes.php', array( $this, 'newses_activation_admin_notice' ) );
	}
	public function newses_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'newses_admin_notice' ), 99 );
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function newses_admin_notice() {
		?>			
		<div class="updated notice is-dismissible newses-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'newses'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing Newses theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "newses"), '<a href="' . esc_url( admin_url( 'themes.php?page=newses-getting-started' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=newses-getting-started' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with Newses','newses'); ?></a></p>
		</div>
		<?php
	}
	
}
$GLOBALS['newses_screen'] = new newses_screen();