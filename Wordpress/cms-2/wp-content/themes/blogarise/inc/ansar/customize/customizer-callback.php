<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Blogarise
 */

/*select page for slider*/
if (!function_exists('blogarise_frontpage_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_frontpage_content_status($control)
    {

        if ('page' == $control->manager->get_setting('show_on_front')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for blogarise_header_status news*/
if (!function_exists('blogarise_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_header_status($control)
    {

        if ('header-layout-1' == $control->manager->get_setting('header_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_main_navigation_background_color_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_main_navigation_background_color_mode_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('main_navigation_background_color_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for Featured links*/
if (!function_exists('blogarise_featued_links_section_status')) :

    /**
     * Check if Featured links section is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_featued_links_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_links_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_global_site_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_global_site_mode_status($control)
    {

        if (('ta-default-mode' == $control->manager->get_setting('global_site_mode_setting')->value())) {

            return true;
        } else {
            return false;
        }

    }

endif;

    /*select page for slider*/
if (!function_exists('blogarise_global_site_mode_dark_light_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_global_site_mode_dark_light_status($control)
    {

        if (('ta-default-mode' !== $control->manager->get_setting('global_site_mode_setting')->value())) {

            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_banner_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_banner_mode_status($control)
    {

        if (('default' == $control->manager->get_setting('select_main_banner_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_tabbed_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_tabbed_mode_status($control)
    {

        if (('tabbed' == $control->manager->get_setting('select_tabbed_thumbs_section_mode')->value()) || ('trending' == $control->manager->get_setting('select_tabbed_thumbs_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_thumbs_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_thumbs_mode_status($control)
    {

        if (('thumbs' == $control->manager->get_setting('select_tabbed_thumbs_section_mode')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_featured_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_featured_news_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_editors_pick_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_editors_pick_section_status($control)
    {
        if (true == $control->manager->get_setting('show_editors_pick_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('blogarise_featured_product_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_featured_product_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_products_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_display_date_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_display_date_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-date-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_display_date_author_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_display_date_author_status($control)
    {

        if (('show-date-author' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-date-only' == $control->manager->get_setting('global_post_date_author_setting')->value()) || ('show-author-only' == $control->manager->get_setting('global_post_date_author_setting')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select sticky sidebar*/
if (!function_exists('blogarise_frontpage_content_alignment_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_frontpage_content_alignment_status($control)
    {

        if ('align-content-left' == $control->manager->get_setting('frontpage_content_alignment')->value() || 'align-content-right' == $control->manager->get_setting('frontpage_content_alignment')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_latest_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_latest_news_section_status($control)
    {

        if (true == $control->manager->get_setting('frontpage_show_latest_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('blogarise_archive_image_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogarise_archive_image_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;