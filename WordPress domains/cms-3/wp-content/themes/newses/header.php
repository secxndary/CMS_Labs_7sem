<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Newses
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<?php $theme_layout = get_theme_mod('newses_theme_layout_options','wide');
if($theme_layout == "boxed")
{ $class="boxed"; }
else
{ $class="wide"; } ?>
<body <?php body_class($class); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'newses' ); ?></a>
    <!--wrapper-->
    <div class="wrapper" id="custom-background-css">
        <header class="mg-headwidget">
            <!--==================== TOP BAR ====================-->
            <?php do_action('newses_action_header_section');  ?>
            <div class="clearfix"></div>
            <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
            if ( has_header_image() ) {
              $background_image = get_header_image();
            } ?>
            <div class="mg-nav-widget-area-back" style='background-image: url("<?php echo esc_url( $background_image ); ?>" );'>
            <?php $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); ?>
            <div class="overlay">
              <div class="inner" <?php if($remove_header_image_overlay == false) { 
            $newses_header_overlay_color = get_theme_mod('newses_header_overlay_color','rgba(18,16,38,0.4)');?> style="background-color:<?php echo esc_attr($newses_header_overlay_color);?>;" <?php } ?>>
                <div class="container">
                    <div class="mg-nav-widget-area">
                      <?php $newses_center_logo_title = get_theme_mod('newses_center_logo_title',false);
                      if($newses_center_logo_title == false) {
                        ?>
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center-xs">
                              <?php } else { ?> 
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-12 text-center mx-auto">       
                              <?php } ?>
                              <?php the_custom_logo(); 
                                if (display_header_text()) : ?>
                                <div class="site-branding-text">
                                <?php if (is_front_page() || is_home()) { ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                               <?php } else { ?>
                                <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                                <?php } ?>
                                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                                </div>
                              <?php endif; ?>
                            </div>
                           <?php do_action('newses_action_banner_advertisement'); ?>

                        </div>
                    </div>
                </div>
                </div>
              </div>
          </div>
            <div class="mg-menu-full">
                <nav class="navbar navbar-expand-lg navbar-wp">
                    <div class="container">
                        <!-- Right nav -->
                    <div class="m-header align-items-center">
                        <a class="mobilehomebtn" href="<?php echo esc_url( home_url() ) ?>"><span class="fa fa-home"></span></a>
                        <!-- navbar-toggle -->
                        <button class="navbar-toggler collapsed ml-auto" type="button" data-toggle="collapse" data-target="#navbar-wp" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation','newses'); ?>">
                          <!-- <span class="my-1 mx-2 close"></span>
                          <span class="navbar-toggler-icon"></span> -->
                          <div class="burger">
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                          </div>
                        </button>
                        <!-- /navbar-toggle -->
                        <?php $header_search_enable = get_theme_mod('header_search_enable','true');
                        if($header_search_enable == true) {
                        ?>
                        <div class="dropdown show mg-search-box">
                      <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-search"></i>
                      </a>
                      <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                        <?php get_search_form(); ?>
                      </div>
                    </div>
                        <?php } 

                        $header_watch_btn_enable = get_theme_mod('header_watch_btn_enable','true');
                        $newses_header_btn_link = get_theme_mod('newses_header_btn_link','#');
                        $newses_header_wth_btn_target = get_theme_mod('newses_header_wth_btn_target','true');
                        if($header_watch_btn_enable) { 
                        if($newses_header_btn_link) {
                        ?>
                        <a <?php if($newses_header_wth_btn_target) { ?> target="_blank" <?php } ?>href="<?php echo esc_url($newses_header_btn_link); ?>" class="btn-theme px-3 mr-2">
                            <i class="fa fa-television"></i></a>
                        <?php } } ?>
                    </div>
                    <!-- /Right nav -->
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse" id="navbar-wp">
                        
                            <?php wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                                'menu_class' => 'nav navbar-nav mr-auto',
                                'fallback_cb' => 'newses_fallback_page_menu',
                                'walker' => new newses_nav_walker()
                              ) ); 
                            ?>
                    </div>   
                    <!--/ Navigation -->
                    <!-- Right nav -->
                    <div class="desk-header pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                        <!-- /navbar-toggle -->
                        <?php $header_search_enable = get_theme_mod('header_search_enable','true');
                        if($header_search_enable == true) {
                        ?>
                        <div class="dropdown show mg-search-box">
                      <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-search"></i>
                      </a>
                      <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                        <?php get_search_form(); ?>
                      </div>
                    </div>
                        <?php } 

                        $header_watch_btn_enable = get_theme_mod('header_watch_btn_enable','true');
                        $newses_header_btn_link = get_theme_mod('newses_header_btn_link','#');
                        $newses_header_wth_btn_target = get_theme_mod('newses_header_wth_btn_target','true');
                        if($header_watch_btn_enable) { 
                        if($newses_header_btn_link) {
                        ?>
                        <a <?php if($newses_header_wth_btn_target) { ?> target="_blank" <?php } ?>href="<?php echo esc_url($newses_header_btn_link); ?>" class="btn-theme px-3 ml-3 mr-2">
                            <i class="fa fa-television"></i></a>
                        <?php } } ?>
                    </div>
                    <!-- /Right nav --> 
                  </div>
                </nav>
            </div>
        </header>
        <div class="clearfix"></div>
        <!--== /Top Tags ==-->
        <?php do_action('newses_action_banner_exclusive_posts');  ?>
        <?php $show_main_news_section = newses_get_option('show_main_news_section');
        if ($show_main_news_section):
        ?>
        <!--== Home Slider ==-->
        <?php if (is_front_page() || is_home()) { ?>
        <section class="mg-fea-area">
            <div class="overlay">
              <div class="container mg-padding">
                <div class="row my-4">
                    <?php do_action('newses_action_front_page_main_section_1'); ?>
              </div>
              </div>
            </div>
        </section>
        <?php } ?>
        <!--==/ Home Slider ==-->
        <?php endif; ?>