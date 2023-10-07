<?php
/**
 * Default theme options.
 *
 * @package Newses
 */

if (!function_exists('newses_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newses_get_default_theme_options() {

    $defaults = array();

    
    // Header options section
    $defaults['header_layout'] = 'header-layout-1';
    $defaults['banner_advertisement_section'] = '';
    $defaults['banner_advertisement_section_url'] = '';
    $defaults['banner_advertisement_open_on_new_tab'] = 1;
    $defaults['banner_advertisement_scope'] = 'front-page-only';


    // Frontpage Section.
    $defaults['show_popular_tags_title'] = __('Top Tags', 'newses');
    $defaults['number_of_popular_tags'] = 7;
    $defaults['select_popular_tags_mode'] = 'post_tag';

    $defaults['show_flash_news_section'] = 1;
    $defaults['flash_news_title'] = __('Latest Post', 'newses');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['select_flash_new_mode'] = 'flash-slide-left';
    $defaults['banner_flash_news_scope'] = 'front-page-only';
    $defaults['show_main_news_section'] = 1;

    // Trednig section
    $defaults['trending_post_section_enable'] = 1;
    $defaults['trending_post_title'] = __('Trending', 'newses');
    $defaults['select_trending_post_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['newses_select_trending_setting'] = 'left';

    //Slider 3 Post
    $defaults['select_slider_3_post_category'] = 0;
    $defaults['enable_slider_3_post_category'] = 1;
    $defaults['newses_number_of_slider_3_post'] = 3;

    //Editorials Section
    $defaults['select_editorials_category'] = 0;
    $defaults['newses_number_of_editorials_post'] = 2;

    
    $defaults['select_main_banner_section_mode'] = 'default';
    $defaults['select_vertical_slider_news_category'] = 0;
    $defaults['vertical_slider_number_of_slides'] = 5;
    $defaults['select_slider_news_category'] = 0;
    $defaults['select_tabbed_thumbs_section_mode'] = 'tabbed';
    $defaults['select_tab_section_mode'] = 'default';
    $defaults['latest_tab_title'] = __("Latest", 'newses');
    $defaults['popular_tab_title'] = __("Popular", 'newses');
    $defaults['trending_tab_title'] = __("Trending", 'newses');
    $defaults['select_trending_tab_news_category'] = 0;
    $defaults['select_thumbs_news_category'] = 0;
    $defaults['number_of_slides'] = 5;
    $defaults['show_featured_news_section'] = 1;
    $defaults['featured_news_section_title'] = __('Featured Story', 'newses');
    $defaults['select_featured_news_category'] = 0;
    $defaults['number_of_featured_news'] = 6;
    $defaults['main_banner_section_background_image']= '';
    $defaults['remove_header_image_overlay'] = 1;




    $defaults['show_editors_pick_section'] = 1;
    $defaults['frontpage_content_alignment'] = 'align-content-left';

    //layout options
    $defaults['newses_content_layout'] = 'align-content-left';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['global_hide_post_date_author_in_list'] = 1;
    $defaults['global_widget_excerpt_setting'] = 'trimmed-content';
    $defaults['global_date_display_setting'] = 'theme-date';
    
    $defaults['frontpage_latest_posts_section_title'] = __('You may have missed', 'newses');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Single
    $defaults['single_show_featured_image'] = true;
    $defaults['single_show_share_icon'] = true;

    // filter.
    $defaults = apply_filters('newses_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;