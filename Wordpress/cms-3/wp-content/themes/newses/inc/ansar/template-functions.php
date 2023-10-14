<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Newses
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function newses_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'newses_pingback_header');


/**
 * Returns posts.
 *
 * @since newses 1.0.0
 */
if (!function_exists('newses_get_posts')):
    function newses_get_posts($number_of_posts, $category = '0')
    {

        $ins_args = array(
            'post_type' => 'post',
            'posts_per_page' => absint($number_of_posts),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true
        );

        $category = isset($category) ? $category : '0';
        if (absint($category) > 0) {
            $ins_args['cat'] = absint($category);
        }

        $all_posts = new WP_Query($ins_args);

        return $all_posts;
    }

endif;

if (!function_exists('newses_get_block')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since newses 1.0.0
     *
     */
    function newses_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('inc/ansar/hooks/blocks/block-' . $section, $block);

    }
endif;





/**
 * Check if given term has child terms
 *
 */
function newses_list_popular_taxonomies($taxonomy = 'post_tag', $title = "Top Tags", $number = 5)
{
    

      $show_popular_tags_section = esc_attr(get_theme_mod('show_popular_tags_section','true'));
      $show_popular_tags_title = get_theme_mod('show_popular_tags_title', esc_html('Top Tags'));
      if($show_popular_tags_section == true){
      $popular_taxonomies = get_terms(array(
        'taxonomy' => $taxonomy,
        'number' => absint($number),
        'orderby' => 'count',
        'order' => 'DESC',
        'hide_empty' => true,
    ));

    $html = '';

    if (isset($popular_taxonomies) && !empty($popular_taxonomies)):
        $html .= '<div class="mg-tpt-txnlst clearfix">';
        if (!empty($title)):
            $html .= '<strong>';
            $html .= esc_html($title);
            $html .= '</strong>';
        endif;
        $html .= '<ul>';
        foreach ($popular_taxonomies as $tax_term):
            $html .= '<li>';
            $html .= '<a href="' . esc_url(get_term_link($tax_term)) . '">';
            $html .= $tax_term->name;
            $html .= '</a>';
            $html .= '</li>';
        endforeach;
        $html .= '</ul>';
        $html .= '</div>';
    endif;

    echo $html;
}
}


/**
 * @param $post_id
 * @param string $size
 *
 * @return mixed|string
 */
function newses_get_freatured_image_url($post_id, $size = 'newses-featured')
{
    if (has_post_thumbnail($post_id)) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
        $url = $thumb !== false ? '' . $thumb[0] . '' : '""';

    } else {
        $url = '';
    }


    return $url;
}


function newses_post_format_type($post_id)
{
    
    if(has_post_format( 'image' ))
    { 
      echo '<span class="post-form"><i class="fa fa-camera"></i></span>';   
    }

    elseif(has_post_format( 'video' ))
    { 
      echo '<span class="post-form"><i class="fa fa-video-camera"></i></span>';   
    }

    elseif(has_post_format( 'gallery' ))
    {
       echo '<span class="post-form"><i class="fa fa-photo-video"></i></span>';  
    }

    else
    {
      echo '<span class="post-form"><i class="fa fa-camera"></i></span>';  
    }
}

if (!function_exists('newses_archive_page_title')) :
        
        function newses_archive_page_title($title)
        {
            if (is_category()) {
                $title = single_cat_title('', false);
            } elseif (is_tag()) {
                $title = single_tag_title('', false);
            } elseif (is_author()) {
                $title =  get_the_author();
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title('', false);
            } elseif (is_tax()) {
                $title = single_term_title('', false);
            }
            
            return $title;
        }
    
    endif;
    add_filter('get_the_archive_title', 'newses_archive_page_title');


if (!function_exists('newses_edit_link')) :

    function newses_edit_link($view = 'default')
    {
        global $post;
        
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'newses'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fa fa-edit"></i>',
                '</span>'
            );
    } 
endif;

function newses_date_display_type() {
    // Return if date display option is not enabled
    $header_data_enable = esc_attr(get_theme_mod('header_data_enable','true'));
    $header_time_enable = esc_attr(get_theme_mod('header_time_enable','true'));
    $newses_date_time_show_type = get_theme_mod('newses_date_time_show_type','newses_default');
    if(($header_data_enable == true) || ($header_time_enable == true)) {
    if ( $newses_date_time_show_type == 'newses_default' ) { ?>
        <li>
            <?php if($header_data_enable == true) { ?>
            <i class="fa fa-calendar ml-3"></i>
            <?php echo date_i18n('D. M jS, Y ', strtotime(current_time("Y-m-d"))); }
            if($header_time_enable == true) { ?>
            <span id="time" class="time"></span>
            <?php } ?>
        </li>                        
    <?php } elseif( $newses_date_time_show_type == 'wordpress_date_setting') { ?>
        <li>
            <?php if($header_data_enable == true) { ?>
                <i class="fa fa-calendar ml-3"></i>
            <?php echo date_i18n( get_option( 'date_format' ) ); } if($header_time_enable == true) {?>
            <span class="time"> <?php $format = get_option('') . ' ' . get_option('time_format');
            print date_i18n($format, current_time('timestamp')); ?></span>
           <?php } ?>
        </li>
   <?php } } }

