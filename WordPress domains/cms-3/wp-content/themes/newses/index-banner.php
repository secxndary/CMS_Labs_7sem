<div class="clearfix"></div>
 <div class="mg-breadcrumb-section">
    <!--overlay--> 
    <div class="overlay">
      <!--container--> 
      <div class="container">
        <!--row--> 
        <div class="row align-items-center justify-content-between px-4">
          <!--col-md-12--> 
            <!--mg-breadcrumb-title-->
          <div class="mg-breadcrumb-title">
            <?php
          if( class_exists( 'WooCommerce' ) && is_shop() ) { ?>
            <h1>
            <?php woocommerce_page_title(); ?>
            </h1>
            <?php    
          }
          elseif(is_archive()) {
          the_archive_title( '<h1>', '</h1>' );
          the_archive_description( '<div class="archive-description">', '</div>' );
          } else { ?>
          <h1><?php the_title(); ?></h1>
         <?php } ?>
          </div>
            <!--/mg-breadcrumb-title--> 
            <!--mg-page-breadcrumb--> 
            <ul class="mg-page-breadcrumb">
              <li><a href="<?php echo esc_url(home_url());?>"><?php esc_html_e('Home','newses'); ?></a></li>
              <li class="active"><?php the_title(); ?></li>
            </ul>
            <!--/mg-page-breadcrumb-->
        </div>
        <!--/row--> 
      </div>
      <!--/container--> 
    </div>
    <!--/overlay--> 
  </div>
<div class="clearfix"></div>

