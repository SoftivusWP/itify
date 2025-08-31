<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itify
 */

$itify_blog_btn = get_theme_mod('itify_blog_btn', 'Read More');
$itify_blog_btn_switch = get_theme_mod('itify_blog_btn_switch', true);

?>



<?php if (!empty($itify_blog_btn_switch)) : ?>
    <a href="<?php the_permalink(); ?>" class="btn-line">
    <?php print esc_html($itify_blog_btn); ?>
    </a>
<?php endif; ?>