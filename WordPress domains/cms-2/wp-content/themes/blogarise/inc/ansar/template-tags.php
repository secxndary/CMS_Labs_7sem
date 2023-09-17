<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BlogArise
 */

if (!function_exists('blogarise_post_categories')) :
    function blogarise_post_categories($separator = '&nbsp')
    {
        $global_show_categories = blogarise_get_option('global_show_categories');
        if ($global_show_categories == 'no') {
            return;
        }

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            global $post;

            $post_categories = get_the_category($post->ID);
            if ($post_categories) {
                $output = '';
                foreach ($post_categories as $post_category) {
                    $t_id = $post_category->term_id;
                    $color_id = "category_color_" . $t_id;

                    // retrieve the existing value(s) for this meta field. This returns an array
                    $term_meta = get_option($color_id);
                    $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';

                    $output .= '<a class="blogarise-categories ' . esc_attr($color_class) . '" href="' . esc_url(get_category_link($post_category)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'blogarise'), $post_category->name)) . '"> 
                                 ' . esc_html($post_category->name) . '
                             </a>';
                }
                $output .= '';
                echo $output;

            }
        }
    }
endif;



if (!function_exists('blogarise_get_category_color_class')) :

    function blogarise_get_category_color_class($term_id)
    {

        $color_id = "category_color_" . $term_id;
        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option($color_id);
        $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : '';
        return $color_class;


    }
endif;

if ( ! function_exists( 'blogarise_date_content' ) ) :
    function blogarise_date_content() { ?>
      
      <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
      </span>
 <?php }
endif;

if ( ! function_exists( 'blogarise_author_content' ) ) :
    function blogarise_author_content() { ?>
    <span class="bs-author"><a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?><?php the_author(); ?> </a>
    </span>
 <?php }
endif;


if (!function_exists('blogarise_post_item_tag')) :

    function blogarise_post_item_tag($view = 'default')
    {
        global $post;

        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'blogarise'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html('Tags: %1$s') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (is_single()) {
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'blogarise'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }

    }
endif;

if (!function_exists('blogarise_post_meta')) :

    function blogarise_post_meta()
    {
    $global_post_date = get_theme_mod('global_post_date_author_setting','show-date-author');
    $blogarise_global_comment_enable = get_theme_mod('blogarise_global_comment_enable','true'); 

    echo '<div class="bs-blog-meta">';
    if($global_post_date =='show-date-author') {
        blogarise_author_content(); blogarise_date_content();

    } elseif($global_post_date =='show-date-only') {
        blogarise_date_content();

    } elseif($global_post_date =='show-author-only') {
   
        blogarise_author_content(); 
    }

    if($blogarise_global_comment_enable == true) { ?>
        <span class="comments-link"> 
            <a href="<?php the_permalink(); ?>"><?php echo absint(get_comments_number()); ?><?php esc_html_e('Comments','blogarise'); ?></a> 
        </span>
    <?php } ?>
    <?php blogarise_edit_link(); 
    echo '</div>';
}
endif; 

if ( ! function_exists( 'blogarise_posted_content' ) ) :
    function blogarise_posted_content() { 
      $blogarise_blog_content  = get_theme_mod('blogarise_blog_content','excerpt');

      if ( 'excerpt' == $blogarise_blog_content ){
      $blogarise_excerpt = blogarise_the_excerpt( absint( 30 ) );
      if ( !empty( $blogarise_excerpt ) ) :                   
          echo wp_kses_post( wpautop( $blogarise_excerpt ) );
           endif; 
      } else{ 
       the_content( __('Read More','blogarise') );
        }
 }
endif;

if ( ! function_exists( 'blogarise_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function blogarise_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;

if ( ! function_exists( 'blogarise_breadcrumb_trail' ) ) :
    /**
     * Theme default breadcrumb function.
     *
     * @since 1.0.0
     */
    function blogarise_breadcrumb_trail() {
        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ansar/breadcrumb-trail/breadcrumb-trail.php';
        }

        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
    }
    add_action( 'blogarise_breadcrumb_trail_content', 'blogarise_breadcrumb_trail' );
endif;



if( ! function_exists( 'blogarise_breadcrumb' ) ) :
    /**
     *
     * @package blogarise
     */
    function blogarise_breadcrumb() {
        if ( is_front_page() || is_home() ) return;
        $breadcrumb_settings = get_theme_mod('breadcrumb_settings','1');
            if($breadcrumb_settings == 1)
            {

        $blogarise_site_breadcrumb_type = get_theme_mod('blogarise_site_breadcrumb_type','default');
            ?>
            <div class="bs-breadcrumb-section">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php if($blogarise_site_breadcrumb_type == 'yoast') {
                                        if( function_exists( 'yoast_breadcrumb' ) )
                                        {
                                            yoast_breadcrumb();
                                        }
                                    }

                                    elseif($blogarise_site_breadcrumb_type == 'navxt')
                                    {
                                        if( function_exists( 'bcn_display' ) )
                                        {
                                            bcn_display();
                                        }
                                        
                                    }

                                    elseif($blogarise_site_breadcrumb_type == 'rankmath')
                                    {
                                        if( function_exists( 'rank_math_the_breadcrumbs' ) )
                                        {
                                            rank_math_the_breadcrumbs();
                                        }

                                        
                                    }
                                    else {
                                        do_action( 'blogarise_breadcrumb_trail_content' );
                                    }
                                    ?> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <?php } }
endif;
add_action( 'blogarise_breadcrumb_content', 'blogarise_breadcrumb' );