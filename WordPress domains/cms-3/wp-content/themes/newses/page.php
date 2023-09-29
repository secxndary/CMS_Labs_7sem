<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newses
 */
get_header(); 
?>
<!--==================== Newses breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<div id="content">
		<div class="container">
                <!--row-->
                <div class="row">
		<!-- Blog Area -->
			<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
			<div class="col-md-12">
			<?php if (have_posts()) {  while (have_posts()) : the_post(); ?>
			<?php the_content(); endwhile; } } else {?>
            		<?php 
                    $newses_page_layout = get_theme_mod('newses_page_layout','page-align-content-right');
                    if($newses_page_layout == "page-align-content-left")
                    { ?>
                    <aside class="col-md-3">
                        <?php get_sidebar();?>
                    </aside>
                    <?php } ?>
                    <?php if($newses_page_layout == "page-align-content-right"){
                    ?>
                    <div class="col-md-9">
                    <?php } elseif($newses_page_layout == "page-align-content-left") { ?>
                    <div class="col-md-9">
                    <?php } elseif($newses_page_layout == "page-full-width-content") { ?>
                     <div class="col-md-12">
                     <?php } ?>
            	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                     <!-- mg-posts-sec mg-posts-modul-6 -->
                     <div class="mg-posts-sec mg-posts-modul-6  wd-back">
					<?php while (have_posts()) : the_post();
	               if(has_post_thumbnail()) {
					if ( is_single() ) { ?>
						<figure class="post-thumbnail">
							<?php the_post_thumbnail('full'); ?>					
						</figure>
					<?php }
					else { ?>
						<figure class="post-thumbnail">
							<a href="<?php the_permalink(); ?>" >
								<?php the_post_thumbnail('full'); ?>
							</a>				
						</figure>
					<?php }
					}		
					the_content();
					newses_edit_link();
					
	                if (comments_open() || get_comments_number()) :
	                        comments_template();
	                    endif;
	                    
	               endwhile;
            	   ?>	
					</div>
				</div>
			</div>
			<!--Sidebar Area-->
			<?php if($newses_page_layout == "page-align-content-right") { ?>
      		<!--sidebar-->
	          <!--col-md-4-->
	            <aside class="col-md-3">
	                  <?php get_sidebar();?>
	            </aside>
	          <!--/col-md-4-->
      <!--/sidebar-->
      <?php } ?>
			<?php } ?>
			<!--Sidebar Area-->
			</div>
		</div>
		</div>
<?php
get_footer();