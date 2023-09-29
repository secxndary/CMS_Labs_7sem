<?php

/**
 * Option Panel
 *
 * @package Newses
 */

$newses_default = newses_get_default_theme_options();

/**
 * Frontpage options section
 *
 * @package newses
 */

//Header Bqckground Overlay 
$wp_customize->add_setting(
    'newses_header_overlay_color', array( 'sanitize_callback' => 'newses_alpha_color_custom_sanitization_callback',
    
) );

$wp_customize->add_control(new Newses_Customize_Alpha_Color_Control( $wp_customize,'newses_header_overlay_color', array(
    'label'      => __('Overlay Color', 'newses' ),
    'palette' => true,
    'section' => 'header_image')
) );

$wp_customize->add_setting('remove_header_image_overlay',
    array(
        'default'           => $newses_default['remove_header_image_overlay'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);

$wp_customize->add_control('remove_header_image_overlay',
    array(
        'label'    => esc_html__('Remove Image Overlay', 'newses'),
        'section'  => 'header_image',
        'type'     => 'checkbox',
        'priority' => 50,
    )
);
// Add Frontpage Options Panel.
$wp_customize->add_panel('frontpage_option_panel',
    array(
        'title' => esc_html__('Frontpage Options', 'newses'),
        'priority' => 40,
        'capability' => 'edit_theme_options',
    )
);
// Advertisement Section.
$wp_customize->add_section('frontpage_advertisement_settings',
    array(
        'title' => esc_html__('Banner Advertisement', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);
// Setting banner_advertisement_section.
$wp_customize->add_setting('banner_advertisement_section',
    array(
        'default' => $default['banner_advertisement_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'transport' => $selective_refresh
    )
);
$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_advertisement_section',
        array(
            'label' => esc_html__('Banner Section Advertisement', 'newses'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'newses'), 930, 100),
            'section' => 'frontpage_advertisement_settings',
            'width' => 930,
            'height' => 100,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 120,
        )
    )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting('banner_advertisement_section_url',
    array(
        'default' => $newses_default['banner_advertisement_section_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('banner_advertisement_section_url',
    array(
        'label' => esc_html__('URL Link', 'newses'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'url',
        'priority' => 130,
    )
);

$wp_customize->add_setting('banner_advertisement_open_on_new_tab',
array(
    'default' => $newses_default['banner_advertisement_open_on_new_tab'],
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'banner_advertisement_open_on_new_tab', 
    array(
        'label' => esc_html__('Open link in a new tab', 'newses'),
        'type' => 'toggle',
        'section' => 'frontpage_advertisement_settings',
        'priority' => 140,
    )
));
//=================================
//Top tags Section.
//=================================
$wp_customize->add_section('newses_popular_tags_section_settings',
    array(
        'title' => esc_html__('Top Tags', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting('show_popular_tags_section',
    array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'show_popular_tags_section', 
        array(
            'label' => __('Hide/Show Top Tags', 'newses'),
            'type' => 'toggle',
            'section' => 'newses_popular_tags_section_settings',
            'priority' => 100,
        )
    ));


// Setting - number_of_slides.
$wp_customize->add_setting('show_popular_tags_title',
    array(
        'default' => $newses_default['show_popular_tags_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $selective_refresh
    )
);

$wp_customize->add_control('show_popular_tags_title',
    array(
        'label' => esc_html__('Section Title', 'newses'),
        'section' => 'newses_popular_tags_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'newses_popular_tags_section_status'

    )
);


//=================================
// Trending Posts Section.
//=================================
$wp_customize->add_section('newses_flash_posts_section_settings',
    array(
        'title' => esc_html__('Latest Posts', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting('show_flash_news_section',
    array(
        'default' => $newses_default['show_flash_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_flash_news_section',
    array(
        'label' => esc_html__('Enable Latest Posts Section', 'newses'),
        'section' => 'newses_flash_posts_section_settings',
        'type' => 'checkbox',
        'priority' => 22,

    )
);

// Setting - number_of_slides.
$wp_customize->add_setting('flash_news_title',
    array(
        'default' => $newses_default['flash_news_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $selective_refresh
    )
);

$wp_customize->add_control('flash_news_title',
    array(
        'label' => esc_html__('Latest Post Title', 'newses'),
        'section' => 'newses_flash_posts_section_settings',
        'type' => 'text',
        'priority' => 23,
        'active_callback' => 'newses_flash_posts_section_status'

    )
);

// Setting - drop down category for slider.
$wp_customize->add_setting('select_flash_news_category',
    array(
        'default' => $newses_default['select_flash_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newses_Dropdown_Taxonomies_Control($wp_customize, 'select_flash_news_category',
    array(
        'label' => esc_html__('Latest Posts Category', 'newses'),
        'description' => esc_html__('Posts to be shown on trending posts ', 'newses'),
        'section' => 'newses_flash_posts_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 23,
        'active_callback' => 'newses_flash_posts_section_status'
    )));


/**
 * Main Banner Slider Section
 * */

// Main banner Sider Section.
$wp_customize->add_section('frontpage_main_banner_section_settings',
    array(
        'title' => esc_html__('Slider Banner Section', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);

// Setting - show_main_news_section.
$wp_customize->add_setting('show_main_news_section',
    array(
        'default' => $newses_default['show_main_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_main_news_section',
    array(
        'label' => esc_html__('Enable Slider Banner Section', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 20,

    )
);

$wp_customize->add_setting('trending_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'trending_section_title',
        array(
            'label'             => esc_html__( 'Trending Section ', 'newses' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 30,
            'active_callback' => 'newses_main_banner_section_status'
        )
    )
);


// Setting - trending section left or right settings
$wp_customize->add_setting('newses_select_trending_setting',
    array(
        'default' => $default['newses_select_trending_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_select',
    )
);

$wp_customize->add_control('newses_select_trending_setting',
    array(
        'label' => esc_html__('Select Trending Carousel Position', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'select',
        'choices' => array(
            'left' => esc_html__("Left", 'newses'),
            'right' => esc_html__("Right", 'newses'),

        ),
        'priority' => 50,
        'active_callback' => 'newses_main_banner_section_status'
    ));



// Setting - trending_section_title.
$wp_customize->add_setting('trending_post_title',
    array(
        'default' => $newses_default['trending_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('trending_post_title',
    array(
        'label' => esc_html__('Title', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 50,
        'active_callback' => 'newses_main_banner_section_status',
    )
);


// Setting - drop down category for trending post.
$wp_customize->add_setting('select_trending_post_category',
    array(
        'default' => $newses_default['select_trending_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newses_Dropdown_Taxonomies_Control($wp_customize, 'select_trending_post_category',
    array(
        'label' => esc_html__('Category', 'newses'),
        'description' => esc_html__('Posts to be shown on trending post section', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 60,
        'active_callback' => 'newses_main_banner_section_status'
    )));


//Slider section title
$wp_customize->add_setting('main_slider_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'main_slider_section_title',
        array(
            'label'             => esc_html__( 'Slider Section ', 'newses' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 70,
            'active_callback' => 'newses_main_banner_section_status'
        )
    )
);



// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_news_category',
    array(
        'default' => $newses_default['select_slider_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newses_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_news_category',
    array(
        'label' => esc_html__('Category', 'newses'),
        'description' => esc_html__('Posts to be shown on banner slider section', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 90,
        'active_callback' => 'newses_main_banner_section_status'
    )));



//section title
$wp_customize->add_setting('main_slider_below_3_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'main_slider_below_3_title',
        array(
            'label' 			=> esc_html__( 'Slider Thumbnail Posts', 'newses' ),
            'section' 			=> 'frontpage_main_banner_section_settings',
            'priority' 			=> 100,
            'active_callback' => 'newses_main_banner_section_status'
        )
    )
);


// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_3_post_category',
    array(
        'default' => $newses_default['select_slider_3_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newses_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_3_post_category',
    array(
        'label' => esc_html__('Category', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 120,
        'active_callback' => 'newses_main_banner_section_status'
    )));


//section title
$wp_customize->add_setting('editorials_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'editorials_section_title',
        array(
            'label'             => esc_html__( 'Editorials Section', 'newses' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 130,
            'active_callback' => 'newses_main_banner_section_status'
        )
    )
);


// Setting - drop down category for slider.
$wp_customize->add_setting('select_editorials_category',
    array(
        'default' => $newses_default['select_editorials_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new Newses_Dropdown_Taxonomies_Control($wp_customize, 'select_editorials_category',
    array(
        'label' => esc_html__('Category', 'newses'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 140,
        'active_callback' => 'newses_main_banner_section_status'
    )));