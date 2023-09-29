<?php
/**
 * The template for displaying search results pages.
 *
 * @package Newses
 */

get_header(); ?>
<!--==================== newses breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container">
    <!--row-->
        <div class="row">
            <div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
                <h2><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','newses'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <!-- mg-posts-sec mg-posts-modul-6 -->
                    <div class="mg-posts-sec mg-posts-modul-6 wd-back">
                        <!-- mg-posts-sec-inner -->
                        <div class="mg-posts-sec-inner row">
                            <?php if ( have_posts() ) : /* Start the Loop */
                            while ( have_posts() ) : the_post(); ?>
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
                                    <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                    <?php newses_post_meta(); ?> 
                                    <div class="mg-content overflow-hidden">
                                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; else :?>
                            <div class="mg-posts-sec-post col-12">
                                <h2><?php esc_html_e( "Nothing Found", 'newses' ); ?></h2>
                                <div class="">
                                    <p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'newses' ); ?></p>
                                    <?php get_search_form(); ?>
                                </div><!-- .blog_con_mn -->
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- // mg-posts-sec-inner -->
                    </div>
                    <!-- // mg-posts-sec block_6 -->
                </div>
                <!--col-md-12-->
            </div>
            <aside class="col-md-4">
                <?php get_sidebar();?>
            </aside>
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php
get_footer();
?>