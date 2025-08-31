<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package itify
 */

/** 
 *
 * itify header
 */

function itify_check_header()
{
    global $itify_current_header_style;

    $itify_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $itify_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');

    if ($itify_header_style == 'header-style-1') {
        $itify_current_header_style = 'header-style-1';
        get_template_part('template-parts/header/header-1');
    } elseif ($itify_header_style == 'header-style-2') {
        $itify_current_header_style = 'header-style-2';
        get_template_part('template-parts/header/header-2');
    } elseif ($itify_header_style == 'header-style-3') {
        $itify_current_header_style = 'header-style-3';
        get_template_part('template-parts/header/header-3');
    } else {
        if ($itify_default_header_style == 'header-style-2') {
            $itify_current_header_style = 'header-style-2';
            get_template_part('template-parts/header/header-2');
        } else {
            $itify_current_header_style = 'header-style-1';
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('itify_header_style', 'itify_check_header', 10);



/**
 * [itify_header_lang description]
 * @return [type] [description]
 */
function itify_header_lang_defualt()
{
    $itify_header_lang = get_theme_mod('itify_header_lang', false);
    if ($itify_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'itify'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('itify_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
    <?php
}

/**
 * [itify_language_list description]
 * @return [type] [description]
 */
function _itify_language($mar)
{
    return $mar;
}
function itify_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__('English', 'itify') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('Bangla', 'itify') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('French', 'itify') . '</a></li>';
        $mar .= ' </ul>';
    }
    print _itify_language($mar);
}
add_action('itify_language', 'itify_language_list');


// header logo
function itify_header_logo()
{
    global $itify_current_header_style;

    $itify_logo_add = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
    $itify_logo = get_template_directory_uri() . '/assets/images/logo/logo.png';
    $itify_logo_black = get_template_directory_uri() . '/assets/images/logo/logo-second.png';

    $itify_site_logo = get_theme_mod('logo', $itify_logo);
    $itify_secondary_logo = get_theme_mod('secondary_logo', $itify_logo_black);

    $inner_img = !empty($itify_logo_add) ? $itify_logo_add['url'] : '';

    if (!empty($inner_img)) { ?>
        <a class="secondary-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($inner_img); ?>" alt="<?php echo esc_attr__('logo', 'itify'); ?>">
        </a>
        <?php } else {
        if ($itify_current_header_style == 'header-style-1') { ?>
            <a class="standard-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($itify_site_logo); ?>" alt="<?php echo esc_attr__('logo', 'itify'); ?>" />
            </a>
        <?php } elseif ($itify_current_header_style == 'header-style-2') { ?>
            <a class="standard-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($itify_secondary_logo); ?>" alt="<?php echo esc_attr__('logo', 'itify'); ?>" />
            </a>
    <?php }
    }
}
add_action('itify_header_logo', 'itify_header_logo');



// header logo
function itify_header_sticky_logo()
{ ?>
    <?php
    $itify_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
    $itify_secondary_logo = get_theme_mod('seconday_logo', $itify_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($itify_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'itify'); ?>" />
    </a>
<?php
}

function itify_mobile_logo()
{
    // side info
    $itify_mobile_logo_hide = get_theme_mod('itify_mobile_logo_hide', false);

    $itify_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($itify_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($itify_site_logo); ?>" alt="<?php print esc_attr__('logo', 'itify'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }

/**
 * [itify_header_social_profiles description]
 * @return [type] [description]
 */
function itify_header_social_profiles()
{
    $itify_topbar_fb_url = get_theme_mod('itify_topbar_fb_url', __('#', 'itify'));
    $itify_topbar_twitter_url = get_theme_mod('itify_topbar_twitter_url', __('#', 'itify'));
    $itify_topbar_instagram_url = get_theme_mod('itify_topbar_instagram_url', __('#', 'itify'));
    $itify_topbar_linkedin_url = get_theme_mod('itify_topbar_linkedin_url', __('#', 'itify'));
    $itify_topbar_youtube_url = get_theme_mod('itify_topbar_youtube_url', __('#', 'itify'));
?>
    <ul>
        <?php if (!empty($itify_topbar_fb_url)) : ?>
            <li><a href="<?php print esc_url($itify_topbar_fb_url); ?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($itify_topbar_twitter_url)) : ?>
            <li><a href="<?php print esc_url($itify_topbar_twitter_url); ?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($itify_topbar_instagram_url)) : ?>
            <li><a href="<?php print esc_url($itify_topbar_instagram_url); ?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($itify_topbar_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($itify_topbar_linkedin_url); ?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($itify_topbar_youtube_url)) : ?>
            <li><a href="<?php print esc_url($itify_topbar_youtube_url); ?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function itify_footer_social_profiles()
{
    $itify_footer_fb_url = get_theme_mod('itify_footer_fb_url', __('#', 'itify'));
    $itify_footer_twitter_url = get_theme_mod('itify_footer_twitter_url', __('#', 'itify'));
    $itify_footer_instagram_url = get_theme_mod('itify_footer_instagram_url', __('#', 'itify'));
    $itify_footer_linkedin_url = get_theme_mod('itify_footer_linkedin_url', __('#', 'itify'));
    $itify_footer_youtube_url = get_theme_mod('itify_footer_youtube_url', __('#', 'itify'));
?>

    <ul>
        <?php if (!empty($itify_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($itify_footer_fb_url); ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($itify_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($itify_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($itify_footer_instagram_url)) : ?>
            <li>
                <a href="<?php print esc_url($itify_footer_instagram_url); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($itify_footer_linkedin_url)) : ?>
            <li>
                <a href="<?php print esc_url($itify_footer_linkedin_url); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($itify_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($itify_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [itify_header_menu description]
 * @return [type] [description]
 */
function itify_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'menunav',
        'container'      => '',
        'menu_id' => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [itify_header_menu description]
 * @return [type] [description]
 */
function itify_mobile_menu()
{
?>
    <?php
    $itify_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $itify_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $itify_menu);
    echo wp_kses_post($itify_menu);
    ?>
<?php
}

/**
 * [itify_search_menu description]
 * @return [type] [description]
 */
function itify_header_search_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [itify_footer_menu description]
 * @return [type] [description]
 */
function itify_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}


/**
 * [itify_category_menu description]
 * @return [type] [description]
 */
function itify_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}

/**
 *
 * itify footer
 */
add_action('itify_footer_style', 'itify_check_footer', 10);

function itify_check_footer()
{
    $itify_footer_style = function_exists('get_field') ? get_field('footer_style') : NULL;
    $itify_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    if ($itify_footer_style == 'footer-style-1') {
        get_template_part('template-parts/footer/footer-1');
    } elseif ($itify_footer_style == 'footer-style-2') {
        get_template_part('template-parts/footer/footer-2');
    } elseif ($itify_footer_style == 'footer-style-3') {
        get_template_part('template-parts/footer/footer-3');
    } elseif ($itify_footer_style == 'footer-style-4') {
        get_template_part('template-parts/footer/footer-4');
    } else {

        /** default footer style **/
        if ($itify_default_footer_style == 'footer-style-2') {
            get_template_part('template-parts/footer/footer-2');
        } elseif ($itify_default_footer_style == 'footer-style-3') {
            get_template_part('template-parts/footer/footer-3');
        } elseif ($itify_default_footer_style == 'footer-style-4') {
            get_template_part('template-parts/footer/footer-4');
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}

// itify_copyright_text
function itify_copyright_text()
{
    $home_url = esc_url(home_url('/')); // Get the home URL
    $copyright_text = get_theme_mod('itify_copyright', 'Copyright © 2024 <a href="' . $home_url . '">Itify</a> - All Rights Reserved');
    echo wp_kses($copyright_text, array(
        'a' => array(
            'href' => array(),
        ),
    ));
}



/**
 *
 * pagination
 */
if (!function_exists('itify_pagination')) {

    function _itify_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function itify_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _itify_pagi_callback($pagi);
    }
}


// header top bg color
function itify_breadcrumb_bg_color()
{
    $color_code = get_theme_mod('itify_breadcrumb_bg_color', '#222');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('itify-breadcrumb-bg', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_breadcrumb_bg_color');

// breadcrumb-spacing top
function itify_breadcrumb_spacing()
{
    $padding_px = get_theme_mod('itify_breadcrumb_spacing', '160px');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('itify-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_breadcrumb_spacing');

// breadcrumb-spacing bottom
function itify_breadcrumb_bottom_spacing()
{
    $padding_px = get_theme_mod('itify_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('itify-breadcrumb-bottom-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_breadcrumb_bottom_spacing');

// scrollup
function itify_scrollup_switch()
{
    $scrollup_switch = get_theme_mod('itify_scrollup_switch', false);
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('itify-scrollup-switch', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_scrollup_switch');

// theme color



function itify_custom_color()
{
    // Primary Color
    $color_code = get_theme_mod('itify_color_option', '#1a4dbe');
    $custom_css = '';

    if ($color_code != '') {
        $custom_css .= ":root{
            --hover-color: $color_code !important; 
        }";
    }

    // Secondary Color
    $color_code2 = get_theme_mod('itify_color_option_2', '#055c2d');
    $custom_css2 = '';

    if ($color_code2 != '') {
        $custom_css2 .= ":root{
            --head-alt-color: $color_code2 !important; 
        }";
    }

    // Enqueue and add inline styles for Primary Color
    wp_register_style('itify-custom', false);
    wp_enqueue_style('itify-custom', false);
    wp_add_inline_style('itify-custom', $custom_css, true);

    // Enqueue and add inline styles for Secondary Color
    wp_register_style('itify-custom-2', false);
    wp_enqueue_style('itify-custom-2', false);
    wp_add_inline_style('itify-custom-2', $custom_css2, true);
}
add_action('wp_enqueue_scripts', 'itify_custom_color');

// theme color
function itify_custom_color_scrollup()
{
    $color_code = get_theme_mod('itify_color_scrollup', '#2b4eff');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        wp_add_inline_style('itify-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_custom_color_scrollup');

// theme color
function itify_custom_color_secondary()
{
    $color_code = get_theme_mod('itify_color_option_3', '#30a820');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".asdf { border-color: " . $color_code . "}";
        wp_add_inline_style('itify-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_custom_color_secondary');

// theme color
function itify_custom_color_secondary_2()
{
    $color_code = get_theme_mod('itify_color_option_3_2', '#ffb352');
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('itify-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'itify_custom_color_secondary_2');


// itify_kses_intermediate
function itify_kses_intermediate($string = '')
{
    return wp_kses($string, itify_get_allowed_html_tags('intermediate'));
}

function itify_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function itify_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
