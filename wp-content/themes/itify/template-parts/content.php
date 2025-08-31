<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itify
 */

if (is_single()) : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(' tp-post-details  pb-80 fade-wrapper'); ?>>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tp-post-intro  ">
                        <h2 class="title-anim text-xxl fw-7 text-secondary mt-8"><?php the_title() ?></h2>
                        <div class="mt-60 mb-24 d-flex align-items-center justify-content-between tppr">
                            <div class="d-flex align-items-center tp-post-tags-container mt-8">
                                <p class="text-xs"><?php echo esc_html__('Scope:', 'itify') ?></p>
                                <div class="d-flex align-items-center tp-post-tags">
                                    <?php
                                        $categories = get_the_category(); // Get the categories associated with the post
                                        if ($categories) {
                                            foreach ($categories as $category) {
                                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                echo '<span></span>'; // Add span separator after each category link
                                            }
                                        }
                                        ?>
                                </div>

                            </div>
                            <div class="tp-post-meta mt-8">
                                <p class="author text-xs text-tertiary"><?php echo get_the_author() ?></p>
                                <span></span>
                                <p class="date text-xs text-tertiary"><?php echo get_the_date() ?></p>
                            </div>
                        </div>
                        <?php if(has_post_thumbnail()):?>
                        <div class="tp-post-poster fade-top">
                            <img src="<?php the_post_thumbnail_url() ?>" class="w-100 mh-300 parallax-image" alt="Image">
                        </div>
                        <?php endif;?>
                        <div class="postbox__content">
                        <?php the_content() ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-80">
                <div class="col-12">
                    <div class="bd-social">
                        <p class="fw-5 text-uppercase"><?php echo esc_html__('Share :','itify')?></p>
                        <ul class=" social">
                            <li>
                                <a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>" target="_blank" aria-label="share us on facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>" target="_blank" aria-label="share us on twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('https://pinterest.com/pin/create/button/?url=' . get_permalink()); ?>" target="_blank" aria-label="share us on pinterest">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url('https://www.instagram.com/share?url=' . get_permalink()); ?>" target="_blank" aria-label="share us on instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="postbox__thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="postbox__content">
            <!-- blog meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <h3 class="postbox__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="postbox__text">
                <?php the_excerpt(); ?>
            </div>

            <!-- blog btn -->
            <?php get_template_part('template-parts/blog/blog-btn'); ?>
        </div>
    </article>
<?php endif; ?>