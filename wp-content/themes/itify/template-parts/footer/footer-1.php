<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itify
 */

$footer_bg_img = get_theme_mod('itify_footer_bg');
$itify_footer_logo = get_theme_mod('itify_footer_logo');
$itify_footer_top_space = function_exists('get_field') ? get_field('itify_footer_top_space') : '0';
$itify_copyright_center = $itify_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$itify_footer_bg_url_from_page = function_exists('get_field') ? get_field('itify_footer_bg') : '';
$itify_footer_bg_color_from_page = function_exists('get_field') ? get_field('itify_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('itify_footer_bg_color');

// bg image
$bg_img = !empty($itify_footer_bg_url_from_page['url']) ? $itify_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty($itify_footer_bg_color_from_page) ? $itify_footer_bg_color_from_page : $footer_bg_color;




?>

<!-- footer area start -->

<?php
$style_attributes = '';

if (isset($bg_color)) {
    $style_attributes .= 'background-color: ' . esc_attr($bg_color) . '; ';
}


?>

<footer class="footer position-relative overflow-x-clip footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-copyright">
                    <div class="row align-items-center vertical-column-gap">
                        <div class="col-12 col-lg-6">
                            <div class="footer__copyright-text text-center text-lg-start">
                                <p class="text-quinary mt-8"> <?php print itify_copyright_text(); ?></p>
                            </div>
                        </div>
                        <?php
                        $footer_social = get_theme_mod('footer_social', false);


                        $facebook_link = get_theme_mod('fbl', __('#', 'itify'));
                        $twitter_link = get_theme_mod('twl', __('#', 'itify'));
                        $linkedin_link = get_theme_mod('lke', __('#', 'itify'));
                        $instagram_link = get_theme_mod('ytl', __('#', 'itify'));
                        ?>

                        <?php if (!empty($footer_social)) : ?>

                            <div class="col-12 col-lg-6">
                                <div class="social justify-content-center justify-content-lg-end">
                                    <?php if (!empty($facebook_link)) :   ?>
                                        <a href="<?php echo esc_url($facebook_link) ?>" target="_blank">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    <?php endif ?>
                                    <?php if (!empty($twitter_link)) :   ?>
                                        <a href="<?php echo esc_url($twitter_link) ?>" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    <?php endif ?>
                                    <?php if (!empty($linkedin_link)) :   ?>
                                        <a href="<?php echo esc_url($linkedin_link) ?>" target="_blank">
                                            <i class="fa-brands fa-facebook-messenger"></i>
                                        </a>
                                    <?php endif ?>
                                    <?php if (!empty($instagram_link)) :   ?>
                                        <a href="<?php echo esc_url($instagram_link) ?>" target="_blank">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>


