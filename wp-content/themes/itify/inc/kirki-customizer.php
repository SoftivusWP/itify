<?php

/**
 * itify customizer
 *
 * @package itify
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function itify_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('itify_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Itify Customizer', 'itify'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Info Setting', 'itify'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);



    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'itify'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'itify'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'itify'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);



    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'itify'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'itify'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);



    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'itify'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);




    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'itify'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'itify_customizer',
    ]);
}

add_action('customize_register', 'itify_customizer_panels_sections');

function _header_top_fields($fields)
{
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_btn_switch',
        'label'    => esc_html__('Button Swicher', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_preloader',
        'label'    => esc_html__('Preloader On/Off', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_cursor',
        'label'    => esc_html__('Cursor On/Off', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];






    // Button Text
    $fields[] = [
        'type'     => 'text',
        'settings' => 'itify_btn_text',
        'label'    => esc_html__('Button Text', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Lets Talk', 'itify'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'link',
        'settings' => 'itify_btn_link',
        'label'    => esc_html__('Button Link', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_social_switch',
        'label'    => esc_html__('Social Swicher', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'facebook_link',
        'label'    => esc_html__('Facebook Link', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'twitter_link',
        'label'    => esc_html__('Twitter Link', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'linkidin_link',
        'label'    => esc_html__('Linkedin Link', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'instagram_link',
        'label'    => esc_html__('Instagram Link', 'itify'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];





    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');



/*
Header Settings 
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'itify'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'itify'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2'   => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__('Header Logo', 'itify'),
        'description' => esc_html__('Upload Your Logo.', 'itify'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/images/logo/logo.png',
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__('Header Secondary Logo', 'itify'),
        'description' => esc_html__('Upload Your Secondary Logo.', 'itify'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/images/logo/logo-second.png',
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-2',
            ],
        ],
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');


/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'itify'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'itify'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'itify'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'itify'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'itify_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'itify'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'itify_blog_btn',
        'label'    => esc_html__('Blog Button text', 'itify'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'itify'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'itify'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'itify'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'itify'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'itify'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
    ];



    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_social',
        'label'    => esc_html__('Footer Social On/Off', 'itify'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'itify'),
            'off' => esc_html__('Disable', 'itify'),
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'fbl',
        'label'    => esc_html__('Twitter Link', 'itify'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'twl',
        'label'    => esc_html__('Instagram Link', 'itify'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'lke',
        'label'    => esc_html__('Facebook Link', 'itify'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'ytl',
        'label'    => esc_html__('Youtube Link', 'itify'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('', 'itify'),
        'priority' => 10,
    ];



    $fields[] = [
        'type'     => 'text',
        'settings' => 'itify_copyright',
        'label'    => esc_html__('Copy Right', 'itify'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2024 Itify. All Rights Reserved', 'itify'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');



// 404
function itify_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'itify_404_bg',
        'label'       => esc_html__('404 Image.', 'itify'),
        'description' => esc_html__('404 Image.', 'itify'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'itify_error_title',
        'label'    => esc_html__('Not Found Title', 'itify'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'itify'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'itify_error_desc',
        'label'    => esc_html__('404 Description Text', 'itify'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'itify'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'itify_error_link_text',
        'label'    => esc_html__('404 Link Text', 'itify'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'itify'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'itify_404_fields');





/**
 * Added Fields
 */
function itify_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'p',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_link_setting',
        'label'       => esc_html__('Link', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_span_setting',
        'label'       => esc_html__('Span', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'itify'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'itify_typo_fields');









/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function itify_THEME_option($name)
{
    $value = '';
    if (class_exists('itify')) {
        $value = Kirki::get_option(itify_get_theme(), $name);
    }

    return apply_filters('itify_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function itify_get_theme()
{
    return 'itify';
}
