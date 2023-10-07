<?php
/**
 * The template for displaying the content.
 * @package blogarise
 */
?>
<div class="row">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while(have_posts()){ the_post(); ?>
    <!--col-md-12-->
    <div class="col-md-12 fadeInDown wow" data-wow-delay="0.1s">
        <!-- bs-posts-sec-inner -->
        
        <div class="bs-blog-post list-blog">
                    <?php  
                    $url = blogarise_get_freatured_image_url($post->ID, 'blogarise-medium');
                    blogarise_post_image_display_type($post); 
                    ?>
            <article class="small col text-xs">
              <?php 
                    $blogarise_global_category_enable = get_theme_mod('blogarise_global_category_enable','true');
                    if($blogarise_global_category_enable == 'true') { ?>
                    <div class="bs-blog-category">
                        <?php blogarise_post_categories(); ?>
                    </div>
                    <?php } ?>
                    <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <?php blogarise_post_meta(); ?>
                    <?php blogarise_posted_content(); wp_link_pages( ); 
                    $blogarise_readmore_excerpt=get_theme_mod('blogarise_blog_content','excerpt');
                    ?>
            </article>
          </div>
    <!-- // bs-posts-sec block_6 -->
    </div>
    <?php } 
    $blogarise_pagination_remove = get_theme_mod('blogarise_pagination_remove','true');?>

    <div class="col-md-12 text-center d-md-flex justify-content-<?php if($blogarise_pagination_remove == 'true') { echo 'between';} else { echo 'center';} ?>">
                <?php //Previous / next page navigation
                     
                    $prev_text =  (is_rtl()) ? "right" : "left";
                    $next_text =  (is_rtl()) ? "left" : "right";
                    the_posts_pagination( array(
                        'prev_text'          => '<i class="fa fa-angle-'.$prev_text.'"></i>',
                        'next_text'          => '<i class="fa fa-angle-'.$next_text.'"></i>',
                        ) 
                    );
                    if($blogarise_pagination_remove == true)
                    {
                    ?>
                    <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
                    <?php } ?>
        </div>
</div>
</div>