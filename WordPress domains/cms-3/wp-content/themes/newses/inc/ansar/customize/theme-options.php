<?php /*** Option Panel
 *
 * @package Newses
 */

$newses_default = newses_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/ansar/customize/frontpage-options.php';

// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'newses'),
        'priority' => 20,
        'capability' => 'edit_theme_options',
    )
);


$wp_customize->add_section( 'skin_color_options' , array(
        'title' => __('Skin color', 'newses'),
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
        'priority' => 6,
    ) );


$wp_customize->add_setting(
        'newses_skin_color', array(
        'default'           => 'defaultcolor',
        'sanitize_callback' => 'newses_sanitize_radio'
    ) );
    
    
    $wp_customize->add_control(
        new Newses_Radio_Image_Control( 
            // $wp_customize object
            $wp_customize,
            // $id
            'newses_skin_color',
            // $args
            array(
                'settings'      => 'newses_skin_color',
                'section'       => 'skin_color_options',
                'label'         => __( 'Skin color', 'newses' ),
                'choices'       => array(
                    'defaultcolor'    => get_template_directory_uri() . '/images/red.png',
                    'purple' => get_template_directory_uri() . '/images/blue.png',
                )
            )
        )
    );

$wp_customize->add_section( 'header_options' , array(
        'title' => __('Top Header Options', 'newses'),
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
        'priority' => 10,
    ) );

    $wp_customize->add_setting('date_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Newses_Section_Title(
            $wp_customize,
            'date_section_title',
            array(
                'label'             => esc_html__( 'Date ', 'newses' ),
                'section'           => 'header_options', 
            )
        )
    );
    $wp_customize->add_setting('header_data_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );

    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'header_data_enable', 
        array(
            'label' => esc_html__('Hide / Show Date', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));

    $wp_customize->add_setting('header_time_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'header_time_enable', 
        array(
            'label' => esc_html__('Hide / Show Time', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));

    // date in header display type
    $wp_customize->add_setting( 'newses_date_time_show_type', array(
        'default'           => 'newses_default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_select',
    ) );

    $wp_customize->add_control( 'newses_date_time_show_type', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Date / Time in header display type:', 'newses' ),
        'choices'  => array(
            'newses_default'          => esc_html__( 'Theme Default Setting', 'newses' ),
            'wordpress_date_setting' => esc_html__( 'From WordPress Setting', 'newses' ),
        ),
        'section'  => 'header_options',
        'settings' => 'newses_date_time_show_type',
    ) );
    $wp_customize->add_setting('header_social_icon_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
    );
    $wp_customize->add_control(
        new Newses_Section_Title(
            $wp_customize,
            'header_social_icon_title',
            array(
                'label'             => esc_html__( 'Social Icon ', 'newses' ),
                'section'           => 'header_options', 
            )
        )
    );    
    $wp_customize->add_setting('header_social_icon_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'header_social_icon_enable', 
        array(
            'label' => esc_html__('Hide / Show Social Icon', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));
    

    // Soical facebook link
    $wp_customize->add_setting(
    'newses_header_fb_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_fb_link',
    array(
        'label' => __('Facebook URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    

    $wp_customize->add_setting('newses_header_fb_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_fb_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));
    
    
    //Social Twitter link
    $wp_customize->add_setting(
    'newses_header_twt_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_twt_link',
    array(
        'label' => __('Twitter URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    $wp_customize->add_setting('newses_header_twt_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_twt_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));
    
    //Soical Linkedin link
    $wp_customize->add_setting(
    'newses_header_lnkd_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_lnkd_link',
    array(
        'label' => __('Linkedin URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    
    $wp_customize->add_setting('newses_header_lnkd_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_lnkd_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));


    //Soical Instagram link
    $wp_customize->add_setting(
    'newses_header_insta_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_insta_link',
    array(
        'label' => __('Instagram URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

   $wp_customize->add_setting('newses_insta_insta_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_insta_insta_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));

    //Soical youtube link
    $wp_customize->add_setting(
    'newses_header_youtube_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_youtube_link',
    array(
        'label' => __('Youtube URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    $wp_customize->add_setting('newses_header_youtube_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_youtube_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));

    //Soical Pintrest link
    $wp_customize->add_setting(
    'newses_header_pintrest_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_pintrest_link',
    array(
        'label' => __('Pintrest URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    
    $wp_customize->add_setting('newses_header_pintrest_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_pintrest_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));
    
    
    //Soical Telegram link
    $wp_customize->add_setting(
    'newses_header_telegram_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_telegram_link',
    array(
        'label' => __('Telegram URL','newses'),
        'section' => 'header_options',
        'type' => 'url',
    )
    );

    
    $wp_customize->add_setting('newses_header_telegram_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_telegram_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_options',
        )
    ));
    
    function newses_header_info_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

    }
    
    if ( ! function_exists( 'newses_sanitize_text_content' ) ) :

    /**
     * Sanitize text content.
     *
     * @since 1.0.0
     *
     * @param string               $input Content to be sanitized.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return string Sanitized content.
     */
    function newses_sanitize_text_content( $input, $setting ) {

        return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

    }
endif;
    
    function newses_header_sanitize_checkbox( $input ) {
            // Boolean check 
    return ( ( isset( $input ) && true == $input ) ? true : false );
    
    }


$wp_customize->add_section( 'header_ser_btn_options' , array(
        'title' => __('Header Options', 'newses'),
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
        'priority' => 11,
    ) );


$wp_customize->add_setting('header_search_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'header_search_enable', 
        array(
            'label' => esc_html__('Hide / Show Search Icon', 'newses'),
            'type' => 'toggle',
            'section' => 'header_ser_btn_options',
        )
    ));


$wp_customize->add_setting('header_watch_btn_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'header_watch_btn_enable', 
        array(
            'label' => esc_html__('Hide / Show Watch Button', 'newses'),
            'type' => 'toggle',
            'section' => 'header_ser_btn_options',
        )
    ));


    $wp_customize->add_setting(
    'newses_header_btn_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#',
    )
    
    );
    $wp_customize->add_control(
    'newses_header_btn_link',
    array(
        'label' => __('Link','newses'),
        'section' => 'header_ser_btn_options',
        'type' => 'text',
    )
    );

   $wp_customize->add_setting('newses_header_wth_btn_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_header_wth_btn_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'header_ser_btn_options',
        )
    ));




/**Site Layout Option section
*
 * @package newses
 */
// Layout Section.
$wp_customize->add_section('newses_site_layout_settings',
    array(
        'title' => esc_html__('Site Layout', 'newses'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

    $wp_customize->add_setting( 'newses_theme_layout_options', array(
        'default'           => 'wide',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_select',
    ) );

    $wp_customize->add_control( 'newses_theme_layout_options', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Choose your site layout', 'newses' ),
        'choices'  => array(
            'wide'  => esc_html__( 'Wide', 'newses' ),
            'boxed' => esc_html__( 'Boxed', 'newses' ),
        ),
        'section'  => 'newses_site_layout_settings',
        'settings' => 'newses_theme_layout_options',
    ) );


/**
 * Layout options section
 *
 * @package newses
 */

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title' => esc_html__('Content Layout Settings', 'newses'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


    $wp_customize->add_setting('newses_archive_page_heading',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'newses_archive_page_heading',
        array(
            'label' => esc_html__('Archive Blog Pages', 'newses'),
            'section' => 'site_layout_settings',

        )
    )
);
    
    $wp_customize->add_setting(
        'newses_content_layout', array(
        'default'           => 'align-content-right',
        'sanitize_callback' => 'newses_sanitize_radio'
    ) );
    
    
    $wp_customize->add_control(
        new Newses_Radio_Image_Control( 
            // $wp_customize object
            $wp_customize,
            // $id
            'newses_content_layout',
            // $args
            array(
                'settings'      => 'newses_content_layout',
                'section'       => 'site_layout_settings',
                'label'         => __( 'Layout', 'newses' ),
                'choices'       => array(
                    'align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',  
                    'full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                    'align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                    'grid-left-sidebar' => get_template_directory_uri() . '/images/grid-left-sidebar.png',
                    'grid-fullwidth' => get_template_directory_uri() . '/images/grid-fullwidth.png',
                    'grid-right-sidebar' => get_template_directory_uri() . '/images/grid-right-sidebar.png',
                )
            )
        )
    );


$wp_customize->add_setting('newses_single_post_page__heading',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'newses_single_post_page__heading',
        array(
            'label' => esc_html__('Single Blog Pages', 'newses'),
            'section' => 'site_layout_settings',

        )
    )
);
    
    $wp_customize->add_setting(
        'newses_single_page_layout', array(
        'default'           => 'single-align-content-right',
        'sanitize_callback' => 'newses_sanitize_radio'
    ) );
    
    
    $wp_customize->add_control(
        new Newses_Radio_Image_Control( 
            // $wp_customize object
            $wp_customize,
            // $id
            'newses_single_page_layout',
            // $args
            array(
                'settings'      => 'newses_single_page_layout',
                'section'       => 'site_layout_settings',
                'label'         => __( 'Layout', 'newses' ),
                'choices'       => array(
                    'single-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                    'single-align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',
                   'single-full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                )
            )
        )
    );

    //Page Layout
        $wp_customize->add_setting('newses_page_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Newses_Section_Title(
                $wp_customize,
                'newses_page_heading',
                array(
                    'label' => esc_html__('Page', 'newses'),
                    'section' => 'site_layout_settings',

                )
            )
        );
            
            $wp_customize->add_setting(
                'newses_page_layout', array(
                'default'           => 'page-align-content-right',
                'sanitize_callback' => 'newses_sanitize_radio'
            ) );
            
            
            $wp_customize->add_control(
                new Newses_Radio_Image_Control( 
                    // $wp_customize object
                    $wp_customize,
                    // $id
                    'newses_page_layout',
                    // $args
                    array(
                        'settings'      => 'newses_page_layout',
                        'section'       => 'site_layout_settings',
                        'label'         => __( 'Layout', 'newses' ),
                        'choices'       => array(
                            'page-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                            'page-align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',
                           'page-full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                        )
                    )
                )
            );

//========== date and author options ===============

// Global Section.
$wp_customize->add_section('site_post_date_author_settings',
    array(
        'title' => esc_html__('Date and Author', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_post_date_author_setting',
    array(
        'default' => $newses_default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newses_sanitize_select',
    )
);


$wp_customize->add_control('global_post_date_author_setting',
    array(
        'label' => esc_html__('Date and Author', 'newses'),
        'section' => 'site_post_date_author_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'newses'),
            'show-date-only' => esc_html__('Show Date Only', 'newses'),
            'show-author-only' => esc_html__('Show Author Only', 'newses'),
            'hide-date-author' => esc_html__('Hide All', 'newses'),
        ),
        'priority' => 130,
    ));

//========== single posts options ===============

// Single Section.
$wp_customize->add_section('site_single_posts_settings',
    array(
        'title' => esc_html__('Single Post', 'newses'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);



$wp_customize->add_setting('newses_single_page_heading',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'newses_single_page_heading',
        array(
            'label' => esc_html__('Single Post', 'newses'),
            'section' => 'site_single_posts_settings',

        )
    )
); 

// Setting - Single posts.
$wp_customize->add_setting('newses_single_post_category',
array(
    'default' => true,
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_single_post_category', 
    array(
        'label' => esc_html__('Hide/Show Categories', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));


$wp_customize->add_setting('newses_single_post_admin_details',
array(
    'default' => true,
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_single_post_admin_details', 
    array(
        'label' => esc_html__('Hide/Show Author Details', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
)); 

$wp_customize->add_setting('newses_single_post_date',
array(
    'default' => true,
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_single_post_date', 
    array(
        'label' => esc_html__('Hide/Show Date', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
)); 
$wp_customize->add_setting('newses_single_post_tag',
array(
    'default' => true,
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_single_post_tag', 
    array(
        'label' => esc_html__('Hide/Show Tag', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('single_show_featured_image',
array(
    'default' => $newses_default['single_show_featured_image'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'single_show_featured_image', 
    array(
        'label' => __('Hide/Show Featured Image', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));
$wp_customize->add_setting('single_show_share_icon',
array(
    'default' => $newses_default['single_show_share_icon'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'single_show_share_icon', 
    array(
        'label' => __('Hide/Show Sharing Icons', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
)); 

$wp_customize->add_setting('newses_author_post_heading',
array(
    'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'newses_author_post_heading',
        array(
            'label' => esc_html__('Author', 'newses'),
            'section' => 'site_single_posts_settings', 
        )
    )
);
$wp_customize->add_setting('newses_enable_single_post_admin_details',
array(
    'default' => true,
    'sanitize_callback' => 'newses_sanitize_checkbox',
)
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_single_post_admin_details', 
    array(
        'label' => esc_html__('Hide/Show Author Details', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('newses_related_post_heading',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newses_Section_Title(
        $wp_customize,
        'newses_related_post_heading',
        array(
            'label' => esc_html__('Related Post', 'newses'),
            'section' => 'site_single_posts_settings',

        )
    )
); 
$wp_customize->add_setting('newses_enable_related_post',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_related_post', 
    array(
        'label' => esc_html__('Enable Related Posts', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('newses_related_post_title', 
    array(
        'default' => esc_html__('Related Posts', 'newses'),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('newses_related_post_title', 
    array(
        'label' => esc_html__('Title', 'newses'),
        'type' => 'text',
        'section' => 'site_single_posts_settings',
    )
);

/************************* Meta Hide Show *********************************/
$wp_customize->add_setting('newses_enable_single_post_category',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_single_post_category', 
    array(
        'label' => esc_html__('Hide/Show Categories', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('newses_enable_single_post_date',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_single_post_date', 
    array(
        'label' => esc_html__('Hide/Show Date', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('newses_enable_single_post_author',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_single_post_author', 
    array(
        'label' => esc_html__('Hide/Show Author Details', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));

$wp_customize->add_setting('newses_enable_single_post_comments',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_single_post_comments', 
    array(
        'label' => esc_html__('Hide/Show Comments', 'newses'),
        'type' => 'toggle',
        'section' => 'site_single_posts_settings',
    )
));


    $wp_customize->add_section('you_missed_section',
    array(
        'title' => esc_html__('You Missed Section', 'newses'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

    $wp_customize->add_setting('you_missed_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'you_missed_enable', 
        array(
            'label' => esc_html__('Hide / Show You Missed Section', 'newses'),
            'type' => 'toggle',
            'section' => 'you_missed_section',
        )
    ));


    // You Misses Title
    $wp_customize->add_setting(
    'you_missed_title',
    array(
        'default' => esc_html__('You Missed','newses'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => $selective_refresh
    )
    
    );
    $wp_customize->add_control(
    'you_missed_title',
    array(
        'label' => __('Title','newses'),
        'section' => 'you_missed_section',
        'type' => 'text',
    )
    );

//========== footer latest blog carousel options ===============

// Footer Section.
    $wp_customize->add_section('footer_options', array(
        'title' => __('Footer Options','newses'),
        'priority' => 200,
        'panel' => 'theme_option_panel',
    ) );

    $wp_customize->add_setting('footer_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Newses_Section_Title(
            $wp_customize,
            'footer_section_title',
            array(
                'label'             => esc_html__( 'Footer Section ', 'newses' ),
                'section'           => 'footer_options', 
            )
        )
    );

    //Footer Background image
    $wp_customize->add_setting( 
        'newses_footer_widget_background', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'newses_footer_widget_background', array(
        'label'    => __( 'Background Image', 'newses' ),
        'section'  => 'footer_options',
        'settings' => 'newses_footer_widget_background',
    ) ) );


    //Background Overlay 
   $wp_customize->add_setting(
        'newses_footer_overlay_color', array( 'sanitize_callback' => 'newses_alpha_color_custom_sanitization_callback',
        
    ) );
    
    $wp_customize->add_control(new Newses_Customize_Alpha_Color_Control( $wp_customize,'newses_footer_overlay_color', array(
       'label'      => __('Overlay Color', 'newses' ),
        'palette' => true,
        'section' => 'footer_options')
    ) );

      //Footer widget text color 
   $wp_customize->add_setting(
        'newses_footer_text_color', array( 'sanitize_callback' => 'sanitize_hex_color',
        
    ) );
    
    $wp_customize->add_control( 'newses_footer_text_color', array(
       'label'      => __('Text Color', 'newses' ),
        'type' => 'color',
        'section' => 'footer_options')
    );

    
    $wp_customize->add_setting(
        'newses_footer_column_layout', array(
        'default' => 3,
        'sanitize_callback' => 'newses_sanitize_select',
    ) );

    $wp_customize->add_control(
        'newses_footer_column_layout', array(
        'type' => 'select',
        'label' => __('Select Column Layout','newses'),
        'section' => 'footer_options',
        'choices' => array(1=>1, 2=>2,3=>3,4=>4),
    ) );
   
    $wp_customize->add_setting('footer_social_icon_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Newses_Section_Title(
            $wp_customize,
            'footer_social_icon_title',
            array(
                'label'             => esc_html__( 'Social Icon', 'newses' ),
                'section'           => 'footer_options', 
            )
        )
    );

    //Enable and disable social icon
    $wp_customize->add_setting('footer_social_icon_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'footer_social_icon_enable', 
        array(
            'label' => esc_html__('Hide / Show Social Icon', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));


    // Soical facebook link
    $wp_customize->add_setting(
    'newses_footer_fb_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_fb_link',
    array(
        'label' => __('Facebook URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

   $wp_customize->add_setting('newses_footer_fb_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_fb_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));

    //Social Twitter link
    $wp_customize->add_setting(
    'newses_footer_twt_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_twt_link',
    array(
        'label' => __('Twitter URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

    
    $wp_customize->add_setting('newses_footer_twt_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_twt_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));
    
    //Soical Linkedin link
    $wp_customize->add_setting(
    'newses_footer_lnkd_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_lnkd_link',
    array(
        'label' => __('Linkedin URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

    $wp_customize->add_setting('newses_footer_lnkd_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_lnkd_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));
    
    
    //Soical Instagram link
    $wp_customize->add_setting(
    'newses_footer_insta_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_insta_link',
    array(
        'label' => __('Instagram URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

    $wp_customize->add_setting('newses_footer_insta_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_insta_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));

    //Soical Youtube link
    $wp_customize->add_setting(
    'newses_footer_youtube_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_youtube_link',
    array(
        'label' => __('Youtube URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

   $wp_customize->add_setting('newses_footer_youtube_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_youtube_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));

    //Soical Pintrest link
    $wp_customize->add_setting(
    'newses_footer_pinterest_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_pinterest_link',
    array(
        'label' => __('Pinterest URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

    $wp_customize->add_setting('newses_footer_pinterest_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_pinterest_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));

    
    //Soical Telegram link
    $wp_customize->add_setting(
    'newses_footer_telegram_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
    
    );
    $wp_customize->add_control(
    'newses_footer_telegram_link',
    array(
        'label' => __('Telegram URL','newses'),
        'section' => 'footer_options',
        'type' => 'text',
    )
    );

    $wp_customize->add_setting('newses_footer_telegram_target',
    array(
        'default' => true,
        'sanitize_callback' => 'newses_social_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_footer_telegram_target', 
        array(
            'label' => esc_html__('Open link in a new tab', 'newses'),
            'type' => 'toggle',
            'section' => 'footer_options',
        )
    ));

    $wp_customize->add_setting('newses_footer_menu_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Newses_Section_Title(
                $wp_customize,
                'newses_footer_menu_heading',
                array(
                    'label' => esc_html__('Footer Menu', 'newses'),
                    'section' => 'footer_options',

                )
            )
        );





        $wp_customize->add_setting('newses_enable_footer_menu',
            array(
                'default' => true,
                'sanitize_callback' => 'newses_sanitize_checkbox',
            )
        );
        $wp_customize->add_control(new Newses_Toggle_Control( $wp_customize, 'newses_enable_footer_menu', 
            array(
                'label' => esc_html__('Hide/Show Footer Menu', 'newses'),
                'type' => 'toggle',
                'section' => 'footer_options',
            )
        ));
    
    function newses_social_sanitize_checkbox( $input ) {
            // Boolean check 
            return ( ( isset( $input ) && true == $input ) ? true : false );
            }
    
            
    if ( ! function_exists( 'newses_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function newses_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;

function newses_template_page_sanitize_text( $input ) {

            return wp_kses_post( force_balance_tags( $input ) );

}