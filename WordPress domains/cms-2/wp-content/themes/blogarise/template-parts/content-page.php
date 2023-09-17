<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogarise
 */

?>

<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
	<div class="col-md-12 bs-card-box padding-20">
		<?php if (have_posts()) {  while (have_posts()) : the_post(); ?>
			<?php the_content(); endwhile; } } else {?>
			<?php 
                    $blogarise_page_layout = get_theme_mod('blogarise_page_layout','page-align-content-right');
                    if($blogarise_page_layout == "page-align-content-left")
                    { ?>
                    <aside class="col-lg-4">
                        <?php get_sidebar();?>
                    </aside>
                    <?php } ?>
                    <?php if($blogarise_page_layout == "page-align-content-right"){
                    ?>
                    <div class="col-lg-8">
                    <?php } elseif($blogarise_page_layout == "page-align-content-left") { ?>
                    <div class="col-lg-8">
                    <?php } elseif($blogarise_page_layout == "page-full-width-content") { ?>
                     <div class="col-md-12">
                     <?php } ?>
				<div class="bs-card-box padding-20">
					<?php if( have_posts()) :  the_post(); ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>		
					<?php the_content(); ?>
					<?php endif; 
						while ( have_posts() ) : the_post();
						// Include the page
						the_content();
						comments_template( '', true ); // show comments
						
						endwhile;
					?>	
				</div>
			</div>
	<?php if($blogarise_page_layout == "page-align-content-right") { ?>
      		<!--sidebar-->
	          <!--col-md-4-->
	            <aside class="col-lg-4">
	                  <?php get_sidebar();?>
	            </aside>
	          <!--/col-md-4-->
      <!--/sidebar-->
      <?php } ?>
	<?php } ?>
	<!--Sidebar Area-->