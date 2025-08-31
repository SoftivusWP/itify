<?php

/**
 * itify_scripts description
 * @return [type] [description]
 */
function itify_scripts()
{

    /**
     * all css files
     */

    wp_enqueue_style('itify-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

        


    wp_enqueue_style('bootstrapp', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesomee', get_template_directory_uri() . '/assets/css/all.min.css');
    wp_enqueue_style('material-icons', get_template_directory_uri() . '/assets/css/material-icons.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/css/odometer.css');
    wp_enqueue_style('spacing', ITIFY_THEME_CSS_DIR . 'spacing.css', [], time());

    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('blog-css', ITIFY_THEME_CSS_DIR . 'itify-blog.css', [], time());
    wp_enqueue_style('itify-unit', ITIFY_THEME_CSS_DIR . 'itify-unit.css', [], time());
    wp_enqueue_style('itify-custom', ITIFY_THEME_CSS_DIR . 'itify-custom.css', [], time());
    wp_enqueue_style('responsive', ITIFY_THEME_CSS_DIR . 'responsive.css', [], time());
    wp_enqueue_style('itify-style', get_stylesheet_uri());

  

    // Enqueue Bootstrap JS
    wp_enqueue_script('gsap-js', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), '3.8.0', true);


    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.0.0', true);

    // Enqueue Magnific Popup JS
    wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);

    // Enqueue Slick JS
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);

    // Enqueue Appear JS
    wp_enqueue_script('appear-js', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), '0.4.1', true);

    // Enqueue Odometer JS
    wp_enqueue_script('odometer-js', get_template_directory_uri() . '/assets/js/jquery.odometer.min.js', array('jquery'), '0.4.1', true);

    // Enqueue Image Loaded JS
    wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '4.1.4', true);

    // Enqueue Isotope JS
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);

    // Enqueue SplitText JS
    wp_enqueue_script('splittext-js', get_template_directory_uri() . '/assets/js/SplitText.min.js', array(), '0.6.0', true);

    // Enqueue Lenis Smooth Scroll JS
    wp_enqueue_script('lenis-js', get_template_directory_uri() . '/assets/js/lenis.min.js', array(), '1.0.0', true);

    // Enqueue ScrollToPlugin JS
    wp_enqueue_script('scrollto-js', get_template_directory_uri() . '/assets/js/ScrollToPlugin.min.js', array(), '3.8.0', true);

    // Enqueue ScrollTrigger JS
    wp_enqueue_script('scrolltrigger-js', get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js', array(), '3.8.0', true);

 

    // Enqueue Vanilla Tilt JS
    wp_enqueue_script('tilt-js', get_template_directory_uri() . '/assets/js/tilt.jquery.js', array('jquery'), '1.7.0', true);

    // Enqueue Custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);



    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'itify_scripts');

/*
Register Fonts
 */
function itify_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'itify')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }
    return $font_url;
}
