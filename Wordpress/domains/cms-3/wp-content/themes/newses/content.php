<?php
/**
 * The template for displaying the content.
 * @package Newses
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- mg-posts-sec mg-posts-modul-6 -->
    <div class="mg-posts-sec mg-posts-modul-6  wd-back">
        <!-- mg-posts-sec-inner -->
        <div class="mg-posts-sec-inner row">
            <?php while(have_posts()){ the_post(); ?>
            <div class="d-md-flex mg-posts-sec-post mb-4 w-100">
                <div class="col-12 col-md-6">
                    <?php $url = newses_get_freatured_image_url($post->ID, 'full'); ?>
                    <div class="mg-blog-thumb back-img md" style="background-image: url('<?php echo esc_url($url); ?>');">
                        <?php echo newses_post_format_type($post); ?>
                        <a href="<?php the_permalink();?>" class="link-div"></a>
                    </div> 
                </div>
                <div class="mg-sec-top-post col">
                        <div class="mg-blog-category">
                        <?php newses_post_categories(); ?>
                        </div>
                        <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <?php newses_post_meta(); ?>
                    <div class="mg-content overflow-hidden">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
                    </div>
                </div>
            </div>
                <?php } ?>
            <div class="col-md-12 text-center d-flex justify-content-center">
                <?php //Previous / next page navigation
                $prev_text =  (is_rtl()) ? "right" : "left";
                $next_text =  (is_rtl()) ? "left" : "right";
                the_posts_pagination( array(
                    'prev_text'          => '<i class="fa fa-angle-'.$prev_text.'"></i>',
                    'next_text'          => '<i class="fa fa-angle-'.$next_text.'"></i>',
                    ) 
                ); ?> 
            </div>

        </div>
        <!-- // mg-posts-sec-inner -->
    </div>
    <!-- // mg-posts-sec block_6 -->
</div>
<!--col-md-12-->