/** Site Title font style **/
if (!function_exists('newses_site_info_style')) :
    /**
     * Styles the site title
     *
     * @see newses_site_info_style()
     */
    function newses_site_info_style()
    {

        $header_title_text_color = get_header_textcolor();
        $newses_title_font_size = newses_get_option('newses_title_font_size');
        ?>
        <style type="text/css">
            <?php
            // Has the text been hidden?
            if ( ! display_header_text() ) :
            ?>
            .site-title a,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                display: none;
            }

            <?php
                else :
            ?>


            body .site-title a,
            .site-header .site-branding .site-title a:visited,
            .site-header .site-branding .site-title a:hover,
            .site-description {
                color: #<?php echo esc_attr( $header_title_text_color ); ?>;
            }
            
            .site-branding-text .site-title a {
                font-size: <?php echo esc_attr( $newses_title_font_size ); ?>px;
            }

            @media only screen and (max-width: 640px) {
                .site-branding-text .site-title a {
                    font-size: 40px;

                }
            }

            @media only screen and (max-width: 375px) {
                .site-branding-text .site-title a {
                    font-size: 32px;

                }
            }

            <?php endif; ?>

            


        </style>
        <?php


    }
endif;

function newses_social_share_post($post) {

        $single_show_share_icon = esc_attr(get_theme_mod('single_show_share_icon','true'));
        if($single_show_share_icon == true) {
        $post_link  = esc_url( get_the_permalink() );
        $post_link = urlencode( esc_url( get_the_permalink() ) );
        $post_title = get_the_title();

        $facebook_url = add_query_arg(
        array(
        'u' => $post_link,
        ),
        'https://www.facebook.com/sharer.php'
        );

        $twitter_url = add_query_arg(
        array(
        'url'  => $post_link,
        'text' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) ),
         ),
         'http://twitter.com/share'
         );

         $email_title = str_replace( '&', '%26', $post_title );

         $email_url = add_query_arg(
        array(
        'subject' => wp_strip_all_tags( $email_title ),
        'body'    => $post_link,
         ),
        'mailto:'
         ); 

         $linkedin_url = add_query_arg(
         array('url'  => $post_link,
        'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
         ),
        'https://www.linkedin.com/sharing/share-offsite/?url'
        );

         $pinterest_url = add_query_arg(
         array('url'  => $post_link,
          'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
         ),
        'http://pinterest.com/pin/create/link/?url='
        );

         $telegram_url = add_query_arg(
         array('url'  => $post_link,
          'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
         ),
        'https://telegram.me/share/url?url=&text='
        );


         ?>
         <script>
    function pinIt()
    {
      var e = document.createElement('script');
      e.setAttribute('type','text/javascript');
      e.setAttribute('charset','UTF-8');
      e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);
      document.body.appendChild(e);
    }
    </script>

    <div class="post-share">
        <div class="post-share-icons cf"> 
            <a href="<?php echo esc_url("$facebook_url"); ?>" class="link facebook" target="_blank" >
                <i class="fa fa-facebook"></i>
            </a> 
            <a href="<?php echo esc_url("$twitter_url"); ?>" class="link twitter" target="_blank">
                <i class="fa fa-twitter"></i>
            </a> 
            <a href="<?php echo esc_url("$email_url"); ?>" class="link email" target="_blank" >
                <i class="fa fa-envelope-o"></i>
            </a> 
            <a href="<?php echo esc_url("$linkedin_url"); ?>" class="link linkedin" target="_blank" >
                <i class="fa fa-linkedin"></i>
            </a> 
            <a href="<?php echo esc_url("$telegram_url"); ?>" class="link telegram" target="_blank" >
                <i class="fa fa-telegram"></i>
            </a> 
            <a href="javascript:pinIt();" class="link pinterest">
                <i class="fa fa-pinterest"></i>
            </a>
            <a class="print-r" href="javascript:window.print()"> 
                <i class="fa fa-print"></i>
            </a>   
        </div>
    </div>

<?php } } 
add_filter( 'woocommerce_show_page_title', 'newses_hide_shop_page_title' );

function newses_hide_shop_page_title( $title ) {
    if ( is_shop() ) $title = false;
    return $title;
}

if( ! function_exists( 'newses_add_menu_description' ) ) :
    
    function newses_add_menu_description( $item_output, $item, $depth, $args ) {
        if($args->theme_location != 'primary') return $item_output;
        
        if ( !empty( $item->description ) ) {
            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-link-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'newses_add_menu_description', 10, 4 );
endif;
?>