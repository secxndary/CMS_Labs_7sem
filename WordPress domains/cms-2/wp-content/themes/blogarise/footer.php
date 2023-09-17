<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package BlogArise
 */
?>
<?php 
do_action('blogarise_action_footer_missed_section');
?><!--==================== FOOTER AREA ====================-->
    <?php $blogarise_footer_widget_background = get_theme_mod('blogarise_footer_widget_background');
    $blogarise_footer_overlay_color = get_theme_mod('blogarise_footer_overlay_color'); 
   if($blogarise_footer_widget_background != '') { ?>
    <footer class="back-img" style="background-image:url('<?php echo esc_url($blogarise_footer_widget_background);?>');">
     <?php } else { ?>
    <footer> 
    <?php } ?>
        <div class="overlay" style="background-color: <?php echo esc_html($blogarise_footer_overlay_color);?>;">
                <!--Start bs-footer-widget-area-->
                <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
                <div class="bs-footer-widget-area">
                    <div class="container">
                        <div class="row">
                          <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                 <?php } ?>
                <div class="bs-footer-bottom-area">
                    <div class="container">
                        <div class="divide-line"></div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                              <div class="footer-logo">
                                  <?php the_custom_logo(); ?>
                                <div class="site-branding-text">
                                <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                <p class="site-description-footer"><?php bloginfo('description'); ?></p>
                                </div>
                              </div>
                            </div>
                          <!--col-md-3-->
		              <?php do_action('blogarise_action_footer_social_section'); ?>
          				<!--/col-md-3-->
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                <!--End bs-footer-widget-area-->

              <?php $hide_copyright = esc_attr(get_theme_mod('hide_copyright','true'));
                if ($hide_copyright == true ) { ?>
                <div class="bs-footer-copyright">
                    <div class="container">
                        <div class="row">
                          <?php  if ( has_nav_menu( 'footer' ) ) {
                           ?>
                            <div class="col-md-6 text-md-start text-xs">
                              <p class="mb-0">
                                <?php $blogarise_footer_copyright = get_theme_mod( 'blogarise_footer_copyright','Copyright &copy; All rights reserved' );
                                  echo esc_html($blogarise_footer_copyright);
                                ?>
                                <span class="sep"> | </span>
                                <?php  printf(esc_html__('%1$s by %2$s.', 'blogarise'), '<a href="https://themeansar.com/free-themes/blogarise/" target="_blank">Blogarise</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                                 </a>
                                </p>
                            </div>
                                <div class="col-md-6 text-md-end text-xs">
                                  <?php wp_nav_menu( array(
                              'theme_location' => 'footer',
                              'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                              'menu_class' => 'info-right',
                              'fallback_cb' => 'blogarise_fallback_page_menu',
                              'walker' => new blogarise_nav_walker()
                            ) ); 
                            ?>
                            </div>
                          <?php } else { ?>
                             <div class="col-md-12 text-center">
                              <p class="mb-0">
                                <?php $blogarise_footer_copyright = get_theme_mod( 'blogarise_footer_copyright','Copyright &copy; All rights reserved' );
                                  echo esc_html($blogarise_footer_copyright);
                                ?>
                                <span class="sep"> | </span>
                                <?php  printf(esc_html__('%1$s by %2$s.', 'blogarise'), '<a href="https://themeansar.com/free-themes/blogarise/" target="_blank">BlogArise</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                                 </a>
                                </p>
                            </div>
                          <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php } ?>
            </div>
            <!--/overlay-->
        </footer>
        <!--/footer-->
    </div>
    <!--/wrapper-->
    <!--Scroll To Top-->
    <?php blogarise_scrolltoup(); ?>
    <!--/Scroll To Top-->
    <!-- Modal -->
  <div class="modal fade bs_model" id="exampleModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
<!-- /Modal -->
<!-- /Scroll To Top -->
<?php wp_footer(); ?>
</body>
</html